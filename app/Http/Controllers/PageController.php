<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Evaluation;

class PageController extends Controller
{
    // go to the index page which is login form
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view('login');
    }

    // authenticate the user
    protected function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);


        $credentials = $request->only('email', 'password');
         
        if (Auth::attempt($credentials)) {
            return redirect()->route('index');
        }
  
        // if the given data is not correct go to login page
        return redirect()->route('login');
    }

    ////////////////////////////////// Business page redirect 
    protected function business($bName)
    {
        return view('business', compact('bName'));
    }

    //////////////////////////////// Evaluation Form ////////////////////////////////////
    // go to evaluation form 
    protected function eform($bName)
    {
        return view('evaluationForm', compact('bName'));
    }

    // save the submission into the database
    protected function evaluationUpdate(Request $request)
    {
        $bName = $request -> input('bName');
        $data =  Evaluation::where('business_Name',$bName)
                ->update([
                    'HRM' => $request -> input('HRM'),
                    'Innovation' => $request -> input('Inn'),
                    'Sustainibility' => $request -> input('Sus'),
                    'Finance' => $request -> input('Fin'),
                    'Entrepreneurial_Drive' => $request -> input('Ent'),
                    'Sponsorship' => $request -> input('Spon'),
                    'Social_Media' => $request -> input('SM'),
                    'Digital_Ads' => $request -> input('DA'),
                    'Promotions' => $request -> input('PA')
                ]);

        return redirect()->route('business', [$bName]);
    }


    //////////////////////////////// Sales Form ////////////////////////////////////
    // go to sales form 
    protected function salesForm($bName)
    {
        return view('salesForm', compact('bName'));
    }

    // update the sales data in the databse
    protected function salesUpdate(Request $request)
    {
        $bName = $request -> input('bName');
        $data =  Evaluation::where('business_Name',$bName)
                ->update([
                    'Sales' => $request -> input('Sales'),
                    'Sales_Money' => $request -> input('money')
                ]);

        return redirect()->route('business', [$bName]);
    }

}
