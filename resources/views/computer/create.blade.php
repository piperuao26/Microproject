@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Crear computadora</div>
        <div class="card-body">
          @if($errors->any())
          <ul id="errors" class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif

          @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
          @endif

          <form method="POST" action="{{ route('computer.save') }}">
            @csrf
            <input type="text" class="form-control mb-2" placeholder="Ingresa el nombre" name="name" value="{{ old('name') }}" />
            <input type="text" class="form-control mb-2" placeholder="Ingresa la descripcion" name="description" value="{{ old('description') }}" />
            <input type="text" class="form-control mb-2" placeholder="Ingresa el precio" name="price" value="{{ old('price') }}" />
            <input type="text" class="form-control mb-2" placeholder="Ingresa la cantidad de computadores" name="quantity" value="{{ old('quantity') }}" />
            <input type="text" class="form-control mb-2" placeholder="Ingresa la tarjeta Ram" name="ramCard" value="{{ old('ramCard') }}" />
            <input type="text" class="form-control mb-2" placeholder="Ingresa el acelerador gráfico" name="graphicAccelerator" value="{{ old('graphicAccelerator') }}" />
            <input type="text" class="form-control mb-2" placeholder="Ingresa el tamaño del disco duro" name="hdd" value="{{ old('hdd') }}" />
            <input type="submit" class="btn btn-primary" value="Enviar" />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
