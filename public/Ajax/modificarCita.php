<?php

$link = mysqli_connect("localhost", "root","", "alejandrofernandez");

$id = $_POST['id'];
$start = $_POST['start'];
$end ="";
$servicio_id = $_POST['servicio_id'];
$cliente_id = $_POST['cliente_id'];

$result = mysqli_query($link,"SELECT * FROM servicio_barberia");

$tiempo = "";
while($row = mysqli_fetch_array($result)){
    if($row['servicio_id'] == $servicio_id){
        $tiempo = $row['tiempo'];
    }
 } 

$end = strtotime ( '+' . $tiempo .'minutes' , strtotime ($start) );
$end = date ( 'Y-m-d H:i:s' , $end); 

echo $start . " " . $end;



$result = mysqli_query($link,"UPDATE factura_barberia SET start = '$start', end = '$end', servicio_id = '$servicio_id', cliente_id = '$cliente_id' WHERE factura_id = $id");


