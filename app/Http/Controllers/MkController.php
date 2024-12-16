<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MkController extends Controller
{
    function index()
    {
        return view('layouts.index');
    }
}
