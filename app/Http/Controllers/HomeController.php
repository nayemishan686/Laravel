<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    //deposite perpose
    public function deposite(){
        return view('deposite');
    }

    //verification resend
    public function resend(){

    }

    //about id details
    public function details($id){
        $newId = Crypt::decryptString($id);
        echo $newId;
    }

    //store pass
    public function store(Request $request){
        $pass = Hash::make($request->password);
        echo $pass;
    }
}
