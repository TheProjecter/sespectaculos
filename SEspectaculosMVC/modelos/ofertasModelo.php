<?php require_once('./Connections/informeUrb.php'); ?>
<?php session_start();

$idUsuario=$_SESSION['dni'];

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Listado = 15;
$pageNum_Listado = 0;
if (isset($_GET['pageNum_Listado'])) {
  $pageNum_Listado = $_GET['pageNum_Listado'];
}
$startRow_Listado = $pageNum_Listado * $maxRows_Listado;

$maxRows_Listado1 = 15;
$pageNum_Listado1 = 0;
if (isset($_GET['pageNum_Listado1'])) {
  $pageNum_Listado1 = $_GET['pageNum_Listado1'];
}
$startRow_Listado1 = $pageNum_Listado1 * $maxRows_Listado1;

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado = "Select * from entradas e ,ofertas o  where o.dniUsuario='$idUsuario' && e.codEntrada=o.codEntrada";
$query_limit_Listado = sprintf("%s LIMIT %d, %d", $query_Listado, $startRow_Listado, $maxRows_Listado);
$Listado = mysql_query($query_limit_Listado, $informeUrb) or die(mysql_error());

$row_Listado = mysql_fetch_assoc($Listado);

//Para avanzar y retroceder, flechas

if (isset($_GET['totalRows_Listado'])) {
  $totalRows_Listado = $_GET['totalRows_Listado'];
} else {
  $all_Listado = mysql_query($query_Listado);
  
  $totalRows_Listado = mysql_num_rows($all_Listado);
}
$totalPages_Listado = ceil($totalRows_Listado/$maxRows_Listado);

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