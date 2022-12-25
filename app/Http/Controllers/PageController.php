<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    public function index()
    {
        return view('index');
    }

    protected function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);


        $credentials = $request->only('email', 'password');
         
        if (Auth::attempt($credentials)) {
            return redirect()->route('eform');
        }
  
        // if the given data is not correct 
        return view('death');
    }

    protected function eform()
    {
        return view('evaluationForm');
    }
}
