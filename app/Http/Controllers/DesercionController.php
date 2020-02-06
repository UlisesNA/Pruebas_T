<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class DesercionController extends Controller
{
    public function index(Request $request)
    {

        return view('profesor.desercion');
    }

}
