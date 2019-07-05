<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Client;

class UserController extends Controller
{
    public function user($activeNo){
        if($activeNo == 1)
        {
            $active1 = "is-active-item";
            $active2 = "";
        }else{
            $active1 = "";
            $active2 = "is-active-item";
        }
        $list = Client::where('user_id','=', Auth::user()->id)->get();
        return view('user.user', compact('list','active1','active2'));
    }
}
