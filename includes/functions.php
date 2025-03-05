<?php

define("IMAGES_URL",  __DIR__ . "/../uploads/images/");
define("PORTFOLIO_URL", __DIR__ . "/../uploads/portfolio/");
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

function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

function validarTipoContenido($tipo)
{
    $tipos = ['slide', 'service', 'work', 'info'];
    return in_array($tipo, $tipos);
}

function mostrarANotificiacion($codigo)
{
    $mensaje = '';

    switch ($codigo) {
        case 1:
            $mensaje = 'Created successfully';
            break;
        case 2:
            $mensaje = 'Updated successfully';
            break;
        case 3:
            $mensaje = 'Deleted successfully';
            break;
        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
}
function estaAutenticado()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
        header('Location: /');
        exit;
    }
}