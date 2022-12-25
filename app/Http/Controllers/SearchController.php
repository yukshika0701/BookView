<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Book;
use App\Review;
use App\Nice;
use App\Http\Requests\CreateData;
use App\Http\Requests\Storebook;
use Illuminate\Support\Facades\Auth;
use InterventionImage;
use Illuminate\Support\Collection; 
use Illuminate\Pagination\LengthAwarePaginator; 

class SearchController extends Controller
{
    
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
        $id = Auth::user()->admin_flg;
        
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
