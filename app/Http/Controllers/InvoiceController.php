<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User_info;
use App\Invoice;
use App\Client;
use App\Bill;
use App\Item;


class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function invoices($clientId){
        $invoiceList = Invoice::where('client_id', '=', $clientId)->get();
        return view('invoice.invoices', compact('invoiceList','clientId'));
    }
    public function invoice($clientId, $invoiceId){
        $invoiceList = Invoice::where('id','=', $invoiceId)->get();
        $user_infoList = User_info::all();
        $billList = Bill::where('invoice_id','=', $invoiceId)->get();
        // tax_rateとwithholding_tax_rateを引き出すために対象Clientを引き出したい
        $clientList = Client::where('id','=', $clientId)->get();
        return view('invoice.invoice', compact('invoiceList','user_infoList','billList', 'clientList' , 'clientId' ,'invoiceId'));
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
    public function checkClient(){
        $list = Client::all();
        return view('invoice.checkClient', compact('list'));
    }
    public function toAddInvoice(Request $request){
        $clientList = Client::find($request->id);
        $id = $request->id;
        $user_infoList = User_info::all();
        return view('invoice.addInvoice', compact('clientList', 'user_infoList', 'id'));
    }

    // 請求書ヘッダ情報の追加・更新・削除
    public function addNewInvoice(Request $request){
        $invoice = new Invoice();
        $invoice->user_id = Auth::user()->id;
        $invoice->client_id = $request->client_id;
        // invoiceテーブルのbilling_name（請求宛先名）にclientテーブルのclient_name（クライアント名）を登録したい。リレーション？
        $invoice->billing_name = $request->billing_name;
        $invoice->billing_address = $request->billing_address;
        $invoice->invoice_title = $request->invoice_title;
        $invoice->invoice_message = $request->invoice_message;
        $invoice->subtotal = $request->subtotal;
        $invoice->withholding_tax = $request->withholding_tax;
        $invoice->tax_amount = $request->tax_amount;
        $invoice->sum_price = $request->sum_price;
        $invoice->payment_day = $request->payment_day;
        $invoice->billing_day = $request->billing_day;
        $invoice->save();
        
        return redirect('/user');
    }
    
    // 請求書にItemのデータを挿入する
    public function addInvoice(Request $request){
        // 案件ID（Item_ID）を一つもらって、その案件のステータスを変更する。請求ヘッダIDを入れる。
        $item = Item::find($request->item_id);
        $item->states = $request->states;
        $item->invoice_id = $request->invoice_id;
        $item->save();
        
        // 請求明細の追加 88行目を参考にする
        $bill = new Bill();
        $bill->invoice_id = $request->invoice_id;
        $bill->billing_item = $item->item_name;
        $bill->quantity = 1;
        $bill->bill_unit_price = $item->unit_price;
        $bill->unit = '本';
        $bill->save();
        
        //請求ヘッダの金額、数量の再計算 111行目を参考にする(アップデート)
        
        //もう１度、案件一覧表示
        //$client = $item->client->client_name;
        
        $list = Item::where('client_id', '=', $request->client_id)->get();
        $client = Client::find($request->client_id);
        $invoiceList = Invoice::all();
        return view('todo.items', compact('list', 'client', 'invoiceList'));
        
    }
    
    public function deleteFromBill(Request $request)
    {
        $bill = Bill::where('id', '=', $request->id)->first();
        $bill->delete();
        return back();
    }
    
     public function makeInvoice(Request $request, $invoiceId, $clientId)
     {
        $invoice = Invoice::where('id', '=', $request->invoice_id)->first();
        $invoice->billing_name = $request->billing_name_clients;
        $invoice->billing_day = $request->billing_day;
        $invoice->invoice_title = $request->invoice_title;
        $invoice->payment_day = $request->payment_day;
        $invoice->save();
         
        $user_info = User_info::where('id', '=', $request->userInfo_id)->first();
        $user_info->billing_name = $request->billing_name;
        $user_info->postal_code = $request->postal_code;
        $user_info->address = $request->address;
        $user_info->tel_number = $request->tel_number;
        $user_info->fax_number = $request->fax_number;
        $user_info->billing_message = $request->billing_message;
        $user_info->save();
        
         
        $invoiceList = Invoice::where('id','=', $invoiceId)->get();
        $user_infoList = User_info::all();
        $billList = Bill::where('invoice_id','=', $invoiceId)->get();
        // tax_rateとwithholding_tax_rateを引き出すために対象Clientを引き出したい
        $clientList = Client::where('id','=', $clientId)->get();
        
        return view('invoice.pdfInvoice', compact('invoiceList','user_infoList','billList', 'clientList' , 'clientId' ,'invoiceId'));
     }
}
