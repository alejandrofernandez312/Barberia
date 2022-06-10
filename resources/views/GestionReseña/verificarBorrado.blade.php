@extends('plantilla')

@section('titulo')
    Verificar borrado
@endsection

@section('contenido')

<p class="display-4 text-center">¿Está seguro de que desea eliminar esta reseña?</p>

<table id="tabla" class="table">
    <thead>
        <th>Cliente</th>
        <th>Fecha</th>
        <th>Servicio</th>
        <th>Descripcion</th>
        <th>Puntuación</th>
    </thead>
    <tbody id="tablaGestionCitas">
                <tr>
                    <td>{{$factura->usuario->name}} {{$factura->usuario->surnames}}</td>
                    <td>{{$factura->start}}</td>
                    <td>{{$factura->servicio->nombre}}</td>
                    <td>{{$factura->reseña->descripcion}}</td>
                    <td>{{$factura->reseña->puntuacion}}</td>
                </tr>
    </tbody>
</table>

<center>
    <a href="{{url('gestionResenas/borrar', $factura->reseña_id)}}" class="btn btn-success btn-lg">Si</a>
    <a href="{{route('gestionresenas.index')}}" class="btn btn-danger btn-lg">No</a>
</center>

@endsection