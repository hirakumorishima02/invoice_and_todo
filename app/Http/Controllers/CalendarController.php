<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Calendar;

class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // indexでカレンダーデータ機能取得
    public function test(Request $request)
    {
        $itemList = Item::where('user_id',Auth::user()->id)->get();
        $cal = new Calendar($itemList);
        $tag = $cal->showCalendarTag($request->month,$request->year);
        return view('test', ['cal_tag' => $tag]);
    }
}
