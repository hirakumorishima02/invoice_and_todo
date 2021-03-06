<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Client;

class UserController extends Controller
{
    public function user(){
        $list = Client::where('user_id','=', Auth::user()->id)->get();
        return view('user.user', compact('list'));
    }
}
