@extends('layouts.master')

@section('content')
<section id="main">
  <div class="row">
    <div class="col-md 8">
      {{ $links[0]->url }}
      <iframe src = "{{ $url }}" width='400' height='280' allowfullscreen webkitallowfullscreen></iframe>
      <a href="{{ $url }}">Unduh</a>
    </div>
  </div>
</section>
@endsection
