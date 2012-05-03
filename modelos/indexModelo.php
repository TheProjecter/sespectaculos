<?php require 'Connections/informeUrb.php'; ?>
<?php require './vistas/votos/_drawrating.php';

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado = "SELECT * FROM  infespectaculos";
$Listado = mysql_query($query_Listado, $informeUrb) or die(mysql_error());
$row_Listado = mysql_fetch_assoc($Listado);     


$maxRows_Listado = 80;
$pageNum_Listado = 0;
if (isset($_GET['pageNum_Listado'])) {
  $pageNum_Listado = $_GET['pageNum_Listado'];
}
$startRow_Listado = $pageNum_Listado * $maxRows_Listado;

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado1 = "SELECT * FROM comentarios";
$query_limit_Listado1 = sprintf("%s LIMIT %d, %d", $query_Listado1, $startRow_Listado, $maxRows_Listado);
$Listado1 = mysql_query($query_limit_Listado1, $informeUrb) or die(mysql_error());
$row_Listado1 = mysql_fetch_assoc($Listado1);



mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado2="select *, count(O.codEntrada) from Ofertas O, Entradas E where E.codEntrada=O.codEntrada group by O.codEntrada having count(O.codEntrada) ORDER BY Count(O.codEntrada) DESC Limit 6   ";
$Listado2 = mysql_query($query_Listado2, $informeUrb) or die(mysql_error());
$row_Listado2 = mysql_fetch_assoc($Listado2); 


//$cod= $row_Listado2['codEntrada'];
//   				
//mysql_select_db($database_informeUrb,$informeUrb);
//$query_Listado3 = "SELECT * FROM  Entradas where codEntrada='$cod'";
//$Listado3 = mysql_query($query_Listado3, $informeUrb) or die(mysql_error());
//$row_Listado3 = mysql_fetch_assoc($Listado3);

?>