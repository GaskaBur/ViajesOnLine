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

	#int - orden
	public $orden;

	#String - localizacion
	public $localizacion;

	#String - título
	public $titulo;

	#String - Descripción contenido HTML
	public $descripcion;

	#String - tarifa
	public $precio;

	#Array Imagen[] - Imagenes
	public $imagenes = array();

	#ing - Grupo mínimo
	public $grupoMinimo;

	public function init($_id,$_orden, $_localizacion, $_titulo, $_descripcion, $_precio, $_imagenes = null, $_grupoMinimo = null ){
		$this->id = $_id;
		$this->orden = $_orden;
		$this->localizacion = $_localizacion;
		$this->titulo = $_titulo;
		$this->descripcion = $_descripcion;
		$this->precio = $_precio;
		$this->imagenes = $_imagenes;
		$this->grupoMinimo = $_grupoMinimo;
	} 
}
?>