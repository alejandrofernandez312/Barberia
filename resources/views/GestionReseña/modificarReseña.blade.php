@extends('plantilla')

@section('titulo')
    Modificar reseña
@endsection

@section('contenido')

<h1 class="text-center">Modificar usuario</h1>

<p>
    <a href="{{ route('gestionresenas.index') }}"><input type="button" value="Volver" class="btn btn-primary"></a>
</p>

<form action="{{ route('gestionresenas.update', $factura->reseña->reseña_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="customRange2" class="form-label" >Vota el servicio (min. 0 max. 5)</label>
    <input type="range" class="form-range" min="0" max="5" id="customRange2" value="{{$factura->reseña->puntuacion}}" name="puntuacion">
    <p style="display: inline-block;"><b>0</b></p><p style="display: inline-block; float:right;"><b>5</b></p>
    
    

    <p>Descripción de la reseña:
        <label for="exampleFormControlTextarea1" class="form-label"></label>
        <textarea class="form-control" name="textArea" id="exampleFormControlTextarea1" rows="3" placeholder="Ej.: Me ha gustado mucho el servicio porque el barbero es muy simpático!">{{$factura->reseña->descripcion}}</textarea>
    </p>
            

            <input type="submit" class="btn btn-success" value="Modificar">

</form>

@endsection