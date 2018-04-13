@extends('layouts.app')

@section('content')
@if(Session::has('cart'))
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <ul class="list-group">
                @foreach($products as $product)
                    <li class="list-group-item">
                        <span class="badge badge-primary float-right">{{$product['qty']}}</span>
                        <strong>{{$product['item']['name']}}</strong>
                        <span class="badge badge-success">&#8364; {{$product['price']}}</span>
                    </li>
                @endforeach
                {{$totalPrice}}
            </ul>
        </div>
    </div>

@else

@endif
@endsection