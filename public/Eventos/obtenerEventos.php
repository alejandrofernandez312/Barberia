<?php

    $link = mysqli_connect("localhost", "root","", "alejandrofernandez");
    // $link = mysqli_connect("localhost", "alejandrofernandez","Futbolero2002_", "alejandrofernandez");
    $result = mysqli_query($link,"SELECT * FROM factura_barberia");
    
    $array = array();

    while($row = mysqli_fetch_array($result)){
        array_push($array, array("title"=> $row['nombre'] , "start"=>$row['start'], "end"=>$row['end']));
    }   

    echo json_encode($array);