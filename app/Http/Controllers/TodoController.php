<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\User;
use App\Item;
use App\Invoice;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addClient(){
        return view('todo.addClient');
    }
    public function addItem(){
        $list = Client::all();
        return view('todo.addItem', compact('list'));
    }
    public function items($id){
        $list = Item::where('client_id', '=', $id)->get();
        $client = Client::find($id);
        $invoiceList = Invoice::all();
        return view('todo.items', compact('list','client', 'invoiceList'));
    }
    
    // クライアント情報の追加・更新・削除
    public function addNewClient(Request $request){
        $client = new Client();
        $client->user_id = Auth::user()->id;
        $client->client_name = $request->client_name;
        $client->personnel = $request->personnel;
        $client->client_tel_number = $request->client_tel_number;
        $client->client_address = $request->client_address;
        $client->sales_tax_rate = $request->sales_tax_rate;
        $client->withholding_tax_rate = $request->withholding_tax_rate;
        $client->tax_category = $request->tax_category;
        $client->fraction = $request->fraction;
        $client->save();
        
        return redirect('/user');
    }
    public function editClient($id){
        $list = Client::find($id);
        return view('todo.editClient', compact('list'));
    }
    public function updateClient(Request $request){
        $client = Client::where('id', '=', $request->id)->first();
        $client->user_id = Auth::user()->id;
        $client->client_name = $request->client_name;
        $client->personnel = $request->personnel;
        $client->client_tel_number = $request->client_tel_number;
        $client->client_address = $request->client_address;
        $client->sales_tax_rate = $request->sales_tax_rate;
        $client->withholding_tax_rate = $request->withholding_tax_rate;
        $client->tax_category = $request->tax_category;
        $client->fraction = $request->fraction;
        $client->save();
        
        return redirect('/user');
    }
    public function deleteClient(Request $request)
    {
        $client = Client::where('id', '=', $request->id)->first();
        $client->delete();
        
        return redirect('/user');
    }
    
    // 案件情報の追加・更新・削除
    public function addNewItem(Request $request){
        $item = new Item();
        $item->user_id = Auth::user()->id;
        $item->client_id = $request->client_id;
        $item->item_name = $request->item_name;
        $item->delivery_date = $request->delivery_date;
        $item->unit_price = $request->unit_price;
        $item->states = $request->states;
        $item->memo = $request->memo;
        $item->save();
        
        return redirect('/addItem');
    }
    public function editItem($id){
        $list = Item::find($id);
        $clientList = Client::all();
        return view('todo.editItem', compact('list', 'clientList'));
    }
    public function updateItem(Request $request, $id){
        $item = Item::where('id', '=', $request->id)->first();
        $item->user_id = Auth::user()->id;
        $item->client_id = $request->client_id;
        $item->item_name = $request->item_name;
        $item->delivery_date = $request->delivery_date;
        $item->unit_price = $request->unit_price;
        $item->states = $request->states;
        $item->memo = $request->memo;
        $item->save();
        
        $clientId = $item->client_id;
        return redirect()->action('TodoController@items', ['id' => $clientId]);
    }
    public function updateItemStates(Request $request, $id){
        $list = Item::all();
        $clientList = Client::all();
        
        $item = Item::where('id', '=', $request->id)->first();
        $item->states = $request->states;
        $item->save();
        
        $clientId = $item->client_id;
        return redirect()->action('TodoController@items', ['id' => $clientId]);
    }
    public function deleteItem(Request $request)
    {
        $item = Item::where('id', '=', $request->id)->first();
        $item->delete();

        $clientId = $item->client_id;
        return redirect()->action('TodoController@items', ['id' => $clientId]);
    }
    public function makeInvoice(){
        // PDF用の請求書画面への遷移
    }
}
