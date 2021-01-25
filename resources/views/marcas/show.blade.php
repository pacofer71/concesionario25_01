@extends('plantillas.plantilla1')
@section('titulo')
Detalle marca
@endsection
@section('cabecera')
Detalle Marca ({{$marca->id}})
@endsection
@section('contenido')
<div class="card text-white bg-dark mb-3 m-auto" style="max-width: 100rem;">
    <div class="card-header text-center p-2">
        <img src="{{asset($marca->logo)}}" class="img-thumbnail" width="180rem" height="180rem">
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$marca->nombre}}</h5>
      <p class="card-text text-justify">{{$marca->historia}}</p>
      <p class="card-text"><b>Sitio Web: </b>{{$marca->url}}</p>
      <p class="card-text"><b>Registro creado: </b>{{$marca->created_at}}</p>
      <p class="card-text"><b>Registro actualizado: </b>{{$marca->updated_at}}</p>
      <a href="{{route('marcas.index')}}" class="btn btn-primary mt-2"><i class="fa fa-house-user"></i> Inicio</a>
    </div>
  </div>
@endsection
