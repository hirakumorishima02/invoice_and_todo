<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\User;
use App\Item;
use App\Invoice;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\ClientRequest;

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
        $list = Client::where('user_id','=',Auth::user()->id)->get();
        return view('todo.addItem', compact('list'));
    }
    public function items($id){
        $list = Item::where('client_id', '=', $id)->get();
        $client = Client::find($id);
        $invoiceList = Invoice::where('client_id','=', $id)->get();
        return view('todo.items', compact('list','client', 'invoiceList'));
    }
    
    // クライアント情報の追加・更新・削除
    public function addNewClient(ClientRequest $request){
        $client = new Client();
        $client->user_id = Auth::user()->id;
        $client->client_name = $request->client_name;
        $client->personnel = $request->personnel;
        $client->sales_tax_rate = $request->sales_tax_rate;
        $client->withholding_tax_rate = $request->withholding_tax_rate;
        $client->fraction = $request->fraction;
        $client->save();
        
        return redirect('/user');
    }
    public function editClient($id){
        $list = Client::find($id);
        return view('todo.editClient', compact('list'));
    }
    public function updateClient(ClientRequest $request){
        $client = Client::where('id', '=', $request->id)->first();
        $client->user_id = Auth::user()->id;
        $client->client_name = $request->client_name;
        $client->personnel = $request->personnel;
        $client->sales_tax_rate = $request->sales_tax_rate;
        $client->withholding_tax_rate = $request->withholding_tax_rate;
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
    public function addNewItem(ItemRequest $request){
        $item = new Item();
        $item->user_id = Auth::user()->id;
        $item->client_id = $request->client_id;
        $item->item_name = $request->item_name;
        $item->delivery_date = $request->delivery_date;
        $item->unit_price = $request->unit_price;
        $item->states = '0';
        $item->memo = $request->memo;
        $item->save();
        
        return redirect('/addItem');
    }
    public function editItem($id){
        $list = Item::find($id);
        $clientList = Client::where('user_id','=',Auth::user()->id)->get();
        return view('todo.editItem', compact('list', 'clientList'));
    }
    public function updateItem(ItemRequest $request, $id){
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
        $list = Item::where('user_id','=',Auth::user()->id)->get();
        $clientList = Client::where('user_id','=',Auth::user()->id)->get();
        
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
