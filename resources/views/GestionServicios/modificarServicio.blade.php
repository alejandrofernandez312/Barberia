@extends('plantilla')

@section('titulo')
    Modificar servicio
@endsection

@section('contenido')

<h1 class="text-center">Modificar servicio</h1>

<p>
    <a href="{{ route('gestionservicios.index') }}"><input type="button" value="Volver" class="btn btn-primary"></a>
</p>

<form action="{{ route('gestionservicios.update', $servicio->servicio_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
            <p>Nombre:
                <br><input type="text" name="nombre" class="form-control" id="nombre"
                    value="{{ old('nombre', $servicio->nombre) }}">
            </p>
            @error('nombre')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

            <p>Precio:
                <br><input type="text" name="precio" class="form-control" id="precio"
                    value="{{ old('precio', $servicio->precio) }}">
            </p>
            @error('precio')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

            <p>Tiempo:
                <br><input type="text" name="tiempo" class="form-control" id="tiempo"
                    value="{{ old('tiempo', $servicio->tiempo) }}">
            </p>
            @error('tiempo')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

            <p>Descripción:
                <br>
                <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control">{{ old('tiempo', $servicio->descripcion) }}</textarea>
            </p>
            @error('descripcion')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

            

            <input type="submit" class="btn btn-success" value="Modificar">

</form>

@endsection