@extends('plantilla')

@section('titulo')
    Inicio
@endsection

<style>
    body{
        background-image: url('https://joseppons.com/formacion/wp-content/uploads/2020/11/servicios-salon-barberia.jpeg');
        background-size: cover;
    }
</style>


@section('contenido')
<style>
    .h5Card{
        border-bottom: 3px solid black;
    }
</style>

<p class="display-4 text-center text-light">
    ¡Bienvenidos a la Barbería Fer!
</p>

<div class="bg-dark">
    <p class="text-center text-light p-3">Una barbería con más de 10 años en el sector y dando cada año lo mejor. Contamos con un profesional especializado para ofrecerle al cliente el mejor resultado.
        <br>¿Quieres pedir tu cita? ¡No dudes en hacerlo!
    </p>

</div>


<div id="reseñas">
    <p class="display-3 text-center text-light">Reseñas:</p>
    @foreach($facturas as $factura)
        <div class="card" style="width: 18rem;">
            <div class="card-body" >
            <h5 class="card-title" class="h5Card">{{$factura->servicio->nombre}}</h5>
            <p class="card-text">{{$factura->reseña->descripcion}}</p>
            <p class="card-text"><b>Puntuación:</b> {{$factura->reseña->puntuacion}}/5</p>
            </div>
        </div>
    @endforeach
</div>
    
@endsection
