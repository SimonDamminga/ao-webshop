@extends('layouts.app')

@section('content')

<?php

$options = array();

foreach($categories as $category):
    $options[$category->id] = $category->name;
endforeach;

?>
<h1>Product Toevoegen</h1><hr>
{{Form::open(['action' => 'ProductsController@store', 'method' => 'POST'])}}
<div class="form-group">
    {{Form::label('Naam Product')}}
    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Product Naam'])}}  
</div>
<div class="form-group">
    {{Form::label('Omschrijving')}}
    {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Omschrijving'])}}
</div>
<div class="form-group">
    {{Form::label('Prijs')}}
    {{Form::number('price', '', ['class' => 'form-control', 'placeholder' => 'Prijs'])}}
</div>
<div class="form-group">
    {{Form::label('Categorie')}}
    {{Form::select('categories[]', $options, '', ['class' => 'form-control', 'multiple'])}}
</div>

{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{{Form::close()}}
@endsection