@extends('layouts.app', ['categories' => $categories])

@section('content')
<h1>Alle Categorieën</h1>

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Naam</th>
      </tr>
    </thead>
    <tbody>    
    @foreach($categories as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
        </tr>    
    @endforeach
    </tbody>
  </table>        


@endsection