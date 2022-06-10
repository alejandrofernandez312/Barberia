@extends('plantilla')

@section('titulo')
    Verificar borrado
@endsection

@section('contenido')

<p class="display-4 text-center">¿Está seguro de que desea eliminar este servicio?</p>

<table id="tabla" class="table">
    <thead>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Tiempo</th>
        <th>Descripción</th>
    </thead>
    <tbody id="tablaGestionCitas">
                <tr>
                    <td>{{$servicio->nombre}}</td>
                    <td>{{$servicio->precio}}</td>
                    <td>{{$servicio->tiempo}}</td>
                    <td>{{$servicio->descripcion}}</td>
                </tr>
    </tbody>
</table>

<center>
    <a href="{{url('gestionServicios/borrar', $servicio->servicio_id)}}" class="btn btn-success btn-lg">Si</a>
    <a href="{{route('gestionservicios.index')}}" class="btn btn-danger btn-lg">No</a>
</center>

@endsection