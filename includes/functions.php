<?php

define("IMAGES_URL",  __DIR__ . "../../uploads/images/");
define("FUNCTIONS_URL", __DIR__ . "functions.php");
define("TEMPLATES_URL", __DIR__ . "/templates");


function incluirTemplate(string $name)
{
    include TEMPLATES_URL . "/{$name}.php";
}

function debuguear($valor)
{
    echo "<pre>";
    var_dump($valor);
    echo "</pre>";
    exit;
}

function s($html)
{
    $s = htmlspecialchars($html);
    return $s;
}

function validarTipoContenido($tipo)
{
    $tipos = ['slide', 'service', 'work', 'info'];
    return in_array($tipo, $tipos);
}
