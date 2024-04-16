<?php

namespace App\Http\Controllers\Luis;
use App\Http\Controllers\Controller;
use App\Http\Requests\Luis\BookFormRequest;
use App\Models\AcademicAdvisor;
use App\Models\Academy;
use App\Models\Book;
use App\Models\Career;
use App\Models\Division;
use App\Models\Intern;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Gate::denies('leer-lista-libros')){
            abort(403,'No tienes permiso para acceder a esta sección.');
        }

        $divisionOrAcademy = null;


        $user = auth()->user();
        if($user->rol_id == 5){
            $division = Division::where('directorAsistant_id', $user->id)->first();
            $divisionOrAcademy = $division;
        }
        if($user->rol_id == 2){
            $academicAdvisor = AcademicAdvisor::where('user_id', $user->id)->first();
            $career = Career::where('id', $academicAdvisor->career_id)->first();
            $academy = Academy::where('id', $career->academy_id)->first();
            $divisionOrAcademy = $academy;
        }

        
        $internsWithUserInfo = Intern::whereNotNull('book_id')->with('user')->get();

        function getInternInfo($intern){
            $career = Career::where('id', $intern->career_id)->first();
            $academy = Academy::where('id', $career->academy_id)->first();
            $division = Division::where('id', $academy->division_id)->first();
            return [
                'user' => $intern->user,
                'academy' => $academy,
                'career' => $career,
                'division' => $division,
            ];
        };
    
        // Preparar un arreglo que contenga la información del usuario asociada a cada libro
        $userInfoByBookId = [];
        foreach ($internsWithUserInfo as $intern) {
            $bookId = $intern->book_id;
            $userInfoByBookId[$bookId][] = getInternInfo($intern);
            
        }

        // Obtener todos los libros
        $books = Book::all();
        $booksByAcademy = [];
        $booksByDivision = [];




        foreach ($books as $book) {
            // Verificar si hay información del usuario asociada al libro
            if (isset($userInfoByBookId[$book->id])) {
                // Utilizar un conjunto para mantener un registro de los libros ya agregados
                $addedBooks = [];
        
                // Otro for por si hay más de un estudiante asociado al libro
                foreach ($userInfoByBookId[$book->id] as $internBookInfo) {
                    // Obtener el nombre de la academia o división correspondiente al libro
                    $divisionName = $internBookInfo['division']->name;
                    $academyName = $internBookInfo['academy']->name;
        
                    // Verificar si el usuario es un asistente
                    if ($user->rol_id == 5) {
                        // Verificar si el nombre de la división coincide con la división del usuario
                        if ($divisionOrAcademy->name == $divisionName && !isset($addedBooks[$book->id])) {
                            $booksByDivision[$divisionName][] = $book;
                            $addedBooks[$book->id] = true; // Marcar el libro como agregado
                        }
                    }
                    // Verificar si el usuario es un asesor académico
                    elseif ($user->rol_id == 2) {
                        // Verificar si el nombre de la academia coincide con la academia del usuario
                        if ($divisionOrAcademy->name == $academyName && !isset($addedBooks[$book->id])) {
                            $booksByAcademy[$academyName][] = $book;
                            $addedBooks[$book->id] = true; // Marcar el libro como agregado
                        }
                    }
                }
            }
        }
        
        // Crear arrays para almacenar libros paginados por división y academia
        $paginatedBooksByDivision = [];
        $paginatedBooksByAcademy = [];

        function paginateBooks($booksArray) {
            $paginatedBooks = [];
        
            foreach ($booksArray as $group => $books) {
                $bookIds = collect($books)->pluck('id')->unique();
                $query = Book::whereIn('id', $bookIds)->paginate(10);
                $paginatedBooks[$group] = $query;
            }
        
            return $paginatedBooks;
        }
        
        $paginatedBooksByDivision = paginateBooks($booksByDivision);
        $paginatedBooksByAcademy = paginateBooks($booksByAcademy);
        
        // dd($paginatedBooksByAcademy[$divisionOrAcademy->name]);
        return view('Luis.book', compact('books', 'userInfoByBookId', 'divisionOrAcademy', 'booksByAcademy', 'booksByDivision', 'paginatedBooksByDivision', 'paginatedBooksByAcademy'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::denies('crear-libro')){
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
        return view('Luis.newBookForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookFormRequest $request)
    {
        if(Gate::denies('crear-libro')){
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
        $books = new \App\Models\Book;
        $books->title = $request->title;
        $books->author = $request->author;
        $books->isbn = $request->isbn;
        $books->price = $request->price;
    
        $problems = [];
        $allUsersExistAndAreInterns = true;
        $interns = [];
    
        $identifierInterns = $request->identifier_student;
        $identifiers = preg_split('/,\s*/', $request->identifier_student); // Usar expresión regular para dividir la cadena
        foreach ($identifiers as $identifier) {
            $user = User::where('identifier', $identifier)->first();
            if ($user == null) {
                $problems[] = "El usuario con identificador $identifier no existe";
                $allUsersExistAndAreInterns = false;
            } else {
                $intern = Intern::where('user_id', $user->id)->first();
                // dd($intern);
                if ($intern->book_id != null) {
                    $problems[] = "El usuario con identificador $identifier ya está asociado a otro libro";
                } 
                if ($intern === null) {
                    $problems[] = "El usuario con identificador $identifier no es un estudiante";
                    $allUsersExistAndAreInterns = false;
                } else {
                    $interns[] = $intern;
                }
            }
        }

        if (!$allUsersExistAndAreInterns) {
            return redirect()->route('libros-asistente.create')->withInput()->with('problems', $problems);
        }
        if (count($problems) > 0) {
            return redirect()->route('libros-asistente.create')->withInput()->with('problems', $problems);
        }
    
        // Aquí guarda el libro y los internos
        $books->save();
        $lastBook = Book::latest()->first();
        foreach ($interns as $intern) {
            $intern->book_id = $lastBook->id;
            $intern->save();
        }
    
        return redirect()->route('libros-asistente.index')->with('success', 'El libro se ha agregado correctamente');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(Gate::denies('leer-lista-libros')){
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
        $book = Book::find($id);
        $interns = Intern::with('user')->where('book_id', $id)->get();
        $internsIdentifier = [];
        foreach ($interns as $intern) {
            $user = User::where('id', $intern['user_id'])->first();
            $internsIdentifier[] = $user['identifier'];
            if ($intern['academic_advisor_id'] != null) {
                $academicAdvisor = AcademicAdvisor::with('user')->where('id', $intern['academic_advisor_id'])->first();
                $intern['academic_advisor'] = $academicAdvisor;
            }
        }
        // dd($interns);
        return view('Luis.showBook', compact('book', 'internsIdentifier', 'interns'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(Gate::denies('editar-libro')){
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
        $book=Book::find($id);
        $interns = Intern::where('book_id', $id)->get();
        $internsIdentifier = [];
        foreach ($interns as $intern) {
            $user = User::where('id', $intern['user_id'])->first();
            $internsIdentifier[] = $user['identifier'];
        }
        // dd($internsIdentifier);
        return view('Luis.editBookForm', compact('book', 'internsIdentifier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookFormRequest $request, string $id): RedirectResponse
    {
        if(Gate::denies('editar-libro')){
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
        $book = Book::find($id);
    
        // Validar identificadores de estudiantes
        $problems = [];
        $identifiers = preg_split('/\s*,\s*/', $request->identifier_student);
        $identifiers = array_filter($identifiers, 'strlen'); // Filtrar identificadores vacíos
        $identifiers = array_unique($identifiers); // Eliminar identificadores duplicados
        // dd($identifiers);
        foreach ($identifiers as $identifier) {
            // Ignorar identificadores vacíos

            $user = User::where('identifier', $identifier)->first();
            if ($user === null) {
                $problems[] = "El usuario con identificador $identifier no existe";
            } else {
                $intern = Intern::where('user_id', $user->id)->first();
                if ($intern === null) {
                    $problems[] = "El usuario con identificador $identifier no es un estudiante";
                } else if ($intern->book_id != null && $intern->book_id != $id) {
                    $problems[] = "El usuario con identificador $identifier ya está asociado a otro libro";
                }
            }

        }
    
        if (!empty($problems)) {
            return redirect()->back()->withInput()->with('problems', $problems);
        }

        // Desvincular estudiantes anteriores y vincular nuevos estudiantes
        $this->updateInterns($id, $identifiers);
    
        // Actualizar el libro
        $book->update($request->all());
    
    
        return redirect()->route('libros-asistente.index')->with('edit_success', 'El libro ha sido editado correctamente');
    }
    
    
    private function updateInterns(string $bookId, array $identifiers): void
    {
        // Obtener todos los interns asociados con el libro
        $interns = Intern::where('book_id', $bookId)->get();
    
        // Recorrer todos los interns
        foreach ($interns as $intern) {
            $user = User::find($intern->user_id);
            $identifierUser = $user->identifier;
            if (!in_array($identifierUser, $identifiers)) {
                // Desvincular intern si no está en la lista de identificadores
                $intern->book_id = null;
                $intern->save();
            }
        }
        // Vincular nuevos interns
        foreach ($identifiers as $identifier) {
            $user = User::where('identifier', $identifier)->first();
            $intern = Intern::where('user_id', $user->id)->first();
            if ($intern->book_id === null) {
                $intern->book_id = $bookId;
                $intern->save();
            }
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(Gate::denies('eliminar-libro')){
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
        $book = Book::findOrFail($id);

        $interns = Intern::where('book_id', $id)->get();

        foreach ($interns as $intern) {
            $intern->book_id = null;
            $intern->save();
        }

        $book->delete();
    
        return redirect()->route('libros-asistente.index')->with('delete', 'ok');
    }
    
}