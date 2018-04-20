

@extends('layouts.app', ['categories' => $categories])

@section('content')
<h1>Alle Producten</h1>
<div class="row">
    @foreach($products as $product)

        <div class="col-4">
                
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/storage/images/{{$product->image_url}}" alt="Card image cap">
                @if($product->discount != 0)
                    <h3 style="position:absolute;top:10px;left:10px;"><span class="badge badge-success float-right">-{{$product->discount}}%</span></h3>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    @if($product->discount == 0)
                        <p class="card-text">&#8364; {{number_format($product->price)}}</p>
                    @else
                    <?php 
                        $calcDiscount = $product->price * ($product->discount / 100);
                        $newPrice = $product->price - $calcDiscount;  
                    ?>
                    <p class="card-text">&#8364; <strike>{{$product->price}}</strike> | &#8364; {{number_format($newPrice)}}</p>
                    @endif
                    <a href="/products/{{$product->id}}" class="btn btn-primary">Bekijk</a>
                    <a class="btn btn-success" href="/add-to-cart/{{$product->id}}" role="button"><i class="fas fa-cart-plus"></i></a>
                </div>
            </div>
            <br>
        </div>
    @endforeach     
</div>



@endsection

?>