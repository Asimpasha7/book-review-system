<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Review;
use DB;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
  

    public function homepage()
    {

        $user = Auth::user();
        return view('homepage', compact('user'));
    }

    public function index()
    {

        // $reviews = Review::all();
        $reviews = DB::table('books as b')
        ->join('reviews as r','r.book_id','=','b.id')
        ->get();

        // dd($reviews);

        $user = Auth::user();

        dd($user);
        return view('review.index', compact('user','reviews'));
    }


    public function create()
    {

        $books = Book::all();
        $user = Auth::user();
        return view('review.add', compact('user','books'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
          
            'title' => 'required',
            'review' => 'required|string|max:255',
            'ratings' => 'required|numeric|min:0'
           
        ]);

        // dd($request);
        // dd($request);
        $review = new Review();
        $review->book_id = $validatedData['title'];
        $review->review = $validatedData['review'];
        $review->rating = $validatedData['ratings'];

        $review->save();
        return Redirect::route('index.review')->with('success', 'Review added successfully!');
     
    }


    public function edit($id)
    {
    
        $books = Book::all();
        $review = Review::findOrFail($id);
        $reviews = Review::all();
     
        return view('review.edit', compact('review', 'reviews','books'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
          
            'title' => 'required',
            'review' => 'required|string|max:255',
            'ratings' => 'required|numeric|min:0'
           
        ]);

     
        $review = Review::findOrFail($id);

  
        $review->book_id = $validatedData['title'];
        $review->review = $validatedData['review'];
        $review->rating = $validatedData['ratings'];

        $review->save();

        return Redirect::route('index.review')->with('success', 'Review updated successfully!');
    

    }

    public function destroy($id)
    {
       
        // dd('del');
        $review = Review::findOrFail($id);

        $review->delete();
        $reviews = Review::all();

        return redirect()->route('index.review')->with([
            'success' => 'Review deleted successfully.',
            'reviews' => $reviews
        ]);
    }
}
