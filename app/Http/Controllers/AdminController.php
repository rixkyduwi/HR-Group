<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        return view('layouts.index');
    }
}
