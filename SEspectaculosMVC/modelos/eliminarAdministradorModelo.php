<?php require_once('./Connections/informeUrb.php'); ?>
<?php
session_start();
$solicitudes=$_GET['cod'];
$entradas=$_GET['cod'];
$usuarios=$_GET['cod'];
$categoria=$_GET['cod'];
$informacion=$_GET['cod'];

$valor=$_GET['eliminar'];

if($valor=="solicitudes"){
	
	$deleteSQL = sprintf("DELETE  FROM ofertas WHERE idOferta='$solicitudes'");
	mysql_select_db($database_informeUrb, $informeUrb);
	$Result = mysql_query($deleteSQL, $informeUrb) or die(mysql_error());
	$mensaje= '<script name="accion"> alert("Se ha borrado correctamente la entrada");</script>';
	echo $mensaje;
}

if($valor=="entradas"){
	
	$deleteSQL = sprintf("DELETE  FROM entradas WHERE codEntrada='$entradas'");
	mysql_select_db($database_informeUrb, $informeUrb);
	$Result = mysql_query($deleteSQL, $informeUrb) or die(mysql_error());	 	
	$mensaje= '<script name="accion"> alert("Se ha borrado correctamente la oferta");</script>';
	echo $mensaje; 
}

if($valor=="usuarios"){
	
	$deleteSQL = sprintf("DELETE  FROM usuarios WHERE idConsulta='$usuarios'");
	mysql_select_db($database_informeUrb, $informeUrb);
	$Result = mysql_query($deleteSQL, $informeUrb) or die(mysql_error());
	 	
	$mensaje= '<script name="accion"> alert("Se ha borrado correctamente la Alerta");</script>';
	echo $mensaje; 
}

if($valor=="categorias"){
	
	$deleteSQL = sprintf("DELETE  FROM tipo WHERE idTipo='$categoria'");
	mysql_select_db($database_informeUrb, $informeUrb);
	$Result = mysql_query($deleteSQL, $informeUrb) or die(mysql_error());
	 	
	$mensaje= '<script name="accion"> alert("Se ha borrado correctamente la Alerta");</script>';
	echo $mensaje; 
}

if($valor=="informacion"){
	
	$maxRows_Listado = 10;
	$pageNum_Listado = 0;
	if (isset($_GET['pageNum_Listado'])) {
  		$pageNum_Listado = $_GET['pageNum_Listado'];
	}
	$startRow_Listado = $pageNum_Listado * $maxRows_Listado;
	
	mysql_select_db($database_informeUrb,$informeUrb);
	$query_Listado = "Select * from infEspectaculos where idInformacion='$informacion'";
	$query_limit_Listado = sprintf("%s LIMIT %d, %d", $query_Listado, $startRow_Listado, $maxRows_Listado);
	$Listado = mysql_query($query_limit_Listado, $informeUrb) or die(mysql_error());
	$row_Listado = mysql_fetch_assoc($Listado);
	
	echo "Ruta: ".$row_Listado['Ruta'];
	unlink($row_Listado['Ruta']);
	
	$deleteSQL = sprintf("DELETE  FROM infEspectaculos WHERE idInformacion='$informacion'");
	mysql_select_db($database_informeUrb, $informeUrb);
	$Result = mysql_query($deleteSQL, $informeUrb) or die(mysql_error());
	 	
	$mensaje= '<script name="accion"> alert("Se ha borrado correctamente la Alerta");</script>';
	echo $mensaje; 
}
?>  

<script type="text/javascript"> 	 
	window.location="index.php?controlador=administrador";
</script>