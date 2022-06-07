<?php

    // header('Content-Type: application/json');
    // $pdo = new PDO("mysql:dbname=alejandrofernandez;host=ieslamarisma.net/phpmyadmin","alejandrofernandez", "Futbolero2002_");

    // $sql = $pdo->prepare("SELECT * FROM cita_barberia");
    // $sql->execute();

    // $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    // echo json_encode($resultado);

    use App\Evento;

    header('Content-Type: application/json');
    $eventos = Evento::all();
    echo json_encode($eventos);