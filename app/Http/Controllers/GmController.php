<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GmController extends Controller
{
    function index()
    {
        return view('layouts.index');
    }
}
