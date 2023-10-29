@extends('layouts.app')

@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <h1>Productos disponibles</h1>
      <ul>
        @foreach($viewData["computers"] as $computer)
          <li>
            Id: {{ $computer->id }} - 
            Name: {{ $computer->name }} -
            Price: {{ $computer->price }} -
            <form method="POST" action="{{ route('cart.add', ['id' => $computer->id]) }}">
              @csrf
              <input type="hidden" name="id" value="{{ $computer->id }}">
              <button type="submit" class="btn btn-primary">Añadir al carrito</button>
            </form>
          </li>
        @endforeach
      </ul>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-12">
      <h1>Productos en el carrito</h1>
      <ul>
        @foreach($viewData["cartComputers"] as $cartComputer)
          <li>
            Id: {{ $cartComputer->id }} - 
            Name: {{ $cartComputer->name }} -
            Price: {{ $cartComputer->price }}
          </li>
        @endforeach
      </ul>
      <a href="{{ route('cart.removeAll') }}" class="btn btn-danger">Eliminar todos los productos del carrito</a>
    </div>
  </div>
</div>
@endsection
