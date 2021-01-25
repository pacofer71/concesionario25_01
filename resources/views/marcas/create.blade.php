@extends('plantillas.plantilla1')
@section('titulo')
nueva marca
@endsection
@section('cabecera')
Crear Marca
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
<form name="fom" action="{{route('marcas.store')}}" method="POST" enctype="multipart/form-data" class="mt-3">
@csrf
<div class="row">
    <div class="col-2">
        <input type="text" name="nombre" required placeholder="Nombre Marca" class="form-control">

    </div>
    <div class="col-5">
        <input type="url" name="url" placeholder="Sitio Web" class="form-control">
    </div>
    <div class="col-5">
        <input type="file" name="logo" class="form-control-file" />
    </div>
</div>
<div class="row mt-3">
<div class="col-7">
    <textarea name="historia" placeholder="Historia/reseña" rows="10" required class="form-control"></textarea>
</div>
</div>
<div class="row mt-3">
    <div class="col">
        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Crear Marca</button>
        <button type="reset" class="btn btn-warning"><i class="fa fa-brush"></i> Limpiar</button>
        <a href="{{route('marcas.index')}}" class="btn btn-primary"><i class="fa fa-house-user"></i> Inicio</a>
    </div>
</div>
</form>
@endsection
