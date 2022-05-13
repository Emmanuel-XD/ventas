<?php
/*
	Pequeño, muy pequeño sistema de ventas en PHP con MySQL

	@author emmanuel

	No olvides visitar parzibyte.me/blog para más cosas como esta
*/
$contraseña = "mugarte14";
$usuario = "dbu833532";
$nombre_base_de_datos = "ventas";
try{
	$base_de_datos = new PDO('mysql:host=db5007568055.hosting-data.io;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
	 $base_de_datos->query("set names utf8;");
    $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>