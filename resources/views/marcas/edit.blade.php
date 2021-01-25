@extends('plantillas.plantilla1')
@section('titulo')
editar marca
@endsection
@section('cabecera')
Editar Marca
@endsection
@section('contenido')
@if ($errors->any())
    <div class="alert alert-danger my-3 p-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form name="fom" action="{{route('marcas.update', $marca)}}" method="POST" enctype="multipart/form-data" class="mt-3">
@csrf
@method("PUT")
<div class="row">
    <div class="col-2">
        <input type="text" name="nombre" required value="{{$marca->nombre}}" class="form-control">

    </div>
    <div class="col-5">
        <input type="url" name="url" value="{{$marca->url}}" class="form-control">
    </div>
    <div class="col-5">
        <input type="file" name="logo" class="form-control-file" />
    </div>
</div>
<div class="row mt-3">
<div class="col-7">
    <textarea name="historia" rows="10" required class="form-control">
        {{$marca->historia}}
    </textarea>
</div>
<div class="col">
    <img src="{{asset($marca->logo)}}" class="img-thumbnail" width="180rem" height="180rem">
</div>
<div class="row mt-3">
    <div class="col">
        <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Editar Marca</button>
        <a href="{{route('marcas.index')}}" class="btn btn-primary"><i class="fa fa-house-user"></i> Inicio</a>
    </div>
</div>
</form>
@endsection
