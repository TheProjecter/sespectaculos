<?php require_once('./Connections/informeUrb.php'); ?>
<?session_start();

$var1=$_GET['entrada'];
$dni=$_SESSION['dni'];

mysql_select_db($database_informeUrb, $informeUrb);
$login3 = ("select * from ofertas where codEntrada='$var1' and dniUsuario='$dni'");
$resultado3 = mysql_query($login3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($resultado3);

if(isset($row_Listado3['codEntrada'])){?>
	<script>parent.location.href="index.php?controlador=opcionesUsuario&opcion=fallo";</script><?php 
}

$login4 = ("select * from aceptada where codEntradas='$var1' and dniUsuario='$dni'");
$resultado4 = mysql_query($login4, $informeUrb) or die(mysql_error());
$row_Listado4 = mysql_fetch_assoc($resultado4);

if(isset($row_Listado4['codEntrada'])){?>
	<script>alert("Ya has realizado una oferta por esta entrada");
	parent.location.href="index.php?controlador=usuarios";</script><?php 
}

mysql_select_db($database_informeUrb, $informeUrb);
$login2 = ("select * from entradas,usuarios where codEntrada='$var1' and Dni=dniUsuario");
$resultado2 = mysql_query($login2, $informeUrb) or die(mysql_error());
$row_Listado2 = mysql_fetch_assoc($resultado2);

$var=$row_Listado2['dniUsuario'];

mysql_select_db($database_informeUrb, $informeUrb);
$login = ("select * from usuarios where Dni='$var'");
$resultado = mysql_query($login, $informeUrb) or die(mysql_error());
$row_Listado = mysql_fetch_assoc($resultado);
?>