<?php

/**
@Autor: Sergio Gil Pérez
@Company: Noises Of Hill
@ 2013
*/

/**
#Power by nicolaspar 2007  // Esta funcion sirve s los archvios de una carpeta.
Esta función incluye todos los archivos .php de la carpeta especificada en $path
*/
function require_once_dir( $path ){
    $dir = dir($path);
    while( ( $file = $dir->read() ) !== false )
        if( is_file( $path .'/'. $file ) and preg_match( '/^(.+)\.php$/i' , $file ) )
            require_once( $path .'/'. $file );
    $dir->close();
}

//CLASES Y UTILS - Incluyo clases y utils que utilizaré en la aplicación ---------------------------------------------------		

require_once_dir( 'classes' ); 	#Incluye todos los .php de la carpeta classes (Clases necesarias propias de la app)
require_once_dir( 'utils' );	#Incluye todos los .php de la carpeta utils -> utilidades varias (errores, logs, etc...)
require_once_dir( 'controllers' );	#Incluye todos los .php de la carpeta controllers -> Controladores


//LIBRERIAS - Incluyo las librerías necesarias ------------------------------------------------------------------------------		  

include('lib/xmlSimpleParser.php'); 	#Esta librería permite parsear url
include('lib/includeTwig.php');			#Uso de plantillas Twig

//Cargando Viajes
$viajes = new ControllerViajes();
$viajes -> loadViajes(); //Este método ahora carga viajes normales y ofertas.

//Analizando URL -> Parámetros _GET vid|category

#Llega por URL id del viaje (vid) y categoría (category)
if (isset($_GET['vid']) && isset($_GET['category'])) {
	$v = $viajes->getViaje($_GET['vid'],$_GET['category']);
	if ($v == null)
		echo $twig->render('index.html', array('name' => 'Fabien'));
	else
		echo $twig->render('ficha.html', array('v' => $v,'cat'=>$_GET['category']));
}

#Llega por URL categoria del viaje (category)
elseif (isset($_GET['category'])){
	$viajes_cat = $viajes->GetViajesCategoria($_GET['category']);
	if ($_GET['category'] == 'portada')
	{
		echo $twig->render('portada.html', array(
			'viajes' => $viajes_cat,
			'cat' => $_GET['category'],
			));
	}
	else
	{
		echo $twig->render('categoria.html', array(
			'viajes' => $viajes_cat,
			'cat' => $_GET['category'],
			));
	}

}

//Llega por URL el id del viaje (vid)
elseif (isset($_GET['vid'])) {
	$v = $viajes->getViaje($_GET['vid']);
	if ($v == null)
		echo $twig->render('index.html', array('name' => 'Fabien'));
	else
		echo $twig->render('ficha.html', array('v' => $v));
}

//No llega ningún parametro _GET
else {
	echo $twig->render('index.html', array('name' => 'Fabien'));
}






	



