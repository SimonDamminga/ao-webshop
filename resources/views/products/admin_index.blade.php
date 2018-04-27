@extends('layouts.app')

@section('content')

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Naam</th>
        <th scope="col">Prijs</th>
        <th scope="col">Korting</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>    
    @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->discount}}&#37;</td>
            <td>
                <a href="/products/{{$product->id}}/edit">Pas aan</a>
                {!!Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'POST', 'class' => 'd-inline']) !!}
                  {{Form::hidden('_method', 'DELETE')}}
                  {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}   
            </td>
        </tr>    
    @endforeach
    </tbody>
  </table>        

@endsection