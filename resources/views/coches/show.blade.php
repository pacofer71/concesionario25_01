@extends('plantillas.plantilla1')
@section('titulo')
    Detalle Coche
@endsection
@section('cabecera')
    Detalle Coche ({{ $coch->id }})
@endsection
@section('contenido')
    <div class="card text-white bg-dark mb-3 m-auto" style="max-width: 100rem;">
        <div class="card-header text-center p-2">
            <img src="{{ asset($coch->foto) }}" class="img-thumbnail" width="180rem" height="180rem">
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $coch->modelo }}</h5>
            <p class="card-text"><b>Marca: </b>
                @if (isset($coch->marca_id))
                    {{ $coch->marca->nombre }}
                @else
                    Sin Marca
                @endif
            </p>
            <p class="card-text"><b>Color: </b>{{ $coch->color }}</p>
            <p class="card-text"><b>Kilometros: </b>{{ $coch->kilometros }}</p>
            <p class="card-text"><b>Registro creado: </b>{{ $coch->created_at }}</p>
            <p class="card-text"><b>Registro actualizado: </b>{{ $coch->updated_at }}</p>
            <a href="{{ route('coches.index') }}" class="btn btn-primary mt-2"><i class="fa fa-house-user"></i> Inicio</a>

        </div>
    </div>
@endsection
