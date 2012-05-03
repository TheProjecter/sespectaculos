<?session_start();?> 
<?php require_once('./Connections/informeUrb.php'); 

$id=$_GET['valor'];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$maxRows_Listado = 100;
$pageNum_Listado = 0;
if (isset($_GET['pageNum_Listado'])) {
  $pageNum_Listado = $_GET['pageNum_Listado'];
}
$startRow_Listado = $pageNum_Listado* $maxRows_Listado;
//obtenemos la informacion del espectaculo solicitado

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado = "SELECT * FROM infEspectaculos WHERE idInformacion=$id	";
$query_limit_Listado = sprintf("%s LIMIT %d, %d", $query_Listado, $startRow_Listado, $maxRows_Listado);
$Listado = mysql_query($query_limit_Listado, $informeUrb) or die(mysql_error());
$row_Listado = mysql_fetch_assoc($Listado);



?>