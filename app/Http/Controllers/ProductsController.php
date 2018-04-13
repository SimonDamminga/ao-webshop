<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\category_product;
use App\Category;
use App\Cart;
use Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('products.index')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'image_url' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('image_url')){
            //save file
            $filenameWithExtension = $request->file('image_url')->getClientOriginalName();
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('image_url')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image_url')->storeAs('public/images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->image_url = $fileNameToStore;
        $product->save();


        foreach($request->categories as $category):
            $cat_prod = new category_product;
            $cat_prod->product_id = $product->id;
            $cat_prod->category_id = $category;
            $cat_prod->save();
        endforeach;

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show')->with(compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('products.edit')->with(compact('categories', 'product'));
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
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        $categories = category_product::where('product_id', $id)->get();

        foreach($categories as $category):
            $c_del = category_product::where('product_id', $category->product_id);
            $c_del->delete();
        endforeach;

        foreach($request->categories as $category):
            $cat_prod = new category_product;
            $cat_prod->product_id = $product->id;
            $cat_prod->category_id = $category;
            $cat_prod->save();
        endforeach;

        return redirect('/products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $categories = category_product::where('product_id', $id)->get();
        foreach($categories as $category):
            $c_del = category_product::where('product_id', $category->product_id);
            $c_del->delete();
        endforeach;

        $product->delete();

        return redirect('/products');
    }


    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect('/products');
    }

    public function getCart()
    {
        if(!Session::has('cart')){
           return view('shopping-cart.index'); 
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shopping-cart.index', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
        
    }
}
