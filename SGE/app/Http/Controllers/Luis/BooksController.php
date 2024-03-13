<?php

namespace App\Http\Controllers\Luis;
use App\Http\Controllers\Controller;
use App\Http\Requests\Luis\BookFormRequest;
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
     * Display a filter list of the resources.
     */
    public function filter(Request $request)
    {
        $searchTerm = $request->input('search');
    
        $filteredBooks = Book::query();
    
        if (!empty($searchTerm)) {
            $filteredBooks->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')->orWhere('author', 'like', '%' . $searchTerm . '%')->orWhere('isbn', 'like', '%' . $searchTerm . '%');
            });
        }
    
        $filteredBooks = $filteredBooks->orderBy('id')->paginate(9);
        // dd($filteredBooks);

        return view('Luis.book', compact('filteredBooks'));
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
        $books->save();

        $identifierInterns = $request->identifier_student;
        $identifiers = explode(', ', $identifierInterns);
        foreach ($identifiers as $identifier) {
            $user = User::where('identifier', $identifier)->first();
            $intern = Intern::where('user_id', $user->id)->first();
            $lastBook = Book::latest()->first();
            $intern->book_id = $lastBook->id;
            // dd($intern);
            $intern->save();
        }
        return redirect('asistente/libros')->with('success', 'El libro se ha agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(BookFormRequest $request, string $id):RedirectResponse
    {
        $book=Book::find($id);
        
        $identifierInterns = $request->identifier_student;
        $identifiers = explode(', ', $identifierInterns);
        
        // Obtener todos los interns asociados con el libro
        $interns = Intern::where('book_id', $id)->get();

        // Recorrer todos los interns
        foreach ($interns as $intern) {
            $identifierUser = User::where('id', $intern->user_id)->first();
            if (!in_array($identifierUser['identifierUser'], $identifiers)) {
                $intern->book_id = null;
                $intern->save();
            }
        }

        // dd($identifiers);
        foreach ($identifiers as $identifier) {
            $user = User::where('identifier', $identifier)->first();
            $intern = Intern::where('user_id', $user->id)->first();
            $intern->book_id = $id;
            // dd($intern);
            $intern->save();
        }
        
        $book->update($request->all());
        return redirect()->route('libros.index')->with('edit_success', 'El libro ha sido editado correctamente');
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
    
        return redirect()->route('libros.index')->with('delete', 'ok');
    }
    
}
