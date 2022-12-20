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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        // $book = new Book;
        // $books = $book->find($_GET['id']);
        // dd($book);
        // dd($books);
        // $review = new Review;
        // $reviews = Auth::user()->review;
        // $reviews = Auth::user()->review->pluck('id',$review);
        // dd($review->book);
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
    public function update(Request $request, Review $review)
    {
        // dd($review);
        $review->review = $request->review;
        // dd($request->review);
        $review->save();
        return view('editcomplete');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        // dd($review);
        $review->delete();
        return view('delete');
    }
    public function nicehistory()
    {
        // $reviewid = $review->nice('review_id');
        // // dd($reviewid);
        $nice = new Nice;
        $review = new Review;
        // $reviews = $review->all('id','review')->where('review_id', $nice->id);
        // dd($reviews);
        $nices = $review->join('nices', 'reviews.id', '=', 'nices.review_id')->join('books', 'reviews.book_id', '=', 'books.id')->where('nices.user_id', '=', Auth::id())->get();
        // dd($nices);
        // $nicereview = $reviews->$nices->where('id', '=','review_id');
        // dd($nicereview);
        // // $books = Auth::user()->review->where('review_id', 0);
        // // $user = new User;
        // $review = new Review;
        // // $reviews = $review->all()->toArray();
        // // $reviews = Auth::user()->review;
        // // dd($reviews);
        // dd($reviews->book);
        return view('nicehistory', [
            // 'book' => $nices,
            'reviews' => $nices,
            // 'nice' => $nice,
        ]);
        // dd($request);
        // $nice->review_id = Review::where('user_id', '=', Auth::id())->first()->id;
        // $nices = User::with(['nice' => function ($query) {
        //     $query->with('review');
        // }])->find($request->review_id);
        // return response()->json(['nices' => $nices], 200);
    }

}
