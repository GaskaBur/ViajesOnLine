Viajes On Line =============================

03/03/2013 -> Ultima copia subida al repo y enviada con acceso al XML real.
05/03/2013 -> Funcionando el servidor de producción.
05/03/2013 -> Implementado título de los viajes.
05/03/2013 -> Implementado Viajes de novio y Ofertas, estaban separados en el XML. 
12/03/2013 -> Implementado Portada, no se ha podido testear porque los viajes están vacios.

==============================================
14/03/2013  

**** Añadida funcionalidad order:

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

