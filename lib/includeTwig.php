<?php

/**
Carga twig y lo prepara para su uso, asigando la carpeta templates en raiz para las vistas

-----------------------------------------------
Ejemplo de uso

echo $twig->render('index.html', array('name' => 'Fabien'));

-----------------------------------------------
Otra opcion: guardando cache:

$twig = new Twig_Environment($loader, array(
    'cache' => '/path/to/compilation_cache',
));
*/

require_once 'twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);
?>