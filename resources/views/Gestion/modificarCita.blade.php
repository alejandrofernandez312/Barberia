@extends('plantilla')

@section('titulo')
    Modificar cita
@endsection

@section('contenido')

<h1 class="text-center">Modificar cita</h1>

<p>
    <a href="{{ route('gestion.index') }}"><input type="button" value="Volver" class="btn btn-primary"></a>
</p>

<form action="{{ route('gestion.update', $factura->factura_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
            <p>Fecha:
                <br><input type="text" name="fecha" class="form-control" id="fecha"
                    value="{{ old('fecha', $factura->start) }}">
            </p>
            @error('fecha')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            <p>Cliente:
                <br><select name="cliente" class="form-select" id="cliente">
                    @foreach ($clientes as $cliente)
                        @if ($factura->usuario->id == $cliente->id)
                            <option value="{{$factura->usuario->id}}" selected>{{$factura->usuario->name}} {{$factura->usuario->surnames}}</option>
                        @else
                            <option value="{{$cliente->id}}">{{$cliente->name}} {{$cliente->surnames}}</option>
                        @endif
                    @endforeach
                </select>
            </p>

            <p>Servicio:
                <br><select name="servicio" class="form-select" id="servicio">
                    @foreach ($servicios as $servicio)
                        @if ($factura->servicio_id == $servicio->servicio_id)
                            <option value="{{$factura->servicio_id}}" selected>{{$factura->servicio->nombre}}</option>
                        @else
                            <option value="{{$servicio->servicio_id}}">{{$servicio->nombre}}</option>
                        @endif
                    @endforeach
                </select>
            </p>
            <input type="submit" class="btn btn-success" value="Modificar">

</form>

@endsection