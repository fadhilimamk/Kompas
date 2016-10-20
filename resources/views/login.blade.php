@extends('layouts.master')

@section('content')

<section id="main">
  <div class="row center">
    <div class="col-md-12 center">
      <form class="form-inline">
        <div class="form-group">
          <input type="text" class="form-control" id="search" placeholder="Username">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="search" placeholder="Password">
          <button class="btn btn-default">Login</button>
        </div>
      </form>
    </div>
  </div>
</section>

@endsection
