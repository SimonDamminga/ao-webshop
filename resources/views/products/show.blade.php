@extends('layouts.app')

@section('content')
<a href="/products" class="btn btn-primary">Terug</a><br><br>
<div class="jumbotron">
    @if($product->discount != 0)
        <h3 style="display:inline;"><span class="badge badge-success float-right">-{{$product->discount}}%</span></h3>
    @endif
    <h1 class="display-4">{{$product->name}}</h1>
    <p>Categorie: 
        @foreach($product->categories as $category)
            {{$category->name}}, 
        @endforeach
    </p>
    <div class="row">
        <div class="col-7">
            <img src="/storage/images/{{$product->image_url}}" width="100%" alt="">
        </div>
        <div class="col-5">
            @if($product->discount == 0)
            <p class="lead">&#8364; {{number_format($product->price)}}</p>
            @else
                <?php 
                    $calcDiscount = $product->price * ($product->discount / 100);
                    $newPrice = $product->price - $calcDiscount;
                ?>
                <p class="lead">&#8364; <strike>{{number_format($product->price)}}</strike><br> nu voor: &#8364; {{number_format($newPrice)}}</p>
            @endif
                <hr>
            <p>{!!$product->description!!}</p>
        </div>
    </div><br>
    <p class="lead">
        <p>Voeg toe aan winkelmand</p>
        <a class="btn btn-primary btn-lg" href="/add-to-cart/{{$product->id}}" role="button"><i class="fas fa-cart-plus"></i></a>
    </p>
</div>
@endsection