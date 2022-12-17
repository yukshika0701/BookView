<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Nice;
use Illuminate\Support\Facades\Auth;

class NiceController extends Controller
{
    
    public function nice(Review $review, Request $request){
        $nice=New Nice();
        $nice->review=$review->id;
        $nice->user_id=Auth::user()->id;
        $nice->save();
        return back();
    }

    public function unnice(Review $review, Request $request){
        $user=Auth::user()->id;
        $nice=Nice::where('review', $review->id)->where('user_id', $user)->first();
        $nice->delete();
        return back();
    }
}