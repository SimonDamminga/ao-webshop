<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Order;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function home()
    { 
        $categories = Category::all();
        return view('welcome')->with(['categories' => $categories]);
    }

    public function index()
    {
        $categories = Category::all();
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('home')->with(['categories' => $categories, 'orders' => $orders]);
    }
}
