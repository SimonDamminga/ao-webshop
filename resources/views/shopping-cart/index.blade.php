@extends('layouts.app', ['categories' => $categories])

@section('content')
@if(Session::has('cart'))
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <ul class="list-group">
                @foreach($products as $key => $product)
                    <li class="list-group-item">
                        
                        <strong>{{$product['item']['name']}}</strong>
                        <span class="badge badge-success">&#8364; {{$product['price']}}</span>
                        <div class="float-right">
                            <a class="btn btn-danger btn-sm" href="/shopping-cart/delete/{{$key}}">Delete item</a> | 
                            <a class="btn btn-warning btn-sm" href="/shopping-cart/remove-one/{{$key}}"><i class="fas fa-minus"></i></a> | 
                            <p style="display:inline;">{{$product['qty']}}</p> | 
                            <a class="btn btn-success btn-sm" href="/shopping-cart/add-one/{{$key}}"><i class="fas fa-plus"></i></a>               
                        </div>
                    </li>
                @endforeach
                


                
            </ul>
            <p>totale prijs: {{$totalPrice}}</p>
            {{Form::open(['action' => 'OrdersController@store', 'method' => 'POST'])}}
                {{Form::submit('Order Maken', ['class' => 'btn btn-secondary'])}}
            </form>
            
        </div>
    </div>

@else
    <h3>Geen items in je winkelmandje</h3>
    
@endif
    <br><a href="/products" class="btn btn-primary">Ga verder met winkelen</a>
@endsection