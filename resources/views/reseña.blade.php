@extends('plantilla')

@section('titulo')
    Reseña
@endsection

@section('contenido')

    <p class="display-4 text-center">Reseña</p>
    <form action="{{url('reseñas/dejar', $factura->factura_id)}}" style="width: 50%; margin: 0 auto;" method="GET" enctype="multipart/form">
        @csrf
        <p>Servicio:
            <br><input type="text" name="servicio" class="form-control" id="servicio"
                value="{{$factura->servicio->nombre}}" disabled>
        </p>
        
        <label for="customRange2" class="form-label" >Vota el servicio (min. 0 max. 5)</label>
        <input type="range" class="form-range" min="0" max="5" id="customRange2" value="3" name="puntuacion">
        <p style="display: inline-block;"><b>0</b></p><p style="display: inline-block; float:right;"><b>5</b></p>
        
        

        <p>Descripción de la reseña:
            <label for="exampleFormControlTextarea1" class="form-label"></label>
            <textarea class="form-control" name="textArea" id="exampleFormControlTextarea1" rows="3" placeholder="Ej.: Me ha gustado mucho el servicio porque el barbero es muy simpático!"></textarea>
        </p>

        <input type="submit" value="Dejar reseña" class="btn btn-success" >


    </form>

@endsection