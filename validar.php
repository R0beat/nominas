<?php
   	include 'global.php'; //Incluimos la conexicón
   	session_start();
   	$password = $_POST["contraseña"]; //almacenamos las variables POST 
   	$empresa = $_POST["empresa"];
   	$email = $_POST["email"];

   	$_SESSION["email"] = $email; //Creamos Variables de sesión
   	$_SESSION["empresa"] = $empresa;
	
	//creeamos la consulta y Validamos que  el usuario sea Administrador para poder accesar
 	$sql = mysqli_query($db,"SELECT * FROM permiso WHERE email like '%$empresa%' AND contraseña like '%$password%' AND conceptosnominaadmin like '%Admin%'");
 	$fila = mysqli_fetch_row($sql);

	if($fila == 0){ //Si el el resultado es 0 nos redireccionara a la pagina error
	header("Location:error.php");
	}
		else if($fila > 1 ){ //si el resultado es mayor a '1' nos direcciona a la pagina de inicio

		header("Location:index.php");

	}
?>

