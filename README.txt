Viajes On Line =============================

24/04/2013 �ltima versi�n operativa
=============================================

12/04/2013 Entendiendo Viajes OnLine
==============================================
Despues de una charla con Ca�n por fin se entiende viajes on-Line y se realizan los siguientes cambios:

- Ahora siempre se lee el feed de ofertas a no ser que queramos filtrar la busqueda por localizaci�n, entonces se lee el feed con todos los viajes.
- En las plantillas se a�ade una varible twig que se llama server, es un array con el contenido del array $_SERVER de PHP y su utilizaci�n es hom�loga.
Ejemplo:
en PHP -> $_SERVER[SERVER_NAME'];
en twig -> {{server['SERVER_NAME']}}

Nota: QUEDA PENDIENTE EN ESTE COMMIT REVISAR VUESTRA INTEGRACI�N CON VUESTRAS PLANTILLAS.

10/04/2013 ===============================================================

**IMPLEMENTACI�N FILTRO DE BUSQUEDA POR LOCALIDAD:
index.php?category=agenciadespedidas&localizacion=9 � Burgos.

**ACTUALIZACI�N DEL TEMPORIZADOR
**REVISION FICHA.HTML PARA REDES SOCIALES

08/04/2013 ===============================================================
IMPLEMENTACI�N MEGA OFERTA:
- Implementada la funcionalidad de mega oferta:

index.php?megaoferta=true[&widget=true];

03/03/2013 -> Ultima copia subida al repo y enviada con acceso al XML real.
05/03/2013 -> Funcionando el servidor de producci�n.
05/03/2013 -> Implementado t�tulo de los viajes.
05/03/2013 -> Implementado Viajes de novio y Ofertas, estaban separados en el XML. 
12/03/2013 -> Implementado Portada, no se ha podido testear porque los viajes est�n vacios.

==============================================
14/03/2013  

A�adida funcionaliad order
==============================================

Categor�as recibe el par�metro ?order
- Si no est� definido se ordenan los viajes seg�n llegan.
- Si se define como true se ordenan siguiendo el siguiente criterio:
	- Primero de menor a mayor por orden
	- Si este valor es igual por id de mayor a menor, entendiendo que el id
	  m�s alto es el �ltimo dado de alta.
- Si se define como random se mostrar� un orden aleatorio.

**** A�adida funcion para acortar la descripci�n a n n�mero de palabras.

public function cuantasPalabras($text, $limit) -> return String

donde limit es el n�mero de palabras que se desea.

public function quitarEtiquetasHtml($text) ->return string

Elimina las etiquetas html.
==============================================

15/03/2013 

A�ade el titulo del viaje a <titlte></title> y la descripci�n a <meta name="description" content="">
para que esto funcione se tiene que a�adir el parametro head en la cabecera GET, el contenido de head es indiferente.

Implmentaci�n Widget - 0.0.
==============================================
17/03/2013

Para mostrar el widget acceder a la url como en el siguiente ejemplo:
category=aganciadespedidas&widget=true&order=random
Pendiente de desarrollar el HTML final.
