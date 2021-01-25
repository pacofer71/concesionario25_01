@extends('plantillas.plantilla1')
@section('titulo')
Concesionario
@endsection
@section('cabecera')
Concesionarios de Sur S.A.
@endsection
@section('contenido')
<div class="text-center mt-5">
<a href="{{route('marcas.index')}}" class="btn btn-success btn-lg"><i class="fab fa-maxcdn"></i>  Marcas</a>
<a href="{{route('coches.index')}}" class="btn btn-success btn-lg"><i class="fa fa-car"></i>  Coches</a>
</div>
@endsection
