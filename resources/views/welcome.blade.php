@extends('layouts.app', ['categories' => $categories])

@section('content')
<div class="jumbotron">
    <h1 class="display-4">Hallo</h1>
    <p class="lead">waar ben je naar op zoek?</p>
    <hr class="my-4">
    <form>
        <div class="row">
          <div class="col-md-11">
            <input type="text" class="form-control" placeholder="Zoek op categorie">
          </div>
          <div class="col-md-1">
            <a class="btn btn-primary" href="">Zoek</a>
          </div>
        </div>
      </form>
  </div>
@endsection