<?php 
	
	include 'global.php'; //Incluimos la conexion
	//Recuperando variables POST
	$nombrecompleto=$_POST['nombrecompleto'];
	$nombrecorto=$_POST['nombrecorto'];
	$tipo=$_POST['tipo'];
	$codigo=$_POST['codigo'];
	$tipoproceso=$_POST['tipoproceso'];
	$rutina=$_POST['rutina'];
	$nomina=$_POST['nomina'];
	$finiquito=$_POST['finiquito'];
	
	//Creamos la consulta que guardara los nuevos registros
	$query="UPDATE conceptosnomina SET nombreconcepto='$nombrecompleto', nombrecorto='$nombrecorto', tipo='$tipo', tipoproceso='$tipoproceso',nomina = '$nomina', finiquito = '$finiquito', rutina = '$rutina', codigosat='$codigo' WHERE idconcepto='1'";
	
	$resultado=$db->query($query);
	
?>
<html>
	<head>
		<title>editarConceptosNom</title>
		 <link rel='stylesheet' href='https://bootswatch.com/4/flatly/bootstrap.css'>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){ //si el Resultafo es mayor a 0 el registro se modifico satisfactoriamente
				?>
				
				<h1>Registo Modificado</h1>
				
					<?php 	}else{ //Caso Contrario Manda un error?>
				
				<h1>Error al Modificar Cliente</h1>
				
			<?php	} ?>
			
			<p></p>	
			
			<a href="index.php">Regresar</a>
			
		</center>
	</body>
</html>