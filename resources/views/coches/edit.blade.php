@extends('plantillas.plantilla1')
@section('titulo')
actualizar coche
@endsection
@section('cabecera')
Actualizar Coche
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
<form name="f" action="{{route('coches.update', $coch)}}" method="POST" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row">
    <div class="col">
        <input type="text" required value="{{$coch->modelo}}" name="modelo" class="form-control">
    </div>
    <div class="col">
        <select name="marca_id" class="form-control">
            @if(!isset($coche->marca_id))
                <option value="-1" selected>No elegir marca</option>
            @else
                <option value="-1">No elegir marca</option>
            @endif

            @foreach ($marcas as $item)
                @if($item->id==$coch->marca_id)
                    <option value="{{$item->id}}" selected>{{$item->nombre}}</option>
                @else
                <option value="{{$item->id}}">{{$item->nombre}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="col">
        <input type="text" name="color" value="{{$coch->color}}" required class="form-control">
    </div>
    <div class="col">
        <input type="number" step=5 maxlength="6" value="{{$coch->kilometros}}" max="150000" min="100"  name="kilometros" required>
    </div>
</div>
<div class="row mt-4">
<div class="col">
    <input type='file' name='foto' class="form-control-file">
</div>
<div class="col">
    <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Modificar</button>
    <a href="{{route('coches.index')}}" class="btn btn-primary"><i class="fa fa-house-user"></i> Inicio</a>
</div>

</div>
</form>
@endsection
