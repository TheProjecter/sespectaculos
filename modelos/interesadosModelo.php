<?session_start();?> 
<?php require_once('./Connections/informeUrb.php'); 
$idUsuario=$_GET['cod'];

$currentPage2 = $_SERVER["PHP_SELF"];
$maxRows_Listado = 15;
$pageNum_Listado = 0;
if (isset($_GET['pageNum_Listado'])) {
  $pageNum_Listado = $_GET['pageNum_Listado'];
}
$startRow_Listado = $pageNum_Listado * $maxRows_Listado;

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado2 = "SELECT * FROM aceptada where codEntradas='$idUsuario'";
$Listado2 = mysql_query($query_Listado2, $informeUrb) or die(mysql_error());
$row_Listado2 = mysql_fetch_assoc($Listado2);

if(isset($row_Listado2['codEntradas'])){?>
	<script>parent.location.href="index.php?controlador=opcionesUsuario&opcion=ventana";</script><?php 
}

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado1 = "SELECT * FROM ofertas,usuarios where codEntrada='$idUsuario' AND dniUsuario=Dni ";
$query_limit_Listado1 = sprintf("%s LIMIT %d, %d", $query_Listado1, $startRow_Listado, $maxRows_Listado);
$Listado1 = mysql_query($query_limit_Listado1, $informeUrb) or die(mysql_error());
$row_Listado1 = mysql_fetch_assoc($Listado1);

//Para avanzar y retroceder, flechas

	if (isset($_GET['totalRows_Listado'])) {
	  $totalRows_Listado = $_GET['totalRows_Listado'];
	} else {
	  $all_Listado = mysql_query($query_Listado1);
	  $totalRows_Listado = mysql_num_rows($all_Listado);
	}
	$totalPages_Listado = ceil($totalRows_Listado/$maxRows_Listado)-1;
	
	$queryString_Listado = "";
	if (!empty($_SERVER['QUERY_STRING'])) {
	  $params = explode("&", $_SERVER['QUERY_STRING']);
	  $newParams = array();
	  foreach ($params as $param) {
	    if (stristr($param, "pageNum_Listado") == false && 
	        stristr($param, "totalRows_Listado") == false) {
	      array_push($newParams, $param);
	    }
	  }
	  if (count($newParams) != 0) {
	    $queryString_Listado = "&" . htmlentities(implode("&", $newParams));
	  }
	}
$queryString_Listado = sprintf("&totalRows_Listado=%d%s", $totalRows_Listado, $queryString_Listado);

?>