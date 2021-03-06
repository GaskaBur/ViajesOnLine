<?php

/**
@Autor: Sergio Gil Pérez
@Company: Noises Of Hill
@ 2013

#Contenido de un Viaje dentro de la aplicación
*/

class Viaje {	

#int - Id única de cada viaje
public $id;

#int - Orden de aparición del viaje dentro de su categoría
public $orden;

#String - Tipo de Viaje [Nuestras Ofertas | Despedidad de Soltero | Viajes de Novios | Turismo Activo]
public $tipo;

#String - Título del viaje
public $titulo;

#---- Categorías:

public $dds;
public $vta;
public $vdn;
public $mgo;

#String - Localización -> lugar donde se realiza el evento
public $localizacion;

#String - LocalizacionString -> traducción del código de localización.
public $localizacionString;

#String - Descripción -> Descripción el HTML del viaje
public $descripcion;

#Array - imagenes -> Array con las imágenes principales del viaje
public $imagenes = array();

#Array - Actividades que contiene el Viaje
public $actividades = array();

#String - Precio del viaje
public $precio;

#Array - Notas que pueda tener el viaje
public $notas = array();

#Array - ficheros adjuntos
public $adjuntos = array();


public function init($_id, $_orden, $_tipo,
$_agenciaDeDespedidas, $_viajesturismoactivo, $_novioViajes, $_megaOferta,
$_localizacion, $_descripcion, $_imagenes = null,
$_actividades = null, $_precio, $_notas = null,
$_adjuntos = null, $_titulo)
{
include('classes/localidades.php');	#Array de localidades
$this->id = $_id;
$this->orden = $_orden;
$this->tipo = $_tipo;
$this->dds = $_agenciaDeDespedidas;
$this->vta = $_viajesturismoactivo;
$this->vdn = $_novioViajes;
$this->mgo = $_megaOferta;
$this->localizacion = $_localizacion;
$this->localizacionString = $localidades[(int)$this->localizacion];
$this->descripcion = $_descripcion;
$this->precio = $_precio;
$this->imagenes = $_imagenes;
$this->actividades = $_actividades;
$this->notas = $_notas;
$this->adjuntos = $_adjuntos;
$this->titulo = $_titulo;
}	

public function viajesturismoactivo(){
return $this->vta;
}

public function novioViajes(){
return $this->vdn;
}

public function agenciaDeDespedidas(){
return $this->dds;
}

public function megaOferta(){
return $this->mgo;
}

/**
Devuelve un string con el numero de palabras en limit en base al parametro text.
*/
public function cuantasPalabras($text, $limit) {
$cant_palabras=explode(' ',$text);
      if (sizeof($cant_palabras) > $limit)
      {
       $text = "";
       for ($i = 0; $i<= $limit; $i++)
$text .= $cant_palabras[$i].' ';
      }
      $text = $this->quitarEtiquetasHtml($text);
      return $text;
    }

    /**
Elimina las etiquetas html del parametro String.
*/
    public function quitarEtiquetasHtml($text)
    {
     return strip_tags($text);
    }

    public function getCategoria()
    {
     $categoria = '';
     if ($this->vdn == 1)
     $categoria .='Viajes de Novios';
     if ($this->dds == 1)
     $categoria .= 'Despedidas de Soltero';
     if ($this->vta == 1)
     if ($categoria == '')
     $categoria .= 'Turismo Activo';
     else
     $categoria .= ' | Turismo Activo';
     if ($categoria == '')
     $categoria = 'Nuestras Ofertas';
     return $categoria;
    }
}
?>