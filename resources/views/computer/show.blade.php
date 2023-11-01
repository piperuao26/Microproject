@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/media/image/2023/05/torre-gaming-3036108.jpg?tf=3840x" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           {{ $viewData["computer"]["name"] }}
        </h5>
        <p class="card-text">{{ $viewData["computer"]["description"] }}</p>
        <p class="card-text">{{ $viewData["computer"]["price"] }}</p>
        <p class="card-text">{{ $viewData["computer"]["quantity"] }}</p>
        <p class="card-text">
  <form method="POST" action="{{ route('cart.add', ['id' => $viewData['computer']->getId()]) }}">
    <div class="row">
      @csrf
      <div class="col-auto">
        <div class="input-group col-auto">
          <div class="input-group-text">Cantidad</div>
          <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1">
        </div>
      </div>
      <div class="col-auto">
        <button class="btn bg-primary text-white" type="submit">Agregad al carrito</button>
      </div>
    </div>
  </form>
</p>
      </div>
    </div>
  </div>
</div>
@endsection

