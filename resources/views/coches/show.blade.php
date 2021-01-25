@extends('plantillas.plantilla1')
@section('titulo')
Detalle Coche
@endsection
@section('cabecera')
Detalle Coche ({{$coch->id}})
@endsection
@section('contenido')
<div class="card text-white bg-dark mb-3 m-auto" style="max-width: 100rem;">
    <div class="card-header text-center p-2">
        <img src="{{asset($coch->foto)}}" class="img-thumbnail" width="180rem" height="180rem">
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$coch->modelo}}</h5>
      <p class="card-text text-justify"></p>
      <p class="card-text"><b>Sitio Web: </b></p>
      <p class="card-text"><b>Registro creado: </b></p>
      <p class="card-text"><b>Registro actualizado: </b></p>
      <a href="{{route('coches.index')}}" class="btn btn-primary mt-2"><i class="fa fa-house-user"></i> Inicio</a>

    </div>
  </div>
@endsection
