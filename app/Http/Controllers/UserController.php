<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function getSignup(){
        return View('login');
        }

    public function postSignup(Request $request){
        // バリデーション
        $this->validate($request,[
          'name' => 'required',
          'email' => 'email|required|unique:users',
          'password' => 'required|min:4',
          'gender' => 'required',
          'age' => 'required',
          'admin_flg' => 'required'
        ]);
       
        // DBインサート
        $user = new User([
          'name' => $request->input('name'),
          'email' => $request->input('email'),
          'password' => bcrypt($request->input('password')),
          'gender' => 'required',
          'age' => 'required',
          'admin_flg' => 'required'
        ]);
       
        // 保存
        $user->save();
       
        // リダイレクト
        return redirect()->route('home');
      }
      public function getProfile(){
        return view('home');
      }
}
