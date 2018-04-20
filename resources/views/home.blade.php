<?php

$gender;

if(Auth::user()->client->gender == 'male'){
    $gender = 'Man';
}else if(Auth::user()->client->gender == 'female'){
    $gender = 'Vrouw';
}else{
    $gender = 'Anders';
}

?>

@extends('layouts.app', ['categories' => $categories])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profiel</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <b>naam:</b> {{Auth::user()->name}} <br> 
                    <b>email:</b> {{Auth::user()->email}} <br><br>
                    <hr>
                    <b>Geboorte datum:</b>@if(Auth::user()->client->date_of_birth == null) niet ingevuld @else {{Auth::user()->client->date_of_birth}} @endif <br>
                    <b>Post Code:</b>@if(Auth::user()->client->postal_code == null) niet ingevuld @else {{Auth::user()->client->postal_code}} @endif<br>
                    <b>Straatnaam:</b>@if(Auth::user()->client->street == null) niet ingevuld @else {{Auth::user()->client->street}} @endif<br>
                    <b>Huis nummer:</b>@if(Auth::user()->client->house_nr == null) niet ingevuld @else {{Auth::user()->client->house_nr}} @endif<br>
                    <b>Land:</b>@if(Auth::user()->client->country == null) niet ingevuld @else {{Auth::user()->client->country}} @endif<br>
                    <b>Geslacht:</b>@if(Auth::user()->client->gender == null) niet ingevuld @else {{$gender}} @endif<br>
                    <b>Mobiel nummer:</b>@if(Auth::user()->client->phone_number == null) niet ingevuld @else {{Auth::user()->client->phone_number}} @endif<br><br>

                    <a class="btn btn-primary btn-sm" href="/users/{{Auth::user()->id}}/edit">Pas aan</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Orders</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Aantal orders: 0 <br><br>
                    <a class="btn btn-primary btn-sm" href="/orders/{{Auth::user()->id}}">Bekijk je orders</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
