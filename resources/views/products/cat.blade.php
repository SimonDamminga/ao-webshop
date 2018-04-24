

@extends('layouts.app', ['categories' => $categories])

@section('content')
<h1>{{$category_name->name}}</h1>
<div class="row">
    @foreach($products as $product)

        <div class="col-4">
                
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/storage/images/{{$product->product->image_url}}" alt="Card image cap">
                @if($product->discount != 0)
                    <h3 style="position:absolute;top:10px;left:10px;"><span class="badge badge-success float-right">-{{$product->product->discount}}%</span></h3>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{$product->product->name}}</h5>
                    @if($product->product->discount == 0)
                        <p class="card-text">&#8364; {{number_format($product->product->price)}}</p>
                    @else
                    <?php 
                        $calcDiscount = $product->product->price * ($product->product->discount / 100);
                        $newPrice = $product->product->price - $calcDiscount;  
                    ?>
                    <p class="card-text">&#8364; <strike>{{$product->product->price}}</strike> | &#8364; {{number_format($newPrice)}}</p>
                    @endif
                    <a href="/products/{{$product->product->id}}" class="btn btn-primary">Bekijk</a>
                    <a class="btn btn-success" href="/add-to-cart/{{$product->product->id}}" role="button"><i class="fas fa-cart-plus"></i></a>
                </div>
            </div>
            <br>
        </div>
    @endforeach     
</div>



@endsection