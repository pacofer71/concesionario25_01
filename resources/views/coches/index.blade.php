@extends('plantillas.plantilla1')
@section('titulo')
coches
@endsection
@section('cabecera')
Coches Clásicos S.A.
@endsection
@section('contenido')
@if($text=Session::get("mensaje"))
    <p class="bg-secondary text-white p-2 my-3">{{$text}}</p>
@endif
<a href="{{route('coches.create')}}"  class="btn btn-success mb-3"><i class="fa fa-plus"></i> Crear Coche</a>
<table class="table table-striped table-primary">
    <thead>
      <tr>
        <th scope="col">Detalle</th>
        <th scope="col">Marca</th>
        <th scope="col">Modelo</th>
        <th scope="col">Kilometros</th>
        <th scope="col">Logo</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach($coches as $item)
        <tr style="vertical-align: middle">
        <th scope="row">
            <a href="{{route('coches.show', $item)}}" class="btn btn-info btn-lg"><i class="fa fa-info"></i>
                Detalles</a>
        </th>
        <td>
            <!--
            @if(isset($item->marca->nombre))
                {{$item->marca->nombre}}
            @else
                Sin Marca
            @endif
            -->
            {{$item->marca->nombre}}
        </td>
        <td>{{$item->modelo}}</td>
        <td>{{$item->kilometros}}</td>
        <td><img src="{{asset($item->foto)}}" width="95rem" height="90rem" class="rounded-circe"></td>
        <td>
            <form name="a" action="{{route('coches.destroy', $item)}}" method='POST' class="form-inline">
                @csrf
                @method("DELETE")
                <a href="{{route('coches.edit', $item)}}" class="btn btn-primary btn-lg"><i class="fa fa-edit"></i> Editar</a>
                <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('¿Borrar Coche')">
                    <i class="fas fa-trash"></i> Borrar</button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$coches->links()}}
@endsection
