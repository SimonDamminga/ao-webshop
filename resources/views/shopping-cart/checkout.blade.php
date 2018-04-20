@extends('layouts.app', ['categories' => $categories])

@section('content')

<?php

foreach($orders as $order){
    var_dump($order);
}

?>

@endsection