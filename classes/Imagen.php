<?php

/**
@Autor: Sergio Gil Pérez
@Company: Noises Of Hill
@ 2013

#Contenido de una Imagen dentro de la aplicación
*/

class Imagen {
	
	#String - atributo src de la imagen
	public $url;

	#String - atributo alt de la imagen
	public $alt;

	#String - atributo title de la imagen
	public $title;

	function __construct($img_url, $img_alt, $img_title = null) {
		$this->url = $img_url;
		$this->alt = $img_alt;
		$this->title = $img_title;
	}
}
?>