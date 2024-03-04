<?php

namespace App\Http\Controllers\Luis;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(5);
        return view('Luis.book', compact('books'));
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
    public function store(Request $request)
    {

        $books = new \App\Models\Book;
        $books->title = $request->title_book;
        $books->author = $request->author_book;
        $books->isbn = $request->isbn_book;
        // $books->birthdate = $request->identifier_student;

        $books->save();

        return redirect('libros');
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
        return view('Luis.editBookForm', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
        $book=Book::find($id);
        // dd($student);
        $book->update($request->all());
        return redirect()->route('libros.index')->with('notificacion', 'Libro editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $book=Book::find($id);

        $book->delete();

        return redirect()->route('libros.index');
    }
}
