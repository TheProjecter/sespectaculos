<?php require_once('./Connections/informeUrb.php'); ?>
<?php session_start();

$usuario = $_SESSION['usuario'];
$idUsuario=$_SESSION['dni'];


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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

// termino de obtener todo, comienzo a hacer las modificaciones pedidas.

$identificador = $_GET['cod'];

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
$updateSQL = sprintf("UPDATE entradas  SET tipoEspectaculo='%s', Evento='%s',Provincia='%s',Lugar='%s',Fecha='%s',Precio='%s',Fila='%s',Asiento='%s',Descripcion='%s',Genero='%s'",
                       $_POST['tipos'], 
                       $_POST['Evento'],
                       $_POST['Provincia'], 
                       $_POST['Lugar'],
					   $_POST['Fecha'], 
                       $_POST['Precio'], 
                       $_POST['Fila'],
					   $_POST['Asiento'], 
					   $_POST['Descripcion'], 
                       $_POST['Genero']);

mysql_select_db($database_informeUrb, $informeUrb);                                          
$Result1 = mysql_query($updateSQL, $informeUrb) or die(mysql_error());
	
?>
 <script>
  	window.location.href="index.php?controlador=opcionesUsuario&opcion=entradas";
  </script>
 <?php
}

$colname_MODIFICAR = "-1";
if (isset($_GET['ID'])) {
  $colname_MODIFICAR = (get_magic_quotes_gpc()) ? $_GET['ID'] : addslashes($_GET['ID']);
}

mysql_select_db($database_informeUrb, $informeUrb);
$query_MODIFICAR = sprintf("SELECT * FROM entradas WHERE codEntrada='$identificador'", $colname_MODIFICAR);
$MODIFICAR = mysql_query($query_MODIFICAR, $informeUrb) or die(mysql_error());
$row_MODIFICAR = mysql_fetch_assoc($MODIFICAR);

?>