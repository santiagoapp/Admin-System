<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargo;

class CargoController extends Controller
{
	public function index()
	{
		return view('cargos');
	}
	public function getCargos(){
		return Cargo::orderBy('id','desc')->get();
	}
}
