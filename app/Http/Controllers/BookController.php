<?php

namespace App\Http\Controllers;

use DB;
use App\Photo;
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
        $books = $book->all()->where('review_id', '!=', null)->toArray();
        $nice = new Nice;
        $photo = new Photo;
        $photos = $photo->all()->toArray();
        $id = Auth::user()->admin_flg;

        // dd($id);
        return view('home', [
            'books' => $books,
            'nice' => $nice,
            'photo' => $photos,
            'id' => $id,
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
        new User;
        $id = Auth::user()->admin_flg;
        $book = new Book;

        $books = $book->all()->where('review_id',null);

        // dd($id);
        if($id == 1){
            return view('/addbook', [
                'books' => $books,
            ]);
        }else {
            $book = new Book;
            // $book->title = $request->title;
            // $book->author = $request->author;
            // $book->review_id = $request->id;
            
            $columns = ['title', 'author'];
    
            foreach($columns as $column) {
                $book->$column = $request->$column;
            }
            $book->save();
            
            $books = $book->all()->where('review_id',null);
            $bookhome = $book->all()->where('review_id', '!=', null)->toArray();
            return view('home', [
                'books' => $bookhome,
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
        // $id = DB::table('books')->insertGetId(['id' => $book, ]);
        // dd($id);
        $columns = ['title', 'author', 'publisher', 'genre', 'photo'];
        
        foreach($columns as $column) {
            $book->$column = $request->$column;
        }
        $book->review_id = $book->id;

        $dir = 'img';
        $file_name = $request->file('photo')->getClientOriginalName();
        // dd($file_name);
        // 取得したファイル名で保存
        $request->file('photo')->storeAs('public/' . $dir, $file_name);
        // ファイル情報をDBに保存
        $photo = new Photo;
        $photo->name = $file_name;
        $app = 'app';
        $photo->path = 'storage/' . $app . '/' . $file_name;
        // dd($photo);
        $photo->save();
        $book->save();
        // dd($book);
        $books = $book->all()->where('review_id',null);

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
        // dd($book);
        $books = Auth::user()->review->where('review_id', $book->id);
        // $books = Auth::user()->review->where('review_id', 0);
        // $user = new User;
        $review = new Review;
        $reviewall = $review->where('user_id', '!=', 9)->get();
        $reviews = Auth::user()->review;
        // dd($reviewall);
        $id = Auth::user()->admin_flg;
        if($id == 1){
            return view('book/past', [
                'book' => $books,
                'reviews' => $reviewall,
                'id' => $id,
                // 'nice' => $nice,
            ]);
        }else{
            return view('book/past', [
                'book' => $books,
                'reviews' => $reviews,
                // 'nice' => $nice,
            ]);
        }

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
        $book = $query->orderBy('created_at','desc')->paginate(6);
        $books = $book->where('review_id', '!=', null);

        $id = null;
        // dd($data);
        // return view('search')->with('data',$data)
        // ->with('keyword',$keyword)->with('message','ユーザーリスト');
        // dd($books);
        if(!empty($keyword)){
            return view('search', [
                'books' => $books,
                'keyword' => $keyword,
                // 'datas' => $data,
            ]);
        }else{
            return view('home', [
                'books' => $books,
                'id' => $id,
            ]);
        }
    }
}

