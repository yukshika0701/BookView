<?php

namespace App\Http\Controllers;

use App\Article;
use App\Book;
use App\Http\Requests\CreateData;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Review;
use InterventionImage;

use Illuminate\Http\Request;

class ArticleController extends Controller
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
    public function create(Article $article)
    {
        // switch($book['genre']){
        //     case(1):
            //       $genre = 'ファンタジー';
            //     break;
            
            //   }
            // dd($_GET['article']);
            
            $book = new Book;
            $books = $book->find($_GET['article']);
            // dd($books);
            return view('article/create', [
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
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        
        return view('article/show', [
            'book' => $article,
        ]);
    }
    // public function show(Review $review)
    // {
        //     return view('article/show', [
            //         'review' => $review,
            //     ]);
            // }
            
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        // return view('article/', [
        //     'book' => $book,
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
