@extends('layouts.app')
<?php

    $total_price = 0;
    foreach($orderlines as $orderline){
        $total_price += $orderline->total_price;
    }
?>
@section('content')
    <h3>Order van {{$orderlines[0]->order->user->name}}</h3>
    <p>Status: <strong>{{$orderlines[0]->order->status}}</strong></p>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Naam</th>
            <th scope="col">aantal</th>
            <th scope="col">Prijs</th>
          </tr>
        </thead>
        <tbody>    
        @foreach($orderlines as $orderline)
            <tr>
                <td>{{$orderline->id}}</td>
                <td>{{$orderline->product->name}}</td>
                <td>{{$orderline->amount}}</td>
                <td>&euro;{{$orderline->total_price}}</td>
                
            </tr>    
        @endforeach
        </tbody>
      </table>   
      
      <p>Totale prijs: <strong>&euro;{{$total_price}}</strong></p>

      @if($orderlines[0]->order->status == 'pending')
      {{Form::open(['action' => ['OrdersController@update', $orderlines[0]->order->id], 'method' => 'POST'])}}
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Betalen', ['class' => 'btn btn-success'])}}
      {{Form::close()}}
      @endif

    
@endsection