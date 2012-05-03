<?php require_once('./Connections/informeUrb.php'); ?>
<?php session_start();

$lognick=$_SESSION['usuario'];
$dni=$_SESSION['dni'];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
//obtengo todo los generos
$maxRows_Listado1 = 100;
$pageNum_Listado1 = 0;
if (isset($_GET['pageNum_Listado'])) {
  $pageNum_Listado1 = $_GET['pageNum_Listado'];
}
$startRow_Listado1 = $pageNum_Listado1* $maxRows_Listado1;

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado2 = "SELECT * FROM generos";
$query_limit_Listado2 = sprintf("%s LIMIT %d, %d", $query_Listado2, $startRow_Listado1, $maxRows_Listado1);
$Listado2 = mysql_query($query_limit_Listado2, $informeUrb) or die(mysql_error());

//obtengo todo los tipo de espectaculo
$maxRows_Listado4 = 100;
$pageNum_Listado4 = 0;
if (isset($_GET['pageNum_Listado'])) {
  $pageNum_Listado4 = $_GET['pageNum_Listado'];
}
$startRow_Listado4 = $pageNum_Listado4* $maxRows_Listado4;

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado4 = "SELECT * FROM tipo";
$query_limit_Listado4 = sprintf("%s LIMIT %d, %d", $query_Listado4, $startRow_Listado4, $maxRows_Listado4);
$Listado4 = mysql_query($query_limit_Listado4, $informeUrb) or die(mysql_error());


//obtengo todas las provincias 
$maxRows_Listado = 80;
$pageNum_Listado = 0;
if (isset($_GET['pageNum_Listado'])) {
  $pageNum_Listado = $_GET['pageNum_Listado'];
}
$startRow_Listado = $pageNum_Listado * $maxRows_Listado;

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado1 = "SELECT * FROM provincias";
$query_limit_Listado1 = sprintf("%s LIMIT %d, %d", $query_Listado1, $startRow_Listado, $maxRows_Listado);
$Listado1 = mysql_query($query_limit_Listado1, $informeUrb) or die(mysql_error());