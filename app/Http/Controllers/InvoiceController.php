<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User_info;
use App\Invoice;
use App\Client;
use App\Bill;
use App\Item;
use App\Http\Requests\UserInfoRequest;
use App\Http\Requests\InvoiceRequest;


use TCPDF;
use TCPDF_FONTS;

use PDF;



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
        $user_infoList = User_info::where('user_id','=',Auth::user()->id)->get();
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
    public function updateUser(UserInfoRequest $request){
        if(isset($request->id)) {
            $user = User_info::find($request->id);
            $user->user_id = $request->user_id;
            $user->postal_code = $request->postal_code;
            $user->address = $request->address;
            $user->tel_number = $request->tel_number;
            $user->fax_number = $request->fax_number;
            $user->email = $request->email;
            $user->billing_name = $request->billing_name;
            $user->bank_account = $request->bank_account;
            $user->update();
        } else {
            $user = new User_info;
            $user->user_id = Auth::user()->id;
            $user->postal_code = $request->postal_code;
            $user->address = $request->address;
            $user->tel_number = $request->tel_number;
            $user->fax_number = $request->fax_number;
            $user->email = $request->email;
            $user->billing_name = $request->billing_name;
            $user->bank_account = $request->bank_account;
            $user->save();   
        }
        
        return redirect('/editUser');
    }
    public function checkClient(){
        $list = Client::where('user_id','=',Auth::user()->id)->get();
        return view('invoice.checkClient', compact('list'));
    }
    public function toAddInvoice(Request $request){
        $clientList = Client::find($request->id);
        $id = $request->id;
        $user_infoList = User_info::where('user_id','=',Auth::user()->id)->get();
        return view('invoice.addInvoice', compact('clientList', 'user_infoList', 'id'));
    }

    // 請求書ヘッダ情報の追加・更新・削除
    public function addNewInvoice(InvoiceRequest $request){
        $invoice = new Invoice();
        $invoice->user_id = Auth::user()->id;
        $invoice->client_id = $request->client_id;
        // invoiceテーブルのbilling_name（請求宛先名）にclientテーブルのclient_name（クライアント名）を登録したい。リレーション？
        $invoice->billing_name = $request->billing_name;
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
        $bill->unit = $item->unit;
        $bill->save();
        
        //請求ヘッダの金額、数量の再計算 111行目を参考にする(アップデート)
        
        //もう１度、案件一覧表示
        //$client = $item->client->client_name;
        
        $list = Item::where('client_id', '=', $request->client_id)->get();
        $client = Client::find($request->client_id);
        $invoiceList = Invoice::where('user_id','=',Auth::user()->id)->get();
        return view('todo.items', compact('list', 'client', 'invoiceList'));
        
    }
    
    public function deleteFromBill(Request $request)
    {
        $bill = Bill::where('id', '=', $request->id)->first();
        $bill->delete();
        return back();
    }
    
     public function makeInvoice(Request $request, $clientId, $invoiceId)
     {
        $invoice = Invoice::where('id', '=', $invoiceId)->first();
        $invoice->subtotal = $request->subtotal;
        $invoice->withholding_tax = $request->withholding_subtotal;
        $invoice->tax_amount = $request->sales_subtotal;
        $invoice->sum_price = $request->sum_price;
        $invoice->billing_name = $request->billing_name_clients;
        $invoice->invoice_title = $request->invoice_title;
        $invoice->billing_day = $request->billing_day;
        $invoice->payment_day = $request->payment_day;
        $invoice->invoice_message = $request->invoice_message;
        $invoice->invoice_number = $request->invoice_number;
        $invoice->save();
         
        $user_info = User_info::where('id', '=', $request->userInfo_id)->first();
        $user_info->billing_name = $request->billing_name;
        $user_info->postal_code = $request->postal_code;
        $user_info->address = $request->address;
        $user_info->tel_number = $request->tel_number;
        $user_info->fax_number = $request->fax_number;
        $user_info->email = $request->email;
        $user_info->save();
        
        $client = Client::where('id', '=', $request->clientId)->first();
        $client->personnel = $request->personnel_name;
        $client->save();
        
       $i = 0;
       foreach($request->bill_id as $id){
           $bill = Bill::find($id);
           $bill->billing_item = $request->billing_item[$i];
           $bill->unit = $request->unit[$i];
           $bill->quantity = $request->quantity[$i];
           $bill->bill_unit_price = $request->bill_unit_price[$i];
           $bill->save();
           $i++;
       }
         
        $invoiceList = Invoice::where('id','=', $invoiceId)->get();
        $user_infoList = User_info::where('user_id','=',Auth::user()->id)->get();
        $billList = Bill::where('invoice_id','=', $invoiceId)->get();
        // tax_rateとwithholding_tax_rateを引き出すために対象Clientを引き出したい
        $clientList = Client::where('id','=', $clientId)->get();
        
        
        // PDF生成　－　A4 縦に設定
	        $pdf = new TCPDF("P", "mm", "A4", true, "UTF-8" );
	        $pdf->setPrintHeader(false);
	        $pdf->setPrintFooter(false);
	        
	        // PDF プロパティ設定
	        $pdf->SetTitle($request->invoice_title);  // PDFドキュメントのタイトルを設定  http://tcpdf.penlabo.net/method/s/SetTitle.html
	        $pdf->SetAuthor($request->billing_name);  // PDFドキュメントの著者名を設定  http://tcpdf.penlabo.net/method/s/SetAuthor.html
	        $pdf->SetSubject($request->invoice_title);  // PDFドキュメントのサブジェクト(表題)を設定  http://tcpdf.penlabo.net/method/s/SetSubject.html
	        $pdf->SetCreator('Hiraku Morishima');  // PDFドキュメントの製作者名を設定  http://tcpdf.penlabo.net/method/s/SetCreator.html
	
	        // 日本語フォント設定
	        $pdf->setFont('kozminproregular','',10);
	
	        // ページ追加
	        $pdf->addPage();
	
	         // HTMLを描画、viewの指定と変数代入
	        $pdf->writeHTML(view('invoice.pdfInvoice', compact('invoiceList','user_infoList','billList', 'clientList' , 'clientId' ,'invoiceId')));
	        
	        // 出力指定 ファイル名、拡張子、I(ストリームのみ)
	        $pdf->output($request->invoice_title . '.pdf', 'I');
	        return;
     }
}
