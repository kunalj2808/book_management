<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Comment;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function  index(Request $request)
    {
        $search = $request->input('search');

        // Query for books with optional search and paginate
        $books = Book::when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                         ->orWhere('author', 'like', '%' . $search . '%');
        })->paginate(10);
    
        return view('home', compact('books'));
        // return view('home');
    }

    public function rate(Request $request, $id)
    {
        // Validate the rating input (it should be required and between 1 and 5)
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);
    
        // Find the book by its ID
        $book = Book::findOrFail($id);
    
        // Update the rating and save the book
        $book->rating = $request->input('rating');
        $book->save();
    
        // Redirect back with a success message
        return redirect()->route('home')->with('status', 'Rating updated!');
    }
    
    public function addComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);
    
        $book = Book::findOrFail($id);
        $book->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->input('comment'),
        ]);
    
        return redirect()->route('home')->with('status', 'Comment added successfully!');
    }
    
}
