<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SendMessageEvent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function sendMessage(Request $request)
    {
        event(new SendMessageEvent($request->username,$request->message));
    }
}
