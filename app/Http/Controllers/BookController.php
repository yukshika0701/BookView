<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Book;
use App\Review;
use App\Nice;
use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use App\Http\Requests\Storebook;
use Illuminate\Support\Facades\Auth;
use InterventionImage;
use Illuminate\Support\Collection; 
use Illuminate\Pagination\LengthAwarePaginator; 

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
        $books = $book->all()->where('approval_flg',1)->toArray();
        $nice = new Nice;
        $id = Auth::user()->admin_flg;

        return view('home', [
            'books' => $books,
            'nice' => $nice,
            'id' => $id,
        ]); 
    }
    
    
    public function ajaxnice(Request $request)
    {
        $id = Auth::user()->id;
        $review_id = $request->reviewid;
        $nice = new Nice;
        $review = Review::findOrFail($review_id);
        
        if ($nice->nice_exist($id, $review_id)) {
            $nice = Nice::where('review_id', $review_id)->where('user_id', $id)->delete();
        } else {
            $nice = new Nice;
            $nice->review_id = $request->reviewid;
            $nice->user_id = Auth::user()->id;
            $nice->save();
        }
        $reviewnicesCount = $review->loadCount('nice')->nice_count;
        $json = [
            'reviewnicesCount' => $reviewnicesCount,
        ];
        return response()->json($json);
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
        new User;
        $id = Auth::user()->admin_flg;
        $book = new Book;

        $books = $book->all()->where('approval_flg',0);
        if($id == 1){
            return view('/addbook', [
                'books' => $books,
            ]);
        }else{
            $book = new Book;
            
            $columns = ['title', 'author'];
            
            foreach($columns as $column) {
                $book->$column = $request->$column;
            }
            $book->approval_flg = 0;
            $book->save();
            
            $bookhome = $book->all()->where('approval_flg',1)->toArray();
            $id = null;
            return view('home', [
                'books' => $bookhome,
                'id' => $id,
            ]); 
        }
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
        $reviews = Review::withcount('nice')->where('book_id', $book->id)->get();
        $nice = new Nice;
        return view('book/show', [
            'book' => $book,
            'reviews' => $reviews,
            'nice_model'=>$nice,
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Book $book)
    {
        return view('/form', [
            'book' => $book,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Book $book)
    {
        $columns = ['title', 'author', 'publisher', 'genre'];
        
        foreach($columns as $column) {
            $book->$column = $request->$column;
        }
        $book->approval_flg = 1;
        
        $dir = 'app';
        $file_name = $request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('public/' . $dir , $file_name);
        $book->photo = $file_name;
        $book->save();
        $books = $book->all()->where('approval_flg', 0);
        return view('/addbook',[
            'books' => $books,
        ]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book, Request $request)
    {
        //
    }

    public function past(Book $book, Review $review, User $user)
    {
        $books = Auth::user()->review->where('review_id', $book->id);
        $nice = new Nice;
        $id = Auth::user()->admin_flg;
        if($id == 1){
            $reviewall = Review::withcount('nice')->get();
            return view('book/past', [
                'book' => $books,
                'reviews' => $reviewall,
                'id' => $id,
                'nice_model' => $nice,
            ]);
        }else{
            $reviews = Review::withcount('nice')->where('user_id', Auth::user()->id)->get();
            return view('book/past', [
                'book' => $books,
                'reviews' => $reviews,
                'id' => $id,
                'nice_model'=> $nice,
            ]);
        }

    }

    public function search(Request $request, Book $book)
    {
        $keyword = $request->input('keyword');
        $query = Book::query();
        if(!empty($keyword))
        {
            $query->where('title','like','%'.$keyword.'%')->orWhere('author','like','%'.$keyword.'%');
        }else{
        }
        $book = $query->paginate(6);
        $books = $book->where('approval_flg', 1);
        $id = null;
        if(!empty($keyword)){
            return view('search', [
                'books' => $books,
                'keyword' => $keyword,
            ]);
        }else{
            return view('home', [
                'books' => $books,
                'id' => $id,
            ]);
        }
    }
}

