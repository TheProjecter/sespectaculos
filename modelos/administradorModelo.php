<?php require_once('./Connections/informeUrb.php'); ?>
<?php session_start();

$lognick=$_SESSION['usuarioAdm'];

mysql_select_db($database_informeUrb, $informeUrb);
$login = ("select * from usuarios where Usuario='$lognick'");
$resultado = mysql_query($login, $informeUrb) or die(mysql_error());
$row_Listado = mysql_fetch_assoc($resultado);

?>