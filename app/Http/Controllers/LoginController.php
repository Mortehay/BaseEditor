<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    function checklogin(Request $request)
    {
        $this->validate($request, [
            'email'=> 'required|email',
            'password'=> 'required|alphaNum|min:3'
        ]);
        $user_data = [
            'email' => $request->get('email'),
            'password'=>$request->get('password')
        ];
        if(Auth::attempt($user_data)){
            return redirect('/hotelsheet');
        } else {
            return back()->with('error', 'wrong login details');
        }
    }
    public function successlogin()
    {
        $hotels = DB::table('hotels')->get();
        $regions= DB::table('regions')->get();
        return view('hotelsheet',compact('hotels', 'regions'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
