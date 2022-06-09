@extends('plantilla')

@section('titulo')
    Verificar borrado
@endsection

@section('contenido')

<p class="display-4 text-center">¿Está seguro de que desea eliminar esta cita?</p>

<table id="tabla" class="table">
    <thead>
        <th>Factura ID</th>
        <th>Fecha</th>
        <th>Servicio</th>
        <th>Cliente</th>
    </thead>
    <tbody>
        <tr>
            <td>{{$factura->factura_id}}</td>
            <td>{{$factura->start}}</td>
            <td>{{$factura->title}}</td>
            <td>{{$factura->usuario->name}}</td>
        </tr>
    </tbody>
</table>

<center>
    <a href="{{url('gestion/borrar', $factura->factura_id)}}" class="btn btn-success btn-lg">Si</a>
    <a href="{{route('gestion.index')}}" class="btn btn-danger btn-lg">No</a>
</center>

@endsection