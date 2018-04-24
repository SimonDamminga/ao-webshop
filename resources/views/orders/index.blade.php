@extends('layouts.app', ['categories' => $categories])

@section('content')
    @if(count($orders) > 0)
        <br>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Status</th>
                <th scope="col">Datum</th>
                <th></th>
                </tr>
            </thead>
            <tbody>  
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->status}}</td>
                        <td>{{$order->created_at}}</td>
                        <th><a class="btn btn-primary" href="/order/view/{{$order->id}}">Bekijk</a></th>
                    </tr>
                @endforeach
            </tbody>
        </table>    
    @else
        <p>geen orders</p>
    @endif
@endsection