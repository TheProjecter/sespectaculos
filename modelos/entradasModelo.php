<?session_start();?> 
<?php require_once('./Connections/informeUrb.php'); ?>
<?
$lognick=$_SESSION['usuario'];
$idUsuario=$_SESSION['dni'];

$currentPage = $_SERVER["PHP_SELF"];
$maxRows_Listado = 5;
$pageNum_Listado = 0;
if (isset($_GET['pageNum_Listado'])) {
  $pageNum_Listado = $_GET['pageNum_Listado'];
}
$startRow_Listado = $pageNum_Listado * $maxRows_Listado;

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado = "SELECT * FROM entradas where dniUsuario='$idUsuario'";
$query_limit_Listado = sprintf("%s LIMIT %d, %d", $query_Listado, $startRow_Listado, $maxRows_Listado);
$Listado = mysql_query($query_limit_Listado, $informeUrb) or die(mysql_error());
$row_Listado = mysql_fetch_assoc($Listado);

//Para avanzar y retroceder, flechas

	if (isset($_GET['totalRows_Listado2'])) {
	  $totalRows_Listado2 = $_GET['totalRows_Listado2'];
	} else {
	  $all_Listado = mysql_query($query_Listado);
	  $totalRows_Listado2 = mysql_num_rows($all_Listado);
	}
	$totalPages_Listado = ceil($totalRows_Listado2/$maxRows_Listado)-1;
	
	$queryString_Listado = "";
	if (!empty($_SERVER['QUERY_STRING'])) {
	  $params = explode("&", $_SERVER['QUERY_STRING']);
	  $newParams = array();
	  foreach ($params as $param) {
	    if (stristr($param, "pageNum_Listado") == false && 
	        stristr($param, "totalRows_Listado2") == false) {
	      array_push($newParams, $param);
	    }
	  }
	  if (count($newParams) != 0) {
	    $queryString_Listado = "&" . htmlentities(implode("&", $newParams));
	  }
	}
$queryString_Listado = sprintf("&totalRows_Listado2=%d%s", $totalRows_Listado2, $queryString_Listado);
?>