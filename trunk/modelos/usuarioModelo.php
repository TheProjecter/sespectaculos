<?php require_once('./Connections/informeUrb.php'); ?>
<?php session_start();

$lognick=$_SESSION['usuario'];
$dni=$_SESSION['dni'];

mysql_select_db($database_informeUrb, $informeUrb);
$login = ("select * from usuarios where Usuario='$lognick'");
$resultado = mysql_query($login, $informeUrb) or die(mysql_error());
$row_Listado = mysql_fetch_assoc($resultado);

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado = "SELECT count(idCritica) FROM critica where dniValorado='$dni' group by dniValorado ";
$Listado = mysql_query($query_Listado, $informeUrb) or die(mysql_error());
$totalrows = mysql_fetch_array($Listado);
$totalrows = $totalrows['count(idCritica)'];

if($totalrows==0){
	$totalrows=1;
}

$puntuacion=$row_Listado['puntuacion']/$totalrows;


?>