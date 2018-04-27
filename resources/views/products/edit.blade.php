@extends('layouts.app', ['categories' => $categories])

@section('content')

<?php

$options = array();
$selectedOptions = array();

foreach($categories as $category):
    $options[$category->id] = $category->name;
endforeach;

foreach($product->categories as $categorie):
    array_push($selectedOptions, $categorie->id);
endforeach;

?>
<h1>Product Aanpassen</h1><hr>
{{Form::open(['action' => ['ProductsController@update', $product->id], 'method' => 'POST'])}}
<div class="form-group">
    {{Form::label('Naam Product')}}
    {{Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'Product Naam'])}}  
</div>
<div class="form-group">
    {{Form::label('Omschrijving')}}
    {{Form::textarea('description', $product->description, ['class' => 'form-control', 'placeholder' => 'Omschrijving', 'id' => 'article-ckeditor'])}}
</div>
<div class="form-group">
    {{Form::label('Prijs')}}
    {{Form::number('price', $product->price, ['class' => 'form-control', 'placeholder' => 'Prijs'])}}
</div>

<div class="form-group">
    {{Form::label('Korting')}}
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">%</span>
        </div>
        {{Form::number('discount', $product->discount, ['class' => 'form-control'])}}
    </div>
</div>

<div class="form-group">
    {{Form::label('Categorie')}}
    {{Form::select('categories[]', $options, $selectedOptions, ['class' => 'form-control', 'multiple'])}}
</div>

<div class="form-group">
    {{Form::label('Kies een afbeelding')}} <br>
    {{Form::file('image_url')}}
</div>

{{Form::hidden('_method', 'PUT')}}
{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{{Form::close()}}
@endsection