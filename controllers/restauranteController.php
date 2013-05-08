<?php
/**
@Autor: Sergio Gil Pérez
@Company: Noises Of Hill
@ 2013

#Controlador para los viajes
*/
class ControllerRestaurantes {

	# Array con todos los restaurantes
	private $restaurantes = array();

	#Restaurante en uso
	public $restaurante;

	public static function loadRestaurantes()
	{
		$xml = new XmlSimpleParser('http://viajes-online.net/admcms/wp-content/themes/wp-foundation/temporizador/libs/viajesOnLineOfertas.xml');
		$this->addRestaurantes('restaurante',$xml);
	}

	/**
	Busca los viajes por el item que corresponda en el xml y los añade al array viajes o al array viajesOferta si son ofertas.
	*/
	private function addRestaurantes($_item,$xml)
	{
		$parseado = $xml->getItems($_item);
		
		foreach ($parseado as $item) {
			
			
			$imagenes = array();

			foreach ($item->imagenprincipal as $imagen) {
				$img = new Imagen($imagen->url, $imagen->alt, $imagen->title);
				$imagenes[] = $img;
			}

			
			$restaurante = new Restaurante();
			$restaurante->init(
				$item->id,
				$item->titulo,
				$item->descripcion,
				$item->tarifa,
				$imagenes,
				$item->observaciones1,
				$item->observaciones2
			);

			$this->restaurantes[] = $restaurante;

		}
	}
}