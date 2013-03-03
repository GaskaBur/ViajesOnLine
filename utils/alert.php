<?php

#Muestra alertas JavaScript

class Alert {

	public static function show ($text) {
		$alert = '<script language="JavaScript">alert("';
		$alert .= $text;
		$alert .= '");</script>';
		echo $alert;
	}

}