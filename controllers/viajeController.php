<?php
/**
@Autor: Sergio Gil Pérez
@Company: Noises Of Hill
@ 2013

#Controlador para los viajes

*/
class ControllerViajes {

	#Array - Contiene todos los viajes
	private $viajes = array();

	#Viaje
	public $viaje;

	public function loadViajes(){
		
		$xml = new XmlSimpleParser('http://www.grupotiempoactivo.com/feed-datos.php','viaje');
		//$xml = new XmlSimpleParser('http://192.168.1.130/viajes-online.net/admcms/wp-content/themes/wp-foundation/XML-parser/XML-tipo/xmlWeb.xml','viaje');
		$parseado = $xml->getItems();
		//Console::log($parseado);

		#Cargando datos de los viajes -------------------------------------------------------------------------------------------

		$this->viajes = array();

		foreach ($parseado as $item) {
			
			$imagenes = array();
			$actividades = array();
			$notas = array();
			$adjuntos = array();

			foreach ($item->imagenprincipal as $imagen) {
				$img = new Imagen($imagen->url, $imagen->alt, $imagen->title);
				$imagenes[] = $img;
			}

			foreach ($item->actividad as $actividad) {
				$img_actividad = array();
				foreach ($actividad->imagen as $imagen) {
					$img = new Imagen($imagen->url, $imagen->alt, $imagen->title);
					$img_actividad[] = $img;
				}
				$act = new Actividad($actividad->nombre, $actividad->descripcion, $img_actividad);
				$actividades[] = $act;
			}

			foreach ($item->nota as $nota)
				$notas[] = $nota;

			foreach ($item->adjunto as $adjunto)
				$adjuntos[] = $adjunto;

			$viaje = new Viaje();
			$viaje->init(
				$item->id,
				$item->orden,
				$item->tipo,
				$item->agenciadedespedidas,
				$item->viajesturismoactivo,
				$item->novioviajes,
				$item->localizacion,
				$item->descripcion,
				$imagenes,
				$actividades,
				$item->precio,
				$notas,
				$adjuntos
			);

			$this->viajes[] = $viaje;

		}

		
		

		//Console::log($this->viajes);
	}

	public  function GetViajesCategoria($cat){

		$travels = array();
		$t = 'tipo';
		if ($cat != 'nuestrasofertas')
		{
			foreach ($this->viajes as $v) {		
				if ($v->$cat() == 1)
					$travels[] =  $v ;
			}
		}
		return $travels;
	}

	public function getViaje($id, $cat = null)
	{
		$viaj = null;

		if ($cat == null)
		{	
			foreach ($this->viajes as $v) 	
				if ($v->id == $id)
				{
					$viaj = $v;
					break;
				}
		}
		else
		{
			
			foreach ($this->viajes as $v){	
				if ($v->id == $id && $v->$cat() == 1)
				{
					$viaj = $v;
					break;
				}

			}
		}
		return $viaj;
		
	}

	private function getCategoryName($idCat)
	{
		$tipo = '';
		switch ($idCat) {
			case '1':
				$tipo = 'Nuestras Ofertas';
				break;
			case '2':
				$tipo = 'Viajes de Novios';
				break;
			case '3':
				$tipo = 'Despedidas de Soltero';
				break;
			case '4':
				$tipo = 'Turismo Activo';
				break;
			default:
				Alert::show('No Existe categoria - '.$idCat);
				die;
				break;
		}
		return $tipo;
	}

}
?>