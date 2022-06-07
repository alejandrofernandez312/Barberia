@extends('plantilla')

@section('titulo')
    Inicio
@endsection


@section('contenido')
<p class="display-4 text-center">
    Conóceme un poco más:
</p>


<center>

<div class="card d-inline-block" style="">
  <div class="card-body">
    <img src="https://e00-expansion.uecdn.es/assets/multimedia/imagenes/2016/06/28/14671157563665.jpg" alt="mario" style="width:50%;">
    <h5 class="display-4 text-center">Alejandro Fernández</h5>
    <p class="card-text">Barbero especializado en dibujos y tintes.</p>
    <a href="{{url('citas')}}" class="btn btn-primary">Pedir cita</a>
  </div>
</div>
</center>

    
@endsection