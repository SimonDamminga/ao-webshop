@extends('layouts.app')

@section('content')
<h1>Alle Producten</h1>

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Naam</th>
        <th>categorie</th>
        <th></th>
      </tr>
    </thead>
    <tbody>    
    @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>
                @foreach($product->categories as $category)
                    {{$category->name}}, 
                @endforeach
            </td>
            <td>
                <div class="float-right">
                    <a class="btn btn-primary" href="/products/{{$product->id}}/edit">Edit</a>
                    {{Form::open(['action' => 'ProductsControlle@destroy', 'method' => 'POST'])}}
                </div>
            </td>
        </tr>    
    @endforeach
    </tbody>
  </table>        


@endsection