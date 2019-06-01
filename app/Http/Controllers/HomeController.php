<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
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

    public function getToken(Request $request)
    {
        //return $request;
         $response = Curl::to('http://ch-api-test.herokuapp.com/auth')

                 ->withData(['email'=>$request->email, 'password'=>$request->password])

                 ->post();

         return response()->json($response);

       
    }

    public function getData(Request $request)
    {
       $header = $request->header('Authorization');       

       $ch = curl_init('http://ch-api-test.herokuapp.com/json'); // Initialise cURL
     
       $authorization = "Authorization: ".$header; // Prepare the authorisation token
       curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization )); // Inject the token into the header
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);       
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
       $result = curl_exec($ch); 
       curl_close($ch); 
       $yummy =json_decode($result, true);    

        $array = $yummy['data'];   // return $array;
        
        foreach($array as $row)
        {            
    
            if($row["status"]!='cancelled'){
                DB::table('appointment')->insert([
                                    //'id'      => $row["id"],
                                    'datetime'   => $row["datetime"],
                                    'status'      => json_encode($row["status"]),
                                    'patient'       => json_encode($row["patient"]),
                                    'doctor'       => json_encode($row["doctor"]),
                                    'clinic'       => json_encode($row["clinic"]),
                                    'specialty'       => json_encode($row["specialty"])
                ]);
            }
            
        }
       return 'OK';  
    }
}
