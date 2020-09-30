<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:enseignant');
    }
    public function index (){


        return view('enseignants.index');
    }
}
