<?php

$link = mysqli_connect("localhost", "root","", "alejandrofernandez");

$id = $_POST['id'];

$result = mysqli_query($link,"DELETE FROM factura_barberia WHERE factura_id = $id");

