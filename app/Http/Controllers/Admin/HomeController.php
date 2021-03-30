<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use User;

class HomeController extends Controller
{
    public function index(){
        return view('admin.home');
    }

    public function profile(){
        return view('admin.user.profile');
    }

    public function generaToken(){
        $api_token = Str::random(80);
        // seleziono utente a cui assegno token
        $user = Auth::user();
        $user->api_token = $api_token;
        $user->save();

        return redirect()->route('admin.user.profile');
    }
}
