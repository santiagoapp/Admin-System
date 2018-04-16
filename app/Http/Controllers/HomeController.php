<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OT;

class HomeController extends Controller
{
	public function index()
	{
		$result = OT::where('ID','<','73445')->orderBy('id','desc')->paginate(10);
		return view('home',compact('result'));
	}
}
