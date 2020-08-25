<?php 
//en caso de que no se encuentren coincidencias en la cosulta hecha el el archivo validar.php
echo '<script> alert("No cuentas con los privilegios para acceder a esta Seccion o la cntraseña es incorrecta");</script>';
session_destroy();
echo '<script> window.location="../index.php"; </script>';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Error</title>
</head>
<body>
	 <a href="cierre.php">Error</a>
</body>
</html>