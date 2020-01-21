<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorVistaController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('profesor.index');
    }
}
