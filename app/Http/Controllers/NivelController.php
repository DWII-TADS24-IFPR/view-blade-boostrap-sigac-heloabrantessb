<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function index(){
        $niveis = Nivel::all();

        return view('niveis.index')->with('niveis', $niveis);
    }
}
