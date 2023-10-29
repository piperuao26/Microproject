@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
  @foreach ($viewData["computers"] as $computer)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/media/image/2023/05/torre-gaming-3036108.jpg?tf=3840x" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('computer.show', ['id'=> $computer["id"]]) }}"
          class="btn bg-primary text-white">{{ $computer["name"] }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
