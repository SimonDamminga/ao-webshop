@extends('layouts.app')

@section('content')

<?php

foreach($orders as $order){
    var_dump($order->order->user->name);
}

?>

@endsection