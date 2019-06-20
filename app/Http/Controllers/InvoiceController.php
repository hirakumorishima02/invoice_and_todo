<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User_info;


class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function invoice(){
        return view('invoice.invoice');
    }
    public function editUser(){
        $list = User_info::where('user_id','=',Auth::user()->id)->first(); //ログインしているユーザーのデータを取るときに使える。
        // 最初はDBにデータがないので空のインスタンスを渡す
        if(!isset($list)) {
            $list = new User_info;
        }
        return view('invoice.editUser', compact('list'));
    }
    public function updateUser(Request $request){
        $validatedData = $request->validate([
            'postal_code' => 'required',
            'address' => 'required',
            'tel_number' => 'required',
            'fax_number' => 'required',
            'billing_name' => 'required',
            'bank_account' => 'required',
            'billing_message' => 'required',
        ]);
        if(isset($request->id)) {
            $user = User_info::find($request->id);
            $user->user_id = $request->user_id;
            $user->postal_code = $request->postal_code;
            $user->address = $request->address;
            $user->tel_number = $request->tel_number;
            $user->fax_number = $request->fax_number;
            $user->billing_name = $request->billing_name;
            $user->bank_account = $request->bank_account;
            $user->billing_message = $request->billing_message;
            $user->update();
        } else {
            $user = new User_info;
            $user->user_id = Auth::user()->id;
            $user->postal_code = $request->postal_code;
            $user->address = $request->address;
            $user->tel_number = $request->tel_number;
            $user->fax_number = $request->fax_number;
            $user->billing_name = $request->billing_name;
            $user->bank_account = $request->bank_account;
            $user->billing_message = $request->billing_message;
            $user->save();   
        }
        
        return redirect('/editUser');
    }
    
}
