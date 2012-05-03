<?php require_once('./Connections/informeUrb.php'); ?>
<?php
session_start();
$entrada=$_GET['cod'];
$ofertas=$_GET['cod'];
$alertas=$_GET['cod'];
$usuarios=$_GET['cod'];
$interesado=$_GET['cod'];

$valor=$_GET['eliminar'];
//echo "Cat: ".$categoria." Ent: ".$entrada." Ofe: ".$ofertas." usu: ".$usuarios;

if($valor=="entradas"){
	//echo "Ent: ".$entrada;
	$deleteSQL = sprintf("DELETE  FROM entradas WHERE codEntrada='$entrada'");
	mysql_select_db($database_informeUrb, $informeUrb);
	$Result = mysql_query($deleteSQL, $informeUrb) or die(mysql_error());
	$mensaje= '<script name="accion"> alert("Se ha borrado correctamente la entrada");</script>';
	echo $mensaje;
}

if($valor=="ofertas"){
	//echo "Ofe: ".$ofertas;
	$deleteSQL = sprintf("DELETE  FROM ofertas WHERE codEntrada='$ofertas'");
	mysql_select_db($database_informeUrb, $informeUrb);
	$Result = mysql_query($deleteSQL, $informeUrb) or die(mysql_error());	 	
	$mensaje= '<script name="accion"> alert("Se ha borrado correctamente la oferta");</script>';
	echo $mensaje; 
}

if($valor=="alertas"){
	//echo "Ale: ".$alertas;
	$deleteSQL = sprintf("DELETE  FROM consultas WHERE idConsulta='$alertas'");
	mysql_select_db($database_informeUrb, $informeUrb);
	$Result = mysql_query($deleteSQL, $informeUrb) or die(mysql_error());
	 	
	$mensaje= '<script name="accion"> alert("Se ha borrado correctamente la Alerta");</script>';
	echo $mensaje; 
}

if($valor=="usuarios"){
	
	$deleteSQL = sprintf("DELETE  FROM usuarios WHERE dni='$usuarios'");
	mysql_select_db($database_informeUrb, $informeUrb);
	$Result = mysql_query($deleteSQL, $informeUrb) or die(mysql_error());
	 	
	$mensaje= '<script name="accion"> alert("Se ha eliminado correctamente al usuario");</script>';
	echo $mensaje; 
	session_destroy();
	?>
	<script type="text/javascript"> 	 
	window.location="index.php";
	</script>
	<?php 
}

if($valor=="interesado"){
	//echo "Ale: ".$alertas;
	$deleteSQL = sprintf("DELETE  FROM ofertas WHERE dniConsulta='$alertas'");
	mysql_select_db($database_informeUrb, $informeUrb);
	$Result = mysql_query($deleteSQL, $informeUrb) or die(mysql_error());
	 	
	$mensaje= '<script name="accion"> alert("Se ha borrado correctamente la Alerta");</script>';
	echo $mensaje; 
}
?>  

<script type="text/javascript"> 	 
	window.location="index.php?controlador=usuarios";
</script>