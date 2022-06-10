@extends('plantilla')

@section('titulo')
    Inicio
@endsection


@section('contenido')

<style>
   body{
        background-image: url('https://joseppons.com/formacion/wp-content/uploads/2020/11/servicios-salon-barberia.jpeg');
        background-size: cover;
    }
</style>
<p class="display-4 text-center text-light">
    Conóceme un poco más:
</p>


<center>

<div class="card d-inline-block" style="">
  <div class="card-body">
    <img src="https://e00-expansion.uecdn.es/assets/multimedia/imagenes/2016/06/28/14671157563665.jpg" alt="mario" style="width:50%;">
    <h5 class="display-4 text-center">Alejandro Fernández</h5>
    <p class="card-text"><i>Barbero especializado en dibujos y tintes.</i></p>
    <p class="card-text">Titulación obtenida en <b>C&C ACADEMIA CASANOVA HUELVA. Academia de Peluquería y Barbería</b> en el año 2016. <br>
      Experiencia laboral en barberías VIP de Ibiza, Marbella y Barcelona.
    </p>
    @if(auth()->user())
      <a href="{{url('citas')}}" class="btn btn-primary">Pedir cita</a>
    @else
    <a href="{{route('login')}}" class="btn btn-primary">Pedir cita</a>

    @endif
    
  </div>
</div>
</center>

    
@endsection