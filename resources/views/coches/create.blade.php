@extends('plantillas.plantilla1')
@section('titulo')
coche nuevo
@endsection
@section('cabecera')
Crear Coche
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
<form name="f" action="{{route('coches.store')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="col">
        <input type="text" required placeholder="Modelo" name="modelo" class="form-control">
    </div>
    <div class="col">
        <select name="marca_id" class="form-control">
            <option value="-1">No elegir marca</option>
            @foreach ($marcas as $item)
                <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="col">
        <input type="text" name="color" placeholder="Elige Color" required class="form-control">
    </div>
    <div class="col">
        <input type="number" step=5 maxlength="6" placeholder="kilometros" max="150000" min="100" required>
    </div>
</div>
<div class="row mt-4">
<div class="col">
    <input type='file' name='foto' class="form-control-file">
</div>
<div class="col">
    <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Crear</button>
    <button class="btn btn-warning" type="reset"><i class="fa fa-brush"></i> Limpiar</button>
    <a href="{{route('coches.index')}}" class="btn btn-primary"><i class="fa fa-house-user"></i> Inicio</a>
</div>

</div>
</form>
@endsection
