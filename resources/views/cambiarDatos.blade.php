@extends('plantilla')

@section('titulo')
    Mi perfil
@endsection

@section('contenido')

    <form action="{{ route('users.update', auth()->user()->id) }}" method="post" enctype="multipart/form">
        @csrf
        @method('PUT')
        <div class="container col-md-4">
            @error('success')
                <div class="alert  mt-1 mb-1">{{ $message }}</div>
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