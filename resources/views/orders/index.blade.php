@extends('layouts.app', ['categories' => $categories])

@section('content')
    @if(count($orders) > 0)
        <p>wel orders</p>
        <br>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Naam</th>
                </tr>
            </thead>
            <tbody>  
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->product_id}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
    @else
        <p>geen orders</p>
    @endif
@endsection