Viajes On Line =============================

03/03/2013 -> Ultima copia subida al repo y enviada con acceso al XML real.
05/03/2013 -> Funcionando el servidor de producci�n.
05/03/2013 -> Implementado t�tulo de los viajes.
05/03/2013 -> Implementado Viajes de novio y Ofertas, estaban separados en el XML. 
12/03/2013 -> Implementado Portada, no se ha podido testear porque los viajes est�n vacios.

==============================================
14/03/2013  

**** A�adida funcionalidad order:

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

