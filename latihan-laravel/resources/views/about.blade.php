@extends('layout.mainly')

@section('brianly')

<h1 class="mb-4">About me.</h1>

<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="img/{{ $image }}" class="img-fluid rounded-start" alt="img/{{ $image }}">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{ $name }}</h5>
          <p class="card-text">{{ $email }}</p>
          <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
  </div>
@endsection
