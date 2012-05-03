<?php require_once('./Connections/informeUrb.php'); ?>
<?session_start();
$lognick=$_SESSION['usuario'];
$idUsuario= $_SESSION['dni'];

//nos genera todas la provincias de españa
$maxRows_Listado = 80;
$pageNum_Listado = 0;
if (isset($_GET['pageNum_Listado'])) {
  $pageNum_Listado = $_GET['pageNum_Listado'];
}
$startRow_Listado = $pageNum_Listado * $maxRows_Listado;

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado = "SELECT count(idCritica) FROM critica where dniValorado='$idUsuario' group by dniValorado ";
$Listado = mysql_query($query_Listado, $informeUrb) or die(mysql_error());
$totalrows = mysql_fetch_array($Listado);

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado1 = "SELECT * FROM critica, usuarios where dniValorado='$idUsuario' and Dni=dniValorado";
$query_limit_Listado1 = sprintf("%s LIMIT %d, %d", $query_Listado1, $startRow_Listado, $maxRows_Listado);
$Listado1 = mysql_query($query_limit_Listado1, $informeUrb) or die(mysql_error());