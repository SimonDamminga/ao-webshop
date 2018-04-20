@extends('layouts.app', ['categories' => $categories])

@section('content')

<?php

$options = array();

foreach($categories as $category):
    $options[$category->id] = $category->name;
endforeach;

?>
<h1>Product Toevoegen</h1><hr>
{{Form::open(['action' => 'ProductsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
<div class="form-group">
    {{Form::label('Naam Product')}}
    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Product Naam'])}}  
</div>
<div class="form-group">
    {{Form::label('Omschrijving')}}
    {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Omschrijving'])}}
</div>
<div class="form-group">
    {{Form::label('Prijs')}}
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">&#8364;</span>
        </div>
        {{Form::number('price', '', ['class' => 'form-control', 'placeholder' => 'Prijs'])}}
        
    </div>
</div>
<div class="form-group">
        {{Form::label('Korting')}}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">%</span>
            </div>
            {{Form::number('discount', '', ['class' => 'form-control'])}}
        </div>
    </div>
<div class="form-group">
    {{Form::label('Categorie')}}
    {{Form::select('categories[]', $options, '', ['class' => 'form-control', 'multiple'])}}
</div>

<div class="form-group">
    {{Form::label('Kies een afbeelding')}} <br>
    {{Form::file('image_url')}}
</div>

{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{{Form::close()}}
<br><br><br><br>
@endsection