@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
    <h1>Productos disponibles</h1>
    <ul>
      @foreach($viewData["computers"] as $key => $computer)
        <li>
          Id: {{ $key }} - 
          Nombre: {{ $computer["name"] }} -
          Precio: {{ $computer["price"] }} -
          <a href="{{ route('cart.add', ['id'=> $key]) }}">Agregar al carrito</a>
        </li>
      @endforeach
    </ul>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-12">
    <h1>Productos en el carrito</h1>
      <ul>
        @foreach($viewData["cartComputers"] as $key => $computer)
          <li>
            Id: {{ $key }} - 
            Nombre: {{ $computer["name"] }} -
            Precio: {{ $computer["price"] }}
          </li>
        @endforeach
      </ul>
      <a href="{{ route('cart.removeAll') }}">Eliminar todos los productos del carrito</a>
    </div>
  </div>
</div>
@endsection
