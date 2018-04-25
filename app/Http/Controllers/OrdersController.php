<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Order;
use App\Orderline;
use App\Category;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $orders = Order::where('user_id', Auth::user()->id)->get();

        return view('orders/index')->with(['orders' => $orders, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = Category::all();
        if(!Auth::user())
            return redirect('/login');
        $cart = Session::get('cart');
        $orders = array();

        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->status = 'pending';
        $order->date_created = date("Y/m/d");
        $order->save();


        foreach($cart->items as $prod){
            $orderline = new Orderline;
            $orderline->order_id = $order->id;
            $orderline->product_id = $prod['item']['id'];
            $orderline->user_id = Auth::user()->id;
            $orderline->amount = $prod['qty'];
            $orderline->total_price = $prod['price'] * $prod['qty'];
            $orderline->save();     
            
            array_push($orders, $orderline);
        }

        return redirect('orders/'.$order->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $orderlines = Orderline::where('order_id', $id)->get();

        return view('orders/view')->with(['categories' => $categories, 'orderlines' => $orderlines]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        $order->status = 'Payed';
        $order->save();

        Session::forget('cart');
        return redirect('orders/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
