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
		return view('showWeather',[
			'obj' 	=>	$obj,
			'name'	=>	$name]);
	}
    
}
