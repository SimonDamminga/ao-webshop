@extends('layouts.app', ['categories' => $categories])

@section('content')
    @if(count($orders) > 0)
        <p>wel orders</p>
        {{$orders[0]->user->name}} <br>
        @foreach($orders as $order)
            {!!$order->product->name!!}
            <br>
        @endforeach
    @else
        <p>geen orders</p>
    @endif
@endsection