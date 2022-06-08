<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura {{$factura->nombre}} - Fer Barber</title>

    <style>
        *{
            font-family: sans-serif;
        }

        .table, .table td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }

        .p {
            width: 100%;
            border-bottom: 1px solid black;
        }

        h1{
            text-align: center;
            padding-bottom: 10px;
            border-bottom: 1px solid black;
        }

        .titulo{
            background-color: rgb(0, 255, 179);
        }

        .datos{
            background-color: rgb(255, 255, 255);
        }

        body{
            background: rgb(205, 205, 205);
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <h1>FACTURA FER BARBER</h1>

    <table class="p" cellspacing="40" cellpadding="20">
        <tr>
            <td>
                <p>Fer Barber<br>
                    Av. Santa Marta, s/n<br>
                    21005 Huelva<br>
                    959318164<br>
                    alejandrofernandez312@gmail.com
            </td>
            <td>


            </td>
            <td>
                <p>{{ $factura->usuario->nombre }} {{ $factura->usuario->apellidos }}<br>
                    {{ $factura->usuario->correo }}<br>
                    {{ $factura->usuario->telefono }}
                </p>
            </td>
        </tr>
    </table><br>

    {{-- Tabla servicio --}}
    <table class="table">
        <tr>
            <td class="titulo"><b>Servicio</b></td>
            <td class="titulo"><b>Precio</b></td>
            <td class="titulo"><b>Tiempo</b></td>
            <td class="titulo"><b>Fecha</b></td>
        </tr>
        <tr>
            <td class="datos">{{$factura->servicio->nombre}}</td>
            <td class="datos">{{$factura->servicio->precio}}€</td>
            <td class="datos">{{$factura->servicio->tiempo}} minutos</td>
            <td class="datos">{{ date('d-m-Y H:i', strtotime($factura->start))}}h</td>
        </tr>
    </table>


</body>

</html>