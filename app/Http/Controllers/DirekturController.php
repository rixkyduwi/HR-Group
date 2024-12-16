<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DirekturController extends Controller
{
    function index()
    {
        return view('layouts.index');
    }
}
