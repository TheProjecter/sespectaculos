<?php require_once('./Connections/informeUrb.php'); ?>
<? session_start();

$cod=$_GET['entradas'];

mysql_select_db($database_informeUrb, $informeUrb);
$login = ("select * from entradas where codEntrada='$cod'");
$resultado = mysql_query($login, $informeUrb) or die(mysql_error());
$row_Listado = mysql_fetch_assoc($resultado);

$dni=$row_Listado['dniUsuario'];

mysql_select_db($database_informeUrb, $informeUrb);
$login2 = ("select * from usuarios where Dni='$dni'");
$resultado2 = mysql_query($login2, $informeUrb) or die(mysql_error());
$row_Listado2 = mysql_fetch_assoc($resultado2);

?>