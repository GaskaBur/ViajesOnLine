Viajes On Line =============================

24/04/2013 Última versión operativa
=============================================

12/04/2013 Entendiendo Viajes OnLine
==============================================
Despues de una charla con Caín por fin se entiende viajes on-Line y se realizan los siguientes cambios:

- Ahora siempre se lee el feed de ofertas a no ser que queramos filtrar la busqueda por localización, entonces se lee el feed con todos los viajes.
- En las plantillas se añade una varible twig que se llama server, es un array con el contenido del array $_SERVER de PHP y su utilización es homóloga.
Ejemplo:
en PHP -> $_SERVER[SERVER_NAME'];
en twig -> {{server['SERVER_NAME']}}

Nota: QUEDA PENDIENTE EN ESTE COMMIT REVISAR VUESTRA INTEGRACIÓN CON VUESTRAS PLANTILLAS.

10/04/2013 ===============================================================

**IMPLEMENTACIÓN FILTRO DE BUSQUEDA POR LOCALIDAD:
index.php?category=agenciadespedidas&localizacion=9 ó Burgos.

**ACTUALIZACIÓN DEL TEMPORIZADOR
**REVISION FICHA.HTML PARA REDES SOCIALES

08/04/2013 ===============================================================
IMPLEMENTACIÓN MEGA OFERTA:
- Implementada la funcionalidad de mega oferta:

index.php?megaoferta=true[&widget=true];

03/03/2013 -> Ultima copia subida al repo y enviada con acceso al XML real.
05/03/2013 -> Funcionando el servidor de producción.
05/03/2013 -> Implementado título de los viajes.
05/03/2013 -> Implementado Viajes de novio y Ofertas, estaban separados en el XML. 
12/03/2013 -> Implementado Portada, no se ha podido testear porque los viajes están vacios.

==============================================
14/03/2013  

Añadida funcionaliad order
==============================================

Categorías recibe el parámetro ?order
- Si no está definido se ordenan los viajes según llegan.
- Si se define como true se ordenan siguiendo el siguiente criterio:
	- Primero de menor a mayor por orden
	- Si este valor es igual por id de mayor a menor, entendiendo que el id
	  más alto es el último dado de alta.
- Si se define como random se mostrará un orden aleatorio.

**** Añadida funcion para acortar la descripción a n número de palabras.

public function cuantasPalabras($text, $limit) -> return String

donde limit es el número de palabras que se desea.

public function quitarEtiquetasHtml($text) ->return string

Elimina las etiquetas html.
==============================================

15/03/2013 

Añade el titulo del viaje a <titlte></title> y la descripción a <meta name="description" content="">
para que esto funcione se tiene que añadir el parametro head en la cabecera GET, el contenido de head es indiferente.

Implmentación Widget - 0.0.
==============================================
17/03/2013

Para mostrar el widget acceder a la url como en el siguiente ejemplo:
category=aganciadespedidas&widget=true&order=random
Pendiente de desarrollar el HTML final.
