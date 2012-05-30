<?session_start();?> 
<?php require_once('./Connections/informeUrb.php'); 

$cod=$_GET['cod'];
$cod2=$_GET['cod2'];

mysql_select_db($database_informeUrb, $informeUrb);
$login = ("select * from usuarios,entradas where codEntrada='$cod'and Dni=dniUsuario");
$resultado = mysql_query($login, $informeUrb) or die(mysql_error());
$row_Listado = mysql_fetch_assoc($resultado);