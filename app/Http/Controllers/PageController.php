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

    //////////////////////////////// Get Data from DB for showing in Leaderboard ////////////////////////////////////
    protected function getStallData(){
        $stallData = Evaluation::all();
        $arr = array();
        foreach ($stallData as $row){
            $points = ($row['HRM']*0.10) + ($row['Innovaion']*0.15)+
            ($row['Sustainibility']*0.15) + ($row['Finance']*0.10) +($row['Entrepreneurial_Drive']*0.10) +
            ($row['Sponsorship']*0.05) + ($row['Social_Media']*0.05) + ($row['Digital_Ads']*0.05) +
            ($row['Promotions']*0.05) + ($row['Sales']*0.20);  
            $bname =  $row['business_Name'];
            $arr[] = ["Bname" => $bname, "Points" => $points];
        }

        // sort the array based on points in descending order
        $columns = array_column($arr, 'Points');
        array_multisort($columns, SORT_DESC, $arr);

        // get the top 10 businesses and their points and send it to the view
        $top_10 = array();
        for($i=0;$i<10;$i++)
        {
            array_push($top_10, array($arr[$i]["Bname"], $arr[$i]["Points"]));
        }
        
        return view('main_board',['top_10' => $top_10]);

    }
}


