<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Review;
use App\Nice;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Book;
use App\Http\Requests\CreateData;
use InterventionImage;
use Illuminate\Support\Collection; 
use Illuminate\Pagination\LengthAwarePaginator;

class NiceController extends Controller
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
     * @param  \App\Nice  $nice
     * @return \Illuminate\Http\Response
     */
    public function show(Nice $nice)
    {
        // dd($nice);
        // $book = new Book;
        // $review = new Review;
        // return view('book/show', [
        //     'book' => $book,
        //     'review' => $review,
        // ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nice  $nice
     * @return \Illuminate\Http\Response
     */
    public function edit(Nice $nice)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nice  $nice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nice $nice)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nice  $nice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nice $nice)
    {
        //
    }
    
}
