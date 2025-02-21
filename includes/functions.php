<?php

define("IMAGES_URL",  __DIR__ . "../uploads/images/");
define("FUNCTIONS_URL", __DIR__ . "functions.php");
define("TEMPLATES_URL", __DIR__ . "/templates");


function incluirTemplate(string $name)
{
    include TEMPLATES_URL . "/{$name}.php";
}
