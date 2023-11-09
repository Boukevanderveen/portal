<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{

    function index(Book $book){
        $this->authorize('view', $book);
        return view('books.index', ['books' => Book::All()]);
    }

    function adminIndex(Book $book){
        $this->authorize('view', $book);
        return view('admin.books.index', ['books' => Book::Paginate(10)]);
    }
    
    function create(Book $book){
        $this->authorize('create', $book);
        return view('admin.books.create');
    }

    function edit(Book $book){
        $this->authorize('update', $book);
        return view('admin.books.edit', compact(['book']));
    }

    function store(Request $request)
    {
        $book = new Book;
        $book->name = $request->name;
        $book->ISBN = $request->ISBN;
        $book->price = $request->price;
        $book->school_year = $request->school_year;
        $book->save();
        return redirect('/admin/books')->with('succes', 'Boek succesvol aangemaakt.');
    }

    function update(UpdateBookRequest $request, Book $book)
    {
        $book->name = $request->name;
        $book->ISBN = $request->ISBN;
        $book->price = $request->price;
        $book->school_year = $request->school_year;
        $book->update();
        return redirect('/admin/books')->with('succes', 'Boek succesvol bewerkt.');
    }

    function destroy(Request $request, Book $book)
    {
        $this->authorize('delete', $book);
        $book->delete();
        return back()->with('succes', 'Boek succesvol verwijderd.');
    }

    public function searchIndex(Book $book, Request $request)
    {
        $this->authorize('view', $book);
        $books = Book::where('name', 'like', '%' . $request->search_term.'%')->latest()->paginate(12);
        return view('admin.books.index', ['books' => $book, 'search_term' => $request->search_term]);
    }
}
