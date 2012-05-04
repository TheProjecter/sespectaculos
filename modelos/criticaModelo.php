<?php require_once('./Connections/informeUrb.php'); ?>
<?session_start();
$lognick=$_SESSION['usuario'];
$idUsuario= $_SESSION['dni'];

$maxRows_Listado = 15;
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

//Para avanzar y retroceder, flechas
if (!empty($query_Listado1)) { 
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
}