<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        return redirect()->route('business', [$bName]);
    }


    
    
     //////////////////////////////// Get Data from DB for showing in Leaderboard ////////////////////////////////////
     protected function getStallData(){
        $stallData = DB::table('evaluation1s')

            ->join('evaluation2s', 'evaluation1s.business_Name', '=', 'evaluation2s.business_Name')
            ->join('evaluation3s', 'evaluation1s.business_Name', '=', 'evaluation3s.business_Name')

            ->select('evaluation1s.*',
            'evaluation2s.HRM as HRM2', 'evaluation2s.Innovation as Innovation2', 'evaluation2s.Sustainibility as Sustainibility2', 'evaluation2s.Clean as Clean2',
            'evaluation2s.Doc as Doc2', 'evaluation2s.Decor as Decor2', 'evaluation2s.Sponsorship as Sponsorship2', 'evaluation2s.Social_Media as Social_Media2',
            'evaluation2s.Digital_Ads as Digital_Ads2', 'evaluation2s.Promotions as Promotions2',

            'evaluation3s.HRM as HRM3', 'evaluation3s.Innovation as Innovation3', 'evaluation3s.Sustainibility as Sustainibility3', 'evaluation3s.Clean as Clean3',
            'evaluation3s.Doc as Doc3', 'evaluation3s.Decor as Decor3', 'evaluation3s.Sponsorship as Sponsorship3', 'evaluation3s.Social_Media as Social_Media3',
            'evaluation3s.Digital_Ads as Digital_Ads3', 'evaluation3s.Promotions as Promotions3'
            
            )
            ->orderby('Sales_Money', 'DESC') 
            ->get();


            $arr = array();
            $count = 0;
            $assign_sales = 5;


        foreach ($stallData as $row){
            $count += 1;
        
            //stall data from 1st evaluation team
            $points1 = ($row->HRM*0.10) + ($row->Innovation*0.15)+
            ($row->Sustainibility*0.15) + ($row->Clean*0.05) +($row->Doc*0.05) +
            ($row->Decor*0.10) + ($row->Sponsorship*0.05) + ($row->Social_Media*0.05) 
            + ($row->Digital_Ads*0.05) + ($row->Promotions*0.05) ;  

            //stall data from 2nd evaluation team
            $points2 = ($row->HRM2 *0.10) + ($row->Innovation2*0.15)+
            ($row-> Sustainibility2*0.15) + ($row->Clean2*0.05) +($row->Doc2*0.05) +
            ($row-> Decor2*0.10) + ($row->Sponsorship2*0.05) + ($row->Social_Media2*0.05) 
            + ($row-> Digital_Ads2*0.05) + ($row->Promotions2*0.05);  



            //calculate total points by adding result the data from evaluation 1 with sale points
            $points1 = (($points1 +  $assign_sales*0.2)/ 6.0) * 100;
            //calculate total points by adding result the data from evaluation 2 with sale points
            $points2 = (($points2 +  $assign_sales*0.2)/ 6.0) * 100;

            

            $points = number_format((($points1 + $points2) / 2.0), 2, '.', '');
  
            $bname =  $row->business_Name;

            //put the data including stallname and its total points into array
            array_push($arr,["Bname" => $bname, "Points" => $points]);

            //assign sale points to every 6 stalls starting from 10 to 1
            if($count == 6){
                $assign_sales -= 0.5;
                $count = 0;
            }
   
        }

        // sort the array based on points in descending order
        $columns = array_column($arr, 'Points');
        array_multisort($columns, SORT_DESC, $arr);
        
        // get the top 10 stalls and their points and send it to the view
        $top_10 = array();
        for($i=0;$i<10;$i++)
        {
            array_push($top_10, ["Bname" => $arr[$i]['Bname'], "Points" => $arr[$i]['Points']]); 
        }
        return view('main_board',['top_10' => $top_10]);

    }


}


