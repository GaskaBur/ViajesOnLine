<?php
/**
@Autor: Sergio Gil Pérez
@Company: Noises Of Hill
@ 2013

#Contenido de una Actividad dentro de la aplicación
*/
class Actividad {

	#String - Nombre de la actividad
	public $nombre;

	#String - Descripción de la actividad
	public $descripcion;

	#Array - Imágenes asociadas a la actividad
	public $imagenes = array ();

	function __construct($_nombre, $_descripcion, $_imagenes = null) {
		$this->nombre = $_nombre;
		$this->descripcion = $_descripcion;
		$this->imagenes = $_imagenes;
	}
}
?>