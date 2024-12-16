<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MpController extends Controller
{
    function index()
    {
        return view('layouts.index');
    }
}
