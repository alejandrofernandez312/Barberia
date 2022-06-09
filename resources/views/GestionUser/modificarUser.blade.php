@extends('plantilla')

@section('titulo')
    Modificar usuario
@endsection

@section('contenido')

<h1 class="text-center">Modificar usuario</h1>

<p>
    <a href="{{ route('gestionusers.index') }}"><input type="button" value="Volver" class="btn btn-primary"></a>
</p>

<form action="{{ route('gestionusers.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
            <p>Nombre:
                <br><input type="text" name="name" class="form-control" id="name"
                    value="{{ old('name', $user->name) }}">
            </p>
            @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

            <p>Apellidos:
                <br><input type="text" name="surnames" class="form-control" id="surnames"
                    value="{{ old('surnames', $user->surnames) }}">
            </p>
            @error('surnames')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

            <p>Email:
                <br><input type="text" name="email" class="form-control" id="email"
                    value="{{ old('email', $user->email) }}">
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
                    value="{{ old('phone', $user->phone) }}">
            </p>
            @error('phone')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

            <p>Tipo:
                <br><select name="type" class="form-select" id="type">
                        @if ($user->type == 'C')
                            <option value="">Sin asignar</option>
                            <option value="C" selected>Cliente</option>
                            <option value="E">Empleado</option>
                        @elseif ($user->type == 'E')
                            <option value="">Sin asignar</option>
                            <option value="C" >Cliente</option>
                            <option value="E" selected>Empleado</option> 
                        @else
                            <option value="" selected>Sin asignar</option>
                            <option value="C" >Cliente</option>
                            <option value="E" >Empleado</option>
                        @endif
                </select>
            </p>

            <input type="submit" class="btn btn-success" value="Modificar">

</form>

@endsection