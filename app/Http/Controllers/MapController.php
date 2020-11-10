<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
#use Illuminate\Support\Facades\Request;
use GuzzleHttp;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Input;

class MapController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function index(){
		return view('map');
	}
	
	public function show(Request $request){

		if ($request->isMethod('post'))
		{
			$address = $request->input('address');
			//Converts address into Lat and Lng
			$client = new Client(['verify' => 'C:\wamp64\bin\php\php5.6.40\cacert.pem']); //GuzzleHttp\Client
			$result =(string) $client->post("https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=AIzaSyDRDERH9E1ceBnUmle3DaartO_JG_amn0M")->getBody();
			$json =json_decode($result);
			
			$latlong->lat =$json->results[0]->geometry->location->lat;
			$latlong->long =$json->results[0]->geometry->location->lng;
			
			return view('show', ['latlong' => $latlong]);
		}
		die('Error Submitting');
	}
	
}
