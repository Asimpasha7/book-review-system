<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;

use App\Models\Review;
use App\Models\User;
use DB;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class BookController extends Controller
{
    //

    public function homepage()
    {

        $user = Auth::user();
        $books = Book::all()->count();

        $reviews = Review::all()->count();
        $users = User::all()->count();

        $reviewss = DB::table('books as b')
        ->join('reviews as r','r.book_id','=','b.id')
        ->get();

        return view('homepage', compact('user','books','reviews','users','reviewss'));
    }

    public function index()
    {

        $books = Book::all();
        $user = Auth::user();
        return view('book.index', compact('user','books'));
    }


    public function create()
    {
        return view('book.add');

    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:0'
           
        ]);

        // dd($request);
        $book = new Book();
        $book->title = $validatedData['title'];
        $book->author = $validatedData['author'];
        $book->publication = $validatedData['publication'];
        $book->quantity = $validatedData['quantity'];
        $book->isbn = $validatedData['isbn'];

        $book->save();
        return Redirect::route('index')->with('success', 'Book added successfully!');
     
    }


    public function edit($id)
    {
    
        $book = Book::findOrFail($id);
        $books = Book::all();
     
        return view('book.edit', compact('book', 'books'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:0'
        ]);
    

        $book = Book::findOrFail($id);
      
        $book->title = $validatedData['title'];
        $book->author = $validatedData['author'];
        $book->publication = $validatedData['publication'];
        $book->quantity = $validatedData['quantity'];
        $book->isbn = $validatedData['isbn'];
    
      
        $book->save();
        return Redirect::route('index')->with('success', 'Book updated successfully!');
    

    }

    public function destroy($id)
    {
       
        // dd('del');
        $book = Book::findOrFail($id);

        $book->delete();
        $books = Book::all();

        return redirect()->route('index')->with([
            'success' => 'Book deleted successfully.',
            'books' => $books
        ]);
    }



}
