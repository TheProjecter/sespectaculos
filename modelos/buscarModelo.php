<?php require_once('./Connections/informeUrb.php'); ?>
<?session_start();
$lognick=$_SESSION['usuario'];
$idUsuario= $_SESSION['dni'];

$url=" ";
if(!empty($_GET[Fecha1]) && !empty($_GET[Fecha2])){
$fecha1=$_GET[Fecha1];
$fecha2=$_GET[Fecha2];
$url="Fecha between '".$fecha1."' AND '". $fecha2."' ";
}

if(!empty($_GET[Evento]) && $_GET[Evento]!='Evento no definido'){
	if($url==" "){
		$url="Evento= '".$_GET[Evento]."'";
	}else{	
		$url=$url." && Evento= '".$_GET[Evento]."'";
	}
}

if(!empty($_GET[Provincia])){
	if($url==" "){
		$url="Provincia= '".$_GET[Provincia]."'";
	}else{
		$url=$url." && Provincia= '".$_GET[Provincia]."'";
	}	
}

if(!empty($_GET[Lugar])){
	if($url==" "){
		$url="Lugar= '".$_GET[Lugar]."'";
	}else{	
		$url=$url." && Lugar= '".$_GET[Lugar]."'";
	}
}

if(!empty($_GET[Espectaculo])){
	if($url==" "){
		$url="tipoEspectaculo= '".$_GET[Espectaculo]."'";
	}else{
		$url=$url." && tipoEspectaculo= '".$_GET[Espectaculo]."'";
	}
}

if(!empty($_GET[Genero])){
	if($url==" "){
		$url="Genero= '".$_GET[Genero]."'";
	}else{
		$url=$url." && Genero= '".$_GET[Genero]."'";
	}
}

//echo $url;
$currentPage = $_SERVER["PHP_SELF"];
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


$maxRows_Listado = 15;
$pageNum_Listado = 0;
if (isset($_GET['pageNum_Listado'])) {
  $pageNum_Listado = $_GET['pageNum_Listado'];
}
$startRow_Listado = $pageNum_Listado * $maxRows_Listado;

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado = "SELECT * FROM entradas where ".$url." and dniUsuario!='$idUsuario' ";
$query_limit_Listado = sprintf("%s LIMIT %d, %d", $query_Listado, $startRow_Listado, $maxRows_Listado);
$Listado= mysql_query($query_limit_Listado, $informeUrb) or die(mysql_error());
$row_Listado = mysql_fetch_assoc($Listado);

//Para avanzar y retroceder, flechas
if (!empty($query_Listado)) { 
    if (isset($_GET['totalRows_Listado'])) {
	  $totalRows_Listado = $_GET['totalRows_Listado'];
	} else {
	  $all_Listado = mysql_query($query_Listado);
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
?> 