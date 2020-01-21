<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JefeVistaController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('jefe.index');
    }
}
