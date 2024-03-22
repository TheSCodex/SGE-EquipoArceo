<?php

namespace App\Http\Controllers\Luis;
use App\Http\Controllers\Controller;
use App\Http\Requests\Luis\BookFormRequest;
use App\Models\AcademicAdvisor;
use App\Models\Book;
use App\Models\Intern;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $internsWithUserInfo = Intern::whereNotNull('book_id')
        ->with('user')
        ->get();
    
        // Preparar un arreglo que contenga la información del usuario asociada a cada libro
        $userInfoByBookId = [];
        foreach ($internsWithUserInfo as $intern) {
            $bookId = $intern->book_id;
            $userInfoByBookId[$bookId][] = $intern->user;
        }

        // dd($internsWithUserInfo);
        $books = Book::paginate(5);
        return view('Luis.book', compact('books', 'userInfoByBookId'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Luis.newBookForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookFormRequest $request)
    {
        
        $books = new \App\Models\Book;
        $books->title = $request->title;
        $books->author = $request->author;
        $books->isbn = $request->isbn;
    
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
    
        return redirect('asistente/libros')->with('success', 'El libro se ha agregado correctamente');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
        return view('Luis.showBook', compact('book', 'internsIdentifier', 'interns'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
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
        $book = Book::find($id);
    
        // Validar identificadores de estudiantes
        $problems = [];
        $identifiers = preg_split('/,\s*/', $request->identifier_student); // Usar expresión regular para dividir la cadena
        foreach ($identifiers as $identifier) {
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