<?php
/**
@Autor: Sergio Gil Pérez
@Company: Noises Of Hill
@ 2013

#Controlador para los viajes
*/
class Controller{

	# Array con todos los items
	public $items = array();

	#item en uso
	public $item;

	public function loadItems($url,$item,$order = null)
	{
		$xml = new XmlSimpleParser($url);
		$this->addItems($item,$xml,$order);
	}

	/**
	Busca los viajes por el item que corresponda en el xml y los añade al array viajes o al array viajesOferta si son ofertas.
	*/
	private function addItems($_item,$xml,$order = null)
	{
		$parseado = $xml->getItems($_item);
		
		foreach ($parseado as $item) {
			
			
			$imagenes = array();

			foreach ($item->imagenprincipal as $imagen) {
				$img = new Imagen($imagen->url, $imagen->alt, $imagen->title);
				$imagenes[] = $img;
			}

			foreach ($item->imagen as $imagen) {
				$img = new Imagen($imagen->url, $imagen->alt, $imagen->title);
				$imagenes[] = $img;
			}
			
			$mod = new Model();
			$mod->init(
				$item->id,
				$item->orden,
				$item->localizacon,
				$item->titulo,
				$item->descripcion,
				$item->tarifa,
				$imagenes,
				$item->grupominimo
			);



			$this->items[] = $mod;
		}
		
		#ordenando viajes -------------------------------------------------------------------------------
		if ($order == 'true')
		{
			$this->items = $this->ordenarItems($this->items);
		}
		elseif ($order == 'random')
		{
			shuffle($this->items);
		}
				
		return $this->items;

	}

	public function getItem($id)
	{
		$this->item = null;

		foreach ($this->items as $i) 	
			if ($i->id == $id)
			{
				$this->item = $i; 
				break;
			}

		return $this->item;

	}

	/**
	#Metodo Shell de ordenación
	# Criterio de ordenación:
	# de menor a mayor por número de orden
	# si el númeor de orden coincide ordeno de mayor a menor por número de id
	# entendiendo así que ha id más alta, el viaje es mas novedoso.
	*/
	private function ordenarItems($array)
	{
		$v = $array;
		$n = sizeof($v);
        $incremento = $n;

        do {
            $incremento = (int) ($incremento / 2);
            for ($k = 0; $k < $incremento; $k++) {
                for ($i = $incremento + $k; $i < $n; $i = $i + $incremento) {
                    $j = $i;
                    while ($j - $incremento >= 0 ) {
	                    $x =  (int) $v[$j]->orden;                    
	                    $y = (int) $v[$j - $incremento]->orden;
	                    if ($x < $y )
		                    {
		                    	#el númeo de orden es menor
		                    	$tmp = $v[$j];
		                        $v[$j] = $v[$j - $incremento];
		                        $v[$j - $incremento] = $tmp;
		                    }
		                if ($x == $y) {
		                	if ((int)$v[$j]->id > (int) $v[$j - $incremento]->id)
		                	{
		                		#el número de id es mayor
		                		$tmp = $v[$j];
		                        $v[$j] = $v[$j - $incremento];
		                        $v[$j - $incremento] = $tmp;
		                	}
		                } 
	                     $j = $j - $incremento;
                    }
                }
            }
        } while ($incremento > 1);
        
        return $v;
	}
}