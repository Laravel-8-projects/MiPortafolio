<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Extra;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class PortafolioController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::get();
        $extras = Extra::all();
        //dd($extras);
        return view('welcome' , compact('proyectos','extras'));
    }
}
