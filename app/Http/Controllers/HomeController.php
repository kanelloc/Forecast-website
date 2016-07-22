<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
	public function index()
	{
		return view('home');
	}

	public function postSearch(Request $request)
	{
		$this->validate($request,[
			'lat' 		=>'required',
            'lng' 		=> 'required',
            'searchMap'	=>	'required'
			]);

		$lat = $request->input('lat');
		$lng = $request->input('lng');
		$name= $request->input('searchMap');
		$url = 'https://api.forecast.io/forecast/1c12eedd3fdf5a6c102a5ed0fe416b59/'.$lat.','.$lng;
		$dynamic_url = file_get_contents($url);
		$obj = json_decode($dynamic_url);
		//Measurements
		$temperature_celsius = ($obj->currently->temperature-32)/1.7000;
		$temperature_celsius = number_format($temperature_celsius, 1);

		$wind_speed = ($obj->currently->windSpeed)*1.6093;
		$wind_speed = number_format($wind_speed, 1);

		$rain_prob = $obj->currently->precipProbability;
		$rain_prob = number_format($rain_prob, 1);

		$dateTime = $obj->currently->time + (3*3600);
		$convertedTime = date("D F j, Y", $dateTime);

		$weekly = $obj->daily->data;
		$weekly = json_encode($weekly);
		$weeklyArray = json_decode($weekly, true);
		
	
		return view('showWeather',[
			'obj' 					=>	$obj,
			'name'					=>	$name,
			'temperature_celsius'	=>	$temperature_celsius,
			'wind_speed'			=>	$wind_speed,
			'rain_prob'				=>	$rain_prob,
			'convertedTime'			=>	$convertedTime,
			'weeklyArray'			=>	$weeklyArray]);
	}
    
}
