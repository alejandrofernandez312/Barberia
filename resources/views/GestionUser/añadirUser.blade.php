@extends('plantilla')

@section('titulo')
    Añadir usuario
@endsection

@section('contenido')

<h1 class="text-center">Añadir usuario</h1>

<p>
    <a href="{{ route('gestionusers.index') }}"><input type="button" value="Volver" class="btn btn-primary"></a>
</p>

<form action="{{ route('gestionusers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
            <p>Nombre:
                <br><input type="text" name="name" class="form-control" id="name"
                    value="{{ old('name') }}">
            </p>
            @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

            <p>Apellidos:
                <br><input type="text" name="surnames" class="form-control" id="surnames"
                    value="{{ old('surnames') }}">
            </p>
            @error('surnames')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

            <p>Email:
                <br><input type="text" name="email" class="form-control" id="email"
                    value="{{ old('email') }}">
            </p>
            @error('email')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

            <p>Contraseña:
                <br><input type="text" name="password" class="form-control" id="password">
            </p>
            @error('password')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

            <p>Teléfono:
                <br><input type="text" name="phone" class="form-control" id="phone"
                    value="{{ old('phone') }}">
            </p>
            @error('phone')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

            <p>Tipo:
                <br><select name="type" class="form-select" id="type">
                        <option value="">Sin asignar</option>
                        <option value="C">Cliente</option>
                        <option value="E">Empleado</option>
                </select>
            </p>

            <input type="submit" class="btn btn-success" value="Añadir usuario">

</form>

@endsection