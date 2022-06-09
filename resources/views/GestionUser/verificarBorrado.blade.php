@extends('plantilla')

@section('titulo')
    Verificar borrado
@endsection

@section('contenido')

<p class="display-4 text-center">¿Está seguro de que desea eliminar este usuario?</p>

<table id="tabla" class="table">
    <table id="tabla" class="table">
        <thead>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Tipo</th>
        </thead>
        <tbody id="tablaGestionCitas">
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->surnames}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->descripcionTipo()}}</td>
                    </tr>
        </tbody>
    </table>

<center>
    <a href="{{url('gestionUsers/borrar', $user->id)}}" class="btn btn-success btn-lg">Si</a>
    <a href="{{route('gestionusers.index')}}" class="btn btn-danger btn-lg">No</a>
</center>

@endsection