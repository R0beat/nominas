<?php

	$db = new mysqli("localhost","root","","nominas"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	
	$db->query("SET NAMES utf8");
?>
