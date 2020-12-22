<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
//        if (Auth::user()->role === 1) {
            return view('studentDashboard');
//        } elseif (Auth::user()->role === 2) {
//            return view('ROCDashboard');
//        }


    }
}
