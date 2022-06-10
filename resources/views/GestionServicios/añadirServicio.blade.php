@extends('plantilla')

@section('titulo')
    Añadir servicio
@endsection

@section('contenido')

<h1 class="text-center">Añadir servicio</h1>

<p>
    <a href="{{ route('gestionservicios.index') }}"><input type="button" value="Volver" class="btn btn-primary"></a>
</p>

<form action="{{ route('gestionservicios.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <p>Nombre:
        <br><input type="text" name="nombre" class="form-control" id="nombre"
            value="{{ old('nombre') }}">
    </p>
    @error('nombre')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror

    <p>Precio:
        <br><input type="text" name="precio" class="form-control" id="precio"
            value="{{ old('precio') }}">
    </p>
    @error('precio')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror

    <p>Tiempo (en minutos):
        <br><input type="text" name="tiempo" class="form-control" id="tiempo"
            value="{{ old('tiempo') }}">
    </p>
    @error('tiempo')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror

    <p>Descripción:
        <br>
        <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control">{{ old('tiempo') }}</textarea>
    </p>
    @error('descripcion')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror


            <input type="submit" class="btn btn-success" value="Añadir usuario">

</form>

@endsection