<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class UserController extends Controller
{
    public function user(){
        $list = Client::get();
        return view('user.user', compact('list'));
    }
}
