@extends('layouts.app')

@section('content')
<a href="/products" class="btn btn-primary">Terug</a><br><br>
<div class="jumbotron">
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
            <p class="lead">&#8364; {{$product->price}}</p>
                <hr>
            <p>{{$product->description}}</p>
        </div>
    </div><br>
    <p class="lead">
        <p>Voeg toe aan winkelmand</p>
        <a class="btn btn-primary btn-lg" href="/add-to-cart/{{$product->id}}" role="button"><i class="fas fa-cart-plus"></i></a>
    </p>
</div>
@endsection