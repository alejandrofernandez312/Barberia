@extends('plantilla')

@section('titulo')
    Mi perfil
@endsection

@section('contenido')
<p class="display-4 text-center">Mi perfil</p>

    <form action="{{ route('users.update', auth()->user()->id) }}" method="post" enctype="multipart/form">
        @csrf
        @method('PUT')
        <div class="container col-md-4">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <p>Nombre:
                <br><input type="text" name="nombre" class="form-control" id="nombre"
                    value="{{ old('nombre', auth()->user()->name) }}">
            </p>
            @error('nombre')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

            <p>Apellidos:
                <br><input type="text" name="apellidos" class="form-control" id="apellidos"
                    value="{{ old('apellidos', auth()->user()->surnames) }}">
            </p>
            @error('apellidos')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

            <p>Teléfono:
                <br><input type="text" name="telefono" class="form-control" id="telefono"
                    value="{{ old('telefono', auth()->user()->phone) }}">
            </p>
            @error('telefono')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

            <p>Correo:
                <br><input type="text" name="email" class="form-control" id="email"
                    value="{{ old('email', auth()->user()->email) }}">
            </p>
            @error('email')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            @if ($message = Session::get('error'))
                <div class="alert alert-danger" style="margin: 0 auto;">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <p>Contraseña:
                <br><input type="password" name="password" class="form-control" id="password" value="">
            </p>
            @error('password')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            <input type="submit" value="Modificar" class="btn btn-primary">
        </div>

    </form>
@endsection