<?php

use PragmaRX\Countries\Package\Countries;

$countries = new Countries();
$all = $countries->all();
$optionsArray = array();

foreach($all as $country){
    $optionsArray[$country['adm0_a3']] = $country->name->common;
}

?>

@extends('layouts/app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profiel</div>

                <div class="card-body">
                    {!!Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST'])!!}
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Naam</label>
                        <div class="col-md-6">
                            {{Form::text('name', $user->name, ['class' => 'form-control'])}}
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">E-mail</label>
                        <div class="col-md-6">
                            {{Form::text('email', $user->email, ['class' => 'form-control'])}}
                        </div>
                    </div>               
                    <hr>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Geboortedatum</label>
                        <div class="col-md-6">
                            @if($user->client->date_of_birth == null)
                            {{Form::date('date', '', ['class' => 'form-control'])}}
                            @else
                            {{Form::date('date', $user->client->date_of_birth, ['class' => 'form-control'])}}
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Postcode</label>
                        <div class="col-md-6">
                            @if($user->client->postal_code == null)
                            {{Form::text('postal_code', '', ['class' => 'form-control', 'placeholder' => '1234 AB'])}}
                            @else
                            {{Form::text('postal_code', $user->client->postal_code, ['class' => 'form-control'])}}
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Straatnaam</label>
                        <div class="col-md-6">
                            @if($user->client->street == null)
                            {{Form::text('street', '', ['class' => 'form-control', 'placeholder' => 'Hoofdweg'])}}
                            @else
                            {{Form::text('street', $user->client->street, ['class' => 'form-control'])}}
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Huisnummer</label>
                        <div class="col-md-6">
                            @if($user->client->house_nr == null)
                            {{Form::number('house_nr', '', ['class' => 'form-control', 'placeholder' => '12'])}}
                            @else
                            {{Form::number('house_nr', $user->client->house_nr, ['class' => 'form-control'])}}
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Mobiel nummer</label>
                        <div class="col-md-6">
                            @if($user->client->phone_number == null)
                            {{Form::number('phone_number', '', ['class' => 'form-control', 'placeholder' => '0612345678'])}}
                            @else
                            {{Form::number('phone_number', $user->client->phone_number, ['class' => 'form-control'])}}
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Mobiel nummer</label>
                        <div class="col-md-6">
                            @if($user->client->country == null)
                            {{Form::select('country', $optionsArray, null, ['class' => 'form-control'])}}
                            @else
                            {{Form::select('country',$optionsArray, $user->client->country, ['class' => 'form-control'])}}
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Mobiel nummer</label>
                        <div class="col-md-6">
                            @if($user->client->country == null)
                            {{Form::select('gender', ['male' => 'Man', 'female' => 'Vrouw', 'mental_disorder' => 'Anders'], null, ['class' => 'form-control'])}}
                            @else
                            {{Form::select('gender', ['male' => 'Man', 'female' => 'Vrouw', 'mental_disorder' => 'Anders'], $user->client->gender, ['class' => 'form-control'])}}
                            @endif
                        </div>
                    </div>
                    

                    {{Form::hidden('_method', 'PUT')}}
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Opslaan
                            </button>
                        </div>
                    </div>
                    
                    {!!Form::close()!!}                   
                </div>
            </div>
        </div>
    </div>
</div>


@endsection