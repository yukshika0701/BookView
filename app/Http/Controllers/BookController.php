<?php

namespace App\Http\Controllers;

use App\User;
use App\Book;
use App\Review;
use App\Nice;
use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use Illuminate\Support\Facades\Auth;
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
        // $review = new Review;
        // $reviews = Auth::user()->review->where('book_id', $book->id);
        // dd($reviews);
        return view('home', [
            'books' => $books,
        ]); 
        // return view('book/past', [
        //     'book' => $books,
        // ]); 

        // 検索機能//
        //Request $request  $keyword = $request->input('keyword');
        //  $query = User::query();
        //  if(!empty($keyword))
        //  {
        //    $query->where('name','like','%'.$keyword.'%')->orWhere('mail','like','%'.$keyword.'%');
        //  }
        //  $data = $query->orderBy('created_at','desc')->paginate(10);
        // return view('search');
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
    public function show(Book $book, Review $review)
    {
        $review = new Review;
        $review = Auth::user()->review->where('book_id', $book->id);
        // dd($review);
        // $review = Review::where('book_id', $books)->get();
        // $reviews = $review->find($_GET['review']);

        // dd($review);
        // $nice = Nice::where('review_id', $review->id)->where('user_id', auth()->user()->id)->first();
        
        // $culumns = ['book_id', 'user_id'];

        // foreach($culumns as $culumn) {
        //     $record->user_id = Auth::user()->id;
        //     $record->review_id = $request->$culumn->id; 
        // }
        // $record->get();
        // dd($record);
        // return view('book/show', compact('book', 'nice'));
        // dd($nice);
        return view('book/show', [
            'book' => $book,
            'reviews' => $review,
            // 'nice' => $nice,
        ]);
        // return view('book/past', [
        //     'book' => $book,
        //     // 'reviews' => $review,
        // ]);
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
