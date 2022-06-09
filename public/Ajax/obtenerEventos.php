<?php

    $link = mysqli_connect("localhost", "root","", "alejandrofernandez");
    // $link = mysqli_connect("localhost", "alejandrofernandez","Futbolero2002_", "alejandrofernandez");
    $result = mysqli_query($link,"SELECT s.nombre as nombre, f.start as start, f.end as end, s.servicio_id as servicio_id, f.cliente_id as cliente_id, f.factura_id as factura_id FROM factura_barberia f, servicio_barberia s WHERE f.servicio_id = s.servicio_id");
    
    $array = array();

    while($row = mysqli_fetch_array($result)){
        array_push($array, array("title"=> $row['nombre'] , "start"=>$row['start'], "end"=>$row['end'], "servicio"=>$row['servicio_id'], "cliente"=>$row['cliente_id'], "cita"=>$row['factura_id']));
    }   

    echo json_encode($array);