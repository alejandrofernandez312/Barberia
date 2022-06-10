@extends('plantilla')

@section('titulo')
    Trabajos
@endsection


@section('contenido')

<style>
    body{
        background-image: url('https://joseppons.com/formacion/wp-content/uploads/2020/11/servicios-salon-barberia.jpeg');
        background-size: cover;
    }

    .trabajos{
        width: 40%;
        padding: 10px;
        margin: 10px;
        border: 3px solid white;
        border-radius: 20%;
    }

    .trabajos:hover{
        width: 50%;
        transition: 1s;
    }
</style>

<center>
    <p><img src="{{asset('galeria/1.jpg')}}" alt="" srcset="" class="trabajos"></p>
    <p><img src="{{asset('galeria/2.jpg')}}" alt="" srcset="" class="trabajos"></p>
    <p><img src="{{asset('galeria/3.webp')}}" alt="" srcset="" class="trabajos"></p>
</center>



@endsection
