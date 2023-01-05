<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Evaluation1;
use App\Models\Evaluation2;
use App\Models\Evaluation3;

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

    /// logout user 
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
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

    ////////////////////////////////// Business page redirect ////////////////////////////////////
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
        $user = auth()->user();

        $bName = $request -> input('bName');

        // If user is BFest Team 1 then save the data into Evaluation 1 Table
        if ($user->name == "BFest Team 1"){
            $data =  Evaluation1::where('business_Name',$bName)
                ->update([
                    'HRM' => $request -> input('HRM'),
                    'Innovation' => $request -> input('Inn'),
                    'Sustainibility' => $request -> input('Sus'),
                    'Clean' => $request -> input('Clean'),
                    'Doc' => $request -> input('Doc'),
                    'Decor' => $request -> input('Decor'),
                    'Sponsorship' => $request -> input('Spon'),
                    'Social_Media' => $request -> input('SM'),
                    'Digital_Ads' => $request -> input('DA'),
                    'Promotions' => $request -> input('PA')
                ]);
        }

        // If user is BFest Team 2 then save the data into Evaluation 2 Table
        if ($user->name == "BFest Team 2"){
            $data =  Evaluation2::where('business_Name',$bName)
                ->update([
                    'HRM' => $request -> input('HRM'),
                    'Innovation' => $request -> input('Inn'),
                    'Sustainibility' => $request -> input('Sus'),
                    'Clean' => $request -> input('Clean'),
                    'Doc' => $request -> input('Doc'),
                    'Decor' => $request -> input('Decor'),
                    'Sponsorship' => $request -> input('Spon'),
                    'Social_Media' => $request -> input('SM'),
                    'Digital_Ads' => $request -> input('DA'),
                    'Promotions' => $request -> input('PA')
                ]);
        }

        // If user is BFest Team 3 then save the data into Evaluation 3 Table
        if ($user->name == "BFest Team 3"){
            $data =  Evaluation3::where('business_Name',$bName)
                ->update([
                    'HRM' => $request -> input('HRM'),
                    'Innovation' => $request -> input('Inn'),
                    'Sustainibility' => $request -> input('Sus'),
                    'Clean' => $request -> input('Clean'),
                    'Doc' => $request -> input('Doc'),
                    'Decor' => $request -> input('Decor'),
                    'Sponsorship' => $request -> input('Spon'),
                    'Social_Media' => $request -> input('SM'),
                    'Digital_Ads' => $request -> input('DA'),
                    'Promotions' => $request -> input('PA')
                ]);
        }

        return redirect()->route('business', [$bName]);
    }


    //////////////////////////////// Sales Form ////////////////////////////////////
    // go to sales form 
    protected function salesForm($bName)
    {
        return view('salesForm', compact('bName'));
    }

    // update the sales data in the database
    protected function salesUpdate(Request $request)
    {
        $user = auth()->user();

        $bName = $request -> input('bName');

        // If user is BFest Team 1 then save the data into Evaluation 1 Table
        if ($user->name == "BFest Team 1"){
            $data =  Evaluation1::where('business_Name',$bName)
                ->update([
                    'Sales_Money' => $request -> input('money')
                ]);
        }

        // If user is BFest Team 2 then save the data into Evaluation 2 Table
        if ($user->name == "BFest Team 2"){
            $data =  Evaluation2::where('business_Name',$bName)
                ->update([
                    'Sales_Money' => $request -> input('money')
                ]);
        }

        // If user is BFest Team 3 then save the data into Evaluation 3 Table
        if ($user->name == "BFest Team 3"){
            $data =  Evaluation3::where('business_Name',$bName)
                ->update([
                    'Sales_Money' => $request -> input('money')
                ]);
        }

        return redirect()->route('business', [$bName]);
    }





    //////////////////////////////// Get Data from DB for showing in Leaderboard ////////////////////////////////////
    protected function getStallData(){
        $stallData = bfest::table('EvalTeam1')
            ->join('EvalTeam2', 'EvalTeam1.business_Name', '=', 'EvalTeam2.business_Name')
            ->join('EvalTeam3', 'EvalTeam1.business_Name', '=', 'EvalTeam3.business_Name')
            ->select('EvalTeam1.*', 'EvalTeam2.*', 'EvalTeam3.*')
            ->get();
        $arr = array();
        foreach ($stallData as $row){
            $points1 = ($row['EvalTeam1.HRM']*0.10) + ($row['EvalTeam1.Innovation']*0.15)+
            ($row['EvalTeam1.Sustainibility']*0.15) + ($row['EvalTeam1.Clean']*0.05) +($row['EvalTeam1.Doc']*0.05) +
            ($row['EvalTeam1.Decor']*0.10) + ($row['EvalTeam1.Sponsorship']*0.05) + ($row['EvalTeam1.Social_Media']*0.05) 
            + ($row['EvalTeam1.Digital_Ads']*0.05) + ($row['EvalTeam1.Promotions']*0.05) + ($row['EvalTeam1.Sales']*0.20);  


            $points2 = ($row['EvalTeam2.HRM']*0.10) + ($row['EvalTeam2.Innovation']*0.15)+
            ($row['EvalTeam2.Sustainibility']*0.15) + ($row['EvalTeam2.Clean']*0.05) +($row['EvalTeam2.Doc']*0.05) +
            ($row['EvalTeam2.Decor']*0.10) + ($row['EvalTeam2.Sponsorship']*0.05) + ($row['EvalTeam2.Social_Media']*0.05) 
            + ($row['EvalTeam2.Digital_Ads']*0.05) + ($row['EvalTeam2.Promotions']*0.05) + ($row['EvalTeam2.Sales']*0.20);  

            $points3 = ($row['EvalTeam3.HRM']*0.10) + ($row['EvalTeam3.Innovation']*0.15)+
            ($row['EvalTeam3.Sustainibility']*0.15) + ($row['EvalTeam3.Clean']*0.05) +($row['EvalTeam3.Doc']*0.05) +
            ($row['EvalTeam3.Decor']*0.10) + ($row['EvalTeam1.Sponsorship']*0.05) + ($row['EvalTeam3.Social_Media']*0.05) 
            + ($row['EvalTeam3.Digital_Ads']*0.05) + ($row['EvalTeam3.Promotions']*0.05) + ($row['EvalTeam3.Sales']*0.20);  

            $points1 = ($points1 / 6.0) * 100;
            $points2 = ($points2 / 6.0) * 100;
            $points3 = ($points3 / 6.0) * 100;

            $points = number_format((($points1 + $points2 +$points3) / 3.0), 2, '.', '');


            $bname =  $row['EvalTeam1.business_Name'];
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


