<?php

namespace App\Http\Controllers;

use App\Ofimatica;
use Illuminate\Http\Request;

class OfimaticaController extends Controller
{

    public function index()
    {
        $result = Ofimatica::where('ID','<','73445')->orderBy('id','desc')->paginate(10);
        return view('ofimatica',compact('result'));
    }

}
