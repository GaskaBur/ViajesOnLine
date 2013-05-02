<?php

/**
@Autor: Sergio Gil Pérez
@Company: Noises Of Hill
@ 2013
*/

/**
#Power by nicolaspar 2007  // Esta funcion sirve los archivos de una carpeta.
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


$twig->addGlobal('server',$_SERVER);

//Cargando Viajes
$viajes = new ControllerViajes();
$viajes -> loadViajes(); //Este método ahora carga viajes normales y ofertas.


	if (isset ($_GET['localizacion'] ) && $_GET['localizacion'] != 0)
		$viajes -> loadViajes('http://viajes-online.net/admcms/wp-content/themes/wp-foundation/temporizador/libs/viajesOnLine.xml');
		//  http://www.grupotiempoactivo.com/feed-datos.php
		
//Analizando URL -> Parámetros _GET id|category

#Llega por URL la petición de la MegaOferta
if (isset($_GET['megaoferta'])){
	$oferta = $viajes->getMegaOferta();
	if (isset($_GET['widget']))
		echo $twig->render('megaofertawidget.html', array(
				'oferta' => $oferta,
		));
	else
		echo $twig->render('megaoferta.html', array(
				'oferta' => $oferta,
		));
	
}
#Llega por URL id del viaje (id) y categoría (category)
elseif (isset($_GET['id']) && isset($_GET['category'])) {
	getterID($viajes->getViaje($_GET['id'],$_GET['category']),$twig,$_GET['category']);
}

#Llega por URL categoria del viaje (category)
elseif (isset($_GET['category'])){

	$viajes_cat = $viajes->GetViajesCategoria(
			$_GET['category'],
			isset($_GET['order']) ? $_GET['order'] : null,
			isset($_GET['widget']) ? $_GET['widget'] : null,
			isset($_GET['localizacion']) ? $_GET['localizacion'] : null
	);
	
	if ($_GET['category'] == 'nuestrasofertas')
		$viajes -> loadViajes('http://viajes-online.net/admcms/wp-content/themes/wp-foundation/temporizador/libs/viajesOnLineOfertas.xml');
		//  http://www.grupotiempoactivo.com/feed-datos-ofertas.php


	if ($_GET['category'] == 'portada')
	{
		if(!isset($_GET['widget']))
			echo $twig->render('portada.html', array(
				'viajes' => $viajes_cat,
				'cat' => $_GET['category'],
				
			));
		else
			echo $twig->render('widget.html', array(
				'viajes' => $viajes_cat,
				'cat' => $_GET['category'],
			));

	}
	else
	{
		if(!isset($_GET['widget']))
			echo $twig->render('categoria.html', array(
				'viajes' => $viajes_cat,
				'cat' => $_GET['category'],
				
			));
		else
			echo $twig->render('widget.html', array(
				'viajes' => $viajes_cat,
				'cat' => $_GET['category'],
			));

	}

}

//Llega por URL el id del viaje (id)
elseif (isset($_GET['id'])) {
	getterID($viajes->getViaje($_GET['id']),$twig);
	
}

//No llega ningún parametro _GET
else {
	echo $twig->render('index.html', array('name' => 'Fabien'));
}

/**
Esta funcion es similar para conseguir la ficha del viaje para los getters ID e ID+CATEGORY
*/
function getterID($v,$twig,$category = null)
{
	if ($v == null)
		echo $twig->render('index.html', array('name' => 'Fabien'));
	else
	{
		$putHead = 0;
		$c = $v->getCategoria();
		isset($_GET['head']) ? $putHead = 1 : $putHead = 0;
		echo $twig->render('ficha.html', array('v' => $v,
				'putHead' => $putHead,
				'cat' => $c,
				'originalCat' => $category));
	}
}

