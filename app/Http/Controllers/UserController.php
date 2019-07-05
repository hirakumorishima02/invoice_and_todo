<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $list = Client::get();
        return view('user.user', compact('list','active1','active2'));
    }
}
