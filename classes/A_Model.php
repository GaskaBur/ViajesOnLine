<?php

/**
@Autor: Sergio Gil Pérez
@Company: Noises Of Hill
@ 2013

#Contenido de un Viaje dentro de la aplicación
*/

class Model {	

	#int - id_alojamiento
	public $id;

	#String - título
	public $titulo;

	#String - Descripción contenido HTML
	public $descripcion;

	#String - tarifa
	public $tafifa;

	#Array Imagen[] - Imagenes
	public $imagenes = array();

	#String - Observaciones1
	public $observaciones1;

	#String - Observaciones2
	public $observaciones2;

	public function init($_id, $_titulo, $_descripcion, $_tarifa, $_imagenes = null, $_observaciones1 = null, $_observaciones2 = null){
		$this->id = $_id;
		$this->titulo = $_titulo;
		$this->descripcion = $_descripcion;
		$this->tarifa = $_tarifa;
		$this->imagenes = $_imagenes;
		$this->observaciones1 = $_observaciones1;
		$this->observaciones2 = $_observaciones2;
	} 
}
?>