<?php

#Añade funcion FireBug a la aplicación


require_once('FirePHPCore/FirePHP.class.php');

class Console{

	public static function log ($text)
	{
		$firephp = FirePHP::getInstance(true);
		$firephp->log($text);
	}
}

?>