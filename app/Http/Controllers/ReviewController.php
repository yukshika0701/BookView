<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use App\User;
use App\Book;
use App\Nice;
use App\Http\Requests\CreateData;
use Illuminate\Support\Facades\Auth;
use InterventionImage;
use Illuminate\Support\Collection; 
use Illuminate\Pagination\LengthAwarePaginator; 

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(CreateData $request)
    {
        $review = new Review();
        $review->review = $request->review;
        $review->book_id = $request->book_id;
        $review->user_id = Auth::user()->id;
        $review->save();
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('book/edit', [
            'book' => $review->book,
            'review' => $review,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(CreateData $request, Review $review)
    {
        $review->review = $request->review;
        $review->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect('/');
    }
    public function nicehistory()
    {
        $nice = new Nice;
        $review = new Review;
        $nices = $review->join('nices', 'reviews.id', '=', 'nices.review_id')->join('books', 'reviews.book_id', '=', 'books.id')->where('nices.user_id', '=', Auth::id())->get();
        return view('nicehistory', [
            'reviews' => $nices,
        ]);
    }

}
