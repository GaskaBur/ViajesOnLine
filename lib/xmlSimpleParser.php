<?php

/**
@Autor: Sergio Gil Pérez
@Company: Noises Of Hill
@ 2013

------------------------------------------------------------------------------------------------------------------
Ejemplo de uso en index
include('lib/xmlSimpleParser.php');
$xml = new XmlSimpleParser('http://ep00.epimg.net/rss/elpais/portada.xml','item');
$parseado = $xml->getItems();

foreach ($parseado as $item) {
	echo '<div>';
	foreach ($item as $key => $value) {
		echo $key.'--> '.$value.'<br>';
	}
	echo '</div>';
}
------------------------------------------------------------------------------------------------------------------
*/

 class XmlSimpleParser {

 	#URL Que contiene el contenido a parsear
 	public $url;

 	#Contiene la extructura parseada
 	public $xml;

 	#Nombre del item principal que contiene la información
 	public $item_main;

 	/**
	# constructor de la clase
	Parametros:
	$url -> URL que contiene o devuelve el archivo XML para parsear
	$item -> entrada o conjunto de entradas que se busca
 	*/
 	
	function __construct($url,$item) {
		$this->url = $url;
		$this->xml = simplexml_load_file($this->url);
		$this->item_main = $item;
	}


	/**
	Devuelve un array con los items de la entrada correspondiente
	*/
	public function getItems ()	{
		
		$exit = array();
		$i = 0;

		foreach($this->xml->children() as $child)
  		{
  			
  			
  			if ($child->getName() ==  $this->item_main)  				
  				$exit[] = $child->children();  				

  			else 
  			{	
	  			foreach ($child->children() as $key) 
	  			{
	  								
	  				if ($key->getName() ==  $this->item_main)
	  				{
	  					$exit[] =  $key->children();
	  					
	  				}
	  			}
	  		}
  		}
  		if (count($exit) == 0)
  			Alert::show('No existe la entrada especificada en XmlSimpleParser');
 
  		return $exit;  	
	}
	
 } 
?>