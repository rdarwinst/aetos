<?php

function conectarDB(): mysqli
{
    $db = new mysqli('localhost', 'root', 'root', 'aetos_web');

    if (!$db) {
        echo "¡Error al conectar con la base de datos!";
        exit;
    }

    return $db;
}
