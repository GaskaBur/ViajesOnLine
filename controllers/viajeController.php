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

	#Array - Contiene todas los viajes de oferta, el motivo de usar otra Array es porque se categoriza de distinta manear que el resto de viajes.
	private $viajesOferta = array();

	#Viaje - Viaje auxiliar
	public $viaje;

	/**
	Carga todos los viajes del XML y los guarda en:
	$viajes -> todos los viajes categorizados en Despedidas de soltero, Turismo Activo y Viajes de novios
	$viajesOferta -> contiene los viajes en oferta.
	*/
	public function loadViajes(){
		
		$xml = new XmlSimpleParser('http://www.grupotiempoactivo.com/feed-datos.php');
		//$xml = new XmlSimpleParser('http://192.168.1.130/viajes-online.net/admcms/wp-content/themes/wp-foundation/XML-parser/XML-tipo/xmlWeb.xml','viaje');

		#Cargando datos de los viajes -------------------------------------------------------------------------------------------

		#Iniciando Arrays
		$this->viajes = array();
		$this->viajesOferta = array();

		#insertando los distintos viajes
		$this->addViajes('viaje',$xml); //La etiqueta viaje engloba despedidas de solter y Turismo Activo <viaje>
		$this->addViajes('viajenovios',$xml); //viajes de novios <viajenovios>
		$this->addViajes('ofertaviaje',$xml); //ofertas <ofertaviaje>		

		Console::log($this->viajes); //Con FireBug se puede ver los viajes obtenidos, comentar si no se quiere esto.
	}

	/**
	Obtiene los viajes de la categoría especificada
	*/
	public  function GetViajesCategoria($cat){
		$travels = array();
		$t = 'tipo';
		if ($cat != 'NuestrasOfertas' && $cat != "") 
		{
			//Carga los viajes de la categoría que corresponda (No ofertas)
			foreach ($this->viajes as $v) {		
				if ($v->$cat() == 1) // <------ De esta forma se llama a un metodo de forma dinámica en PHP.
					$travels[] =  $v ;
			}
		}
		else 
		{
			//Carga los viajes en ofertas
			foreach ($this->viajesOferta as $v) {		
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
			//No se ha especifado categoría
			//Buscamos el viaje dentro de los viajes 'normales'
			foreach ($this->viajes as $v) 	
				if ($v->id == $id)
				{
					$viaj = $v; 
					break;
				}
			//Si el viaje no ha sido encontrado buscamos en los viajes en oferta.	
			if ($viaj == null) 
				foreach ($this->viajesOferta as $v) 	
				if ($v->id == $id)
				{
					$viaj = $v;
					break;
				}
		}
		else if ($cat == 'NuestrasOfertas')
		{
			//La categoría espeficada es 'NuestrasOfertas' por tanto se busca en $this->viajesOferta
			foreach ($this->viajesOferta as $v){	
				if ($v->id == $id)
				{
					$viaj = $v;
					break;
				}

			}

		}
		else
		{
			//La categoría espeficada NO es 'NuestrasOfertas' por tanto se busca en $this->viajes		
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

	/**
	Busca los viajes por el item que corresponda en el xml y los añade al array viajes o al array viajesOferta si son ofertas.
	*/
	private function addViajes($_item,$xml)
	{
		$parseado = $xml->getItems($_item);
		
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
				$adjuntos,
				$item->titulo
			);

			if ($_item == 'ofertaviaje')
				$this->viajesOferta[] = $viaje;
			else
				$this->viajes[] = $viaje;

		}
	}

}
?>