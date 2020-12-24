<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index(User $user)
    {

//        $user= User::query()->where('id', '=', 4);
//        $password = password_hash('test123', PASSWORD_BCRYPT);
//        $user->password = $password;
//        $user->update($password);

//        if (Auth::user()->role === 1) {
            return view('studentDashboard', ['user'=>$user]);
//        } elseif (Auth::user()->role === 2) {
//            return view('ROCDashboard');
//        }


    }
}
