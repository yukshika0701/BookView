<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Review;
use InterventionImage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = new Book;
        $books = $book->all()->toArray();

        return view('home', [
            'books' => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = new Book;
        $books = $book->find($_GET['book']);
        // dd($books);
        return view('book/create', [
            'book' => $books,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = new Review();
        // dd($review);
        $review->review = $request->review;
        $review->book_id = $request->book_id;
        $review->user_id = Auth::user()->id;
        // dd($review);
        $review->save();
        
        return view('complete');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        // $book = new Book;
        // $books = $book->find($book['id']);

        // $books = $book->find($_GET['book']);
        // dd($book);
        $review = new Review;
        // $review = $review->book_id;
        $review = Auth::user()->review->where('book_id', $book->id);
        // dd($review);
        // $review = Review::where('book_id', $books)->get();
        // $reviews = $review->find($_GET['review']);

        // dd($review);
        return view('book/show', [
            'book' => $book,
            'reviews' => $review,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
