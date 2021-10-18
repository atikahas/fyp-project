<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    //view list event
    public function index(Request $request){
        $events = Event::where($request->all())->get();

        return view('event.index', ['events'=> $events]);
    }
}
