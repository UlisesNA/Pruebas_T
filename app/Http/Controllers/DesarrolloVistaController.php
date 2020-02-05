<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesarrolloVistaController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('desarrollo.index');
    }
}
