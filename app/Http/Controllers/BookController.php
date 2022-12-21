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
        $books = $book->all()->toArray();
        $nice = new Nice;
        
        return view('home', [
            'books' => $books,
            'nice' => $nice,
        ]); 
        // return view('addbook', [
        //     'books' => $books,
        //     'nice' => $nice,
        // ]); 
    }
    
    
    public function ajaxnice(Request $request)
    {
        $id = Auth::user()->id;
        $review_id = $request->reviewid;
        // dd($review_id);
        $nice = new Nice;
        $review = Review::findOrFail($review_id);
        // dd($review);
        
        // 空でない（既にいいねしている）なら
        if ($nice->nice_exist($id, $review_id)) {
            //nicesテーブルのレコードを削除
            $nice = Nice::where('review_id', $review_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならnicesテーブルに新しいレコードを作成する
            $nice = new Nice;
            $nice->review_id = $request->reviewid;
            $nice->user_id = Auth::user()->id;
            $nice->save();
        }
        
        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $reviewnicesCount = $review->loadCount('nice')->nices_count;
        
        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'reviewnicesCount' => $reviewnicesCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }

    public function addbook()
    {
        // dd($request);
        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('/');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // $book = new Book;
        // $book->title = $request->title;
        // $book->author = $request->author;
        // // Book::whereNotIn('publisher', [$book], true);
        // // $book->user_id = Auth::user()->id;
    
        // // dd($book);
        // $book->save();
        return view('/addbook', [
            // 'book' => $book,
        ]);

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
        // $review = Auth::user()->review->where('book_id', $book->id);
        $reviews = $review->all()->where('book_id', $book->id);
        $nice_model = new Nice;
        
        return view('book/show', [
            'book' => $book,
            'reviews' => $reviews,
            // 'review' => $reviews,
            'nice_model'=>$nice_model,
            // 'nice' => $nice,
        ]);
        

    }
    public function past(Book $book, Review $review, User $user)
    {
        // dd($book);
        $books = Auth::user()->review->where('review_id', $book->id);
        // $books = Auth::user()->review->where('review_id', 0);
        // $user = new User;
        $review = new Review;
        // $reviews = $review->all()->toArray();
        $reviews = Auth::user()->review;
        // dd($reviews);
        return view('book/past', [
            'book' => $books,
            'reviews' => $reviews,
            // 'nice' => $nice,
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book, Review $review)
    {
        return view('form');
        // $book = new Book;
        // $books = $book->find($_GET['id']);
        // dd($book);
        // dd($books);
        // $review = new Review;
        // $reviews = Auth::user()->review->where('book_id',$book->id);
        // // $reviews = Auth::user()->review->pluck('id',$review);
        // dd($reviews);
        // return view('book/edit', [
        //     'book' => $book,
        //     'reviews' => $reviews,
        // ]);
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
        // $review = Review::findOrFail($book);
        // $review->review = $request->review;
        // // dd($review);
        // Auth::user()->$review->save();
        // return view('editcomplete');
        
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
    public function search(Request $request, Book $book)
    {
        #キーワード受け取り
        $keyword = $request->input('keyword');
        #クエリ生成
        $query = Book::query();
        // dd($query);
        
        #もしキーワードがあったら
        if(!empty($keyword))
        {
            $query->where('title','like','%'.$keyword.'%')->orWhere('author','like','%'.$keyword.'%');
        }else{
            // return view('/');
        }
        
        #ページネーション
        $book = $query->orderBy('created_at','desc')->paginate(10);
        
        // dd($data);
        // return view('search')->with('data',$data)
        // ->with('keyword',$keyword)->with('message','ユーザーリスト');
        if(!empty($keyword)){
            return view('search', [
                'books' => $book,
                'keyword' => $keyword,
                // 'datas' => $data,
            ]);
        }else{
            return view('home', [
                'books' => $book,
            ]);
        }
    }
}

