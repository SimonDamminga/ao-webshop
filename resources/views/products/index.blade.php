@extends('layouts.app')

@section('content')
<h1>Alle Producten</h1>
<div class="row">
    @foreach($products as $product)
        <div class="col-4">
                
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/storage/images/{{$product->image_url}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">&#8364; {{$product->price}}</p>
                    <a href="/products/{{$product->id}}" class="btn btn-primary">Bekijk</a>
                </div>
            </div>
            <br>
        </div>
    @endforeach     
</div>



@endsection