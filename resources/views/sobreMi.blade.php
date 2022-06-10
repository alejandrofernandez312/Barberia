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

  <div class="container">
    <br><br><br>
      <p class="display-4 text-center">ENCUÉNTRANOS</p>
      <p class="text-justify">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
        </svg>
        645 765 745
      </p>
      <p class="text-justify">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
          <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
        </svg>
        Av. Santa Marta, s/n<br>
                  21005 Huelva<br>
      </p>
      <p class="text-justify">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
          <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
        </svg>
        alejandrofernandez312@gmail.com

      </p>
    </div>
    
  </div>
</div>
</center>

    
@endsection