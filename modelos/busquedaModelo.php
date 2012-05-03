<?php require_once('./Connections/informeUrb.php'); ?>
<?session_start();
$lognick=$_SESSION['usuario'];
$idUsuario= $_SESSION['dni'];

$currentPage = $_SERVER["PHP_SELF"];
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

//nos genera todas la provincias de españa
$maxRows_Listado = 80;
$pageNum_Listado = 0;
if (isset($_GET['pageNum_Listado'])) {
  $pageNum_Listado = $_GET['pageNum_Listado'];
}
$startRow_Listado = $pageNum_Listado * $maxRows_Listado;

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado1 = "SELECT * FROM provincias Order by Provincia";
$query_limit_Listado1 = sprintf("%s LIMIT %d, %d", $query_Listado1, $startRow_Listado, $maxRows_Listado);
$Listado1 = mysql_query($query_limit_Listado1, $informeUrb) or die(mysql_error());


$maxRows_Listado1 = 100;
$pageNum_Listado1 = 0;
if (isset($_GET['pageNum_Listado'])) {
  $pageNum_Listado1 = $_GET['pageNum_Listado'];
}
$startRow_Listado1 = $pageNum_Listado1* $maxRows_Listado1;

// nos genera todo los tipos de Espectaculos que hay 

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado2 = "SELECT * FROM tipo Order by NombreEspectaculo";
$query_limit_Listado2 = sprintf("%s LIMIT %d, %d", $query_Listado2, $startRow_Listado1, $maxRows_Listado1);
$Listado2 = mysql_query($query_limit_Listado2, $informeUrb) or die(mysql_error());


//Busqueda de entradas que cumplan las opciones de busqueda marcada por el usuario
$maxRows_Listado3 = 80;
$pageNum_Listado3 = 0;
if (isset($_GET['pageNum_Listado3'])) {
  $pageNum_Listado3 = $_GET['pageNum_Listado3'];
}
$startRow_Listado3 = $pageNum_Listado3 * $maxRows_Listado3;

$tema=$_GET['tema'];

$provincia=$_POST['provincia'];
$genero=$_POST['genero'];
$tipo=$_POST['tipos'];
$evento=$_POST['evento'];
$lugar=$_POST['lugar'];
$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];
$query_Listado3="";

//busca por tipo,Fecha y provincia 
if(empty($_POST['evento']) && !empty( $_POST['fecha1'])&& !empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']!=" " && !empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Fecha between '$fecha1' AND '$fecha2' AND entradas.tipoEspectaculo like '$tipo' AND entradas.Provincia like '$provincia' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por todo los campos menos genero 
if(!empty($_POST['evento']) && !empty( $_POST['fecha1'])&& !empty( $_POST['fecha2']) && !empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']!=" " && !empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Fecha between '$fecha1' AND '$fecha2' AND entradas.tipoEspectaculo like '$tipo'  AND entradas.Evento like '$evento' AND entradas.Lugar like '$lugar' AND entradas.Provincia like '$provincia' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por todo los campos menos provincia
if(!empty($_POST['evento']) && !empty( $_POST['fecha1'])&& !empty( $_POST['fecha2']) && !empty($_POST['lugar']) && $_POST['genero']!=" " && $_POST['tipos']!=" " && empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Fecha between '$fecha1' AND '$fecha2' AND entradas.tipoEspectaculo like '$tipo' AND entradas.Genero like '$genero' AND entradas.Evento like '$evento' AND entradas.Lugar like '$lugar' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por todo los campos menos tipo y genero
if(!empty($_POST['evento']) && !empty( $_POST['fecha1'])&& !empty( $_POST['fecha2']) && !empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']==" " && !empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Fecha between '$fecha1' AND '$fecha2' AND entradas.Evento like '$evento' AND entradas.Lugar like '$lugar' AND entradas.Provincia like '$provincia' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por todo los campos menos lugar
if(!empty($_POST['evento']) && !empty( $_POST['fecha1'])&& !empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']!=" " && $_POST['tipos']!=" " && !empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Fecha between '$fecha1' AND '$fecha2' AND entradas.tipoEspectaculo like '$tipo' AND entradas.Genero like '$genero' AND entradas.Evento like '$evento' AND entradas.Provincia like '$provincia' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por todo los campos menos fecha
if(!empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && !empty($_POST['lugar']) && $_POST['genero']!=" " && $_POST['tipos']!=" " && !empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where  entradas.tipoEspectaculo like '$tipo' AND entradas.Genero like '$genero' AND entradas.Evento like '$evento' AND entradas.Lugar like '$lugar' AND entradas.Provincia like '$provincia' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por todo los campos menos evento
if(empty($_POST['evento']) && !empty( $_POST['fecha1'])&& !empty( $_POST['fecha2']) && !empty($_POST['lugar']) && $_POST['genero']!=" " && $_POST['tipos']!=" " && !empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Fecha between '$fecha1' AND '$fecha2' AND entradas.tipoEspectaculo like '$tipo' AND entradas.Genero like '$genero' AND entradas.Lugar like '$lugar' AND entradas.Provincia like '$provincia' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por todo los campos
if(!empty($_POST['evento']) && !empty( $_POST['fecha1'])&& !empty( $_POST['fecha2']) && !empty($_POST['lugar']) && $_POST['genero']!=" " && $_POST['tipos']!=" " && !empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Fecha between '$fecha1' AND '$fecha2' AND entradas.tipoEspectaculo like '$tipo' AND entradas.Genero like '$genero' AND entradas.Evento like '$evento' AND entradas.Lugar like '$lugar' AND entradas.Provincia like '$provincia' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por tipo, genero ,Fecha y provincia 
if(empty($_POST['evento']) && !empty( $_POST['fecha1'])&& !empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']!=" " && $_POST['tipos']!=" " && !empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Fecha between '$fecha1' AND '$fecha2' AND entradas.tipoEspectaculo like '$tipo' AND entradas.Genero like '$genero' AND entradas.Provincia like '$provincia' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por tipo, genero ,lugar y provincia 
if(empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && !empty($_POST['lugar']) && $_POST['genero']!=" " && $_POST['tipos']!=" " && !empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Lugar like '$lugar' AND entradas.tipoEspectaculo like '$tipo' AND entradas.Genero like '$genero' AND entradas.Provincia like '$provincia' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por tipo ,lugar y provincia 
if(empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && !empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']!=" " && !empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Lugar like '$lugar' AND entradas.tipoEspectaculo like '$tipo' AND entradas.Provincia like '$provincia' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por Fecha,lugar y provincia 
if(empty($_POST['evento']) && !empty( $_POST['fecha1'])&& !empty( $_POST['fecha2']) && !empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']==" " && !empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Lugar like '$lugar' AND entradas.Fecha between '$fecha1' AND '$fecha2' AND entradas.Provincia like '$provincia' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por Fecha,evento y tipo 
if(!empty($_POST['evento']) && !empty( $_POST['fecha1'])&& !empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']!=" " && empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Evento like '$evento' AND entradas.Fecha between '$fecha1' AND '$fecha2' AND entradas.tipoEspectaculo like '$tipo' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por Provincia,evento, tipo y genero 
if(!empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']!=" " && $_POST['tipos']!=" " && !empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Evento like '$evento' AND entradas.Provincia like '$provincia' AND entradas.tipoEspectaculo like '$tipo' AND entradas.Genero like '$genero' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por Provincia,evento y Fecha 
if(!empty($_POST['evento']) && !empty( $_POST['fecha1'])&& !empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']==" " && !empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Evento like '$evento' AND entradas.Provincia like '$provincia' AND entradas.Fecha between '$fecha1' AND '$fecha2' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por Provincia,evento y tipo 
if(!empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']!=" " && !empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Evento like '$evento' AND entradas.Provincia like '$provincia' AND entradas.tipoEspectaculo like '$tipo' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por lugar,evento, tipo y genero 
if(!empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && !empty($_POST['lugar']) && $_POST['genero']!=" " && $_POST['tipos']!=" " && empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Evento like '$evento' AND entradas.Lugar like '$lugar' AND entradas.tipoEspectaculo like '$tipo' AND entradas.Genero like '$genero' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por lugar,evento y Fecha 
if(!empty($_POST['evento']) && !empty( $_POST['fecha1'])&& !empty( $_POST['fecha2']) && !empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']==" " && empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Evento like '$evento' AND entradas.Lugar like '$lugar' AND entradas.Fecha between '$fecha1' AND '$fecha2' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por lugar,evento y tipo 
if(!empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && !empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']!=" " && empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Evento like '$evento' AND entradas.Lugar like '$lugar' AND entradas.tipoEspectaculo like '$tipo' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por lugar,evento y provincia 
if(!empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && !empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']==" " && !empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Evento like '$evento' AND entradas.Lugar like '$lugar' AND entradas.Fecha between '$fecha1' AND '$fecha2' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por Tipo y Fecha 
if(empty($_POST['evento']) && !empty( $_POST['fecha1'])&& !empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']!=" " && empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.tipoEspectaculo like '$tipo' AND entradas.Fecha between '$fecha1' AND '$fecha2' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por Lugar y Fecha 
if(empty($_POST['evento']) && !empty( $_POST['fecha1'])&& !empty( $_POST['fecha2']) && !empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']==" " && empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Lugar like '$lugar' AND entradas.Fecha between '$fecha1' AND '$fecha2' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por Lugar, Genero y tipo 
if(empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && !empty($_POST['lugar']) && $_POST['genero']!=" " && $_POST['tipos']!=" " && empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Lugar like '$lugar' AND entradas.tipoEspectaculo like '$tipo' AND entradas.Genero like '$genero' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por Lugar y tipo 
if(empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && !empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']!=" " && empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Lugar like '$lugar' AND entradas.tipoEspectaculo like '$tipo' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por Tipo, genero y provincia 
if(empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']!=" " && $_POST['tipos']!=" " && !empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.tipoEspectaculo like '$tipo' AND entradas.Genero like '$genero' AND entradas.Provincia like '$provincia' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por Tipo y provincia 
if(empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']!=" " && !empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.tipoEspectaculo like '$tipo' AND entradas.Provincia like '$provincia' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por Lugar y provincia 
if(empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && !empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']==" " && !empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Lugar like '$lugar' AND entradas.Provincia like '$provincia' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por fecha y provincia 
if(empty($_POST['evento']) && !empty( $_POST['fecha1'])&& !empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']==" " && !empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Fecha between '$fecha1' AND '$fecha2' AND entradas.Provincia like '$provincia' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por nombre y provincia 
if(!empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']==" " && !empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Evento like '$evento' AND entradas.Provincia like '$provincia' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por nombre, tipo y genero 
if(!empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']!=" " && $_POST['tipos']!=" " && empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.tipoEspectaculo like '$tipo' AND entradas.Evento like '$evento' AND entradas.Genero like '$genero' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por nombre y tipo 
if(!empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']!=" " && empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.tipoEspectaculo like '$tipo' AND entradas.Evento like '$evento' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por nombre y fecha 
if(!empty($_POST['evento']) && !empty( $_POST['fecha1'])&& !empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']==" " && empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Evento like '$evento' AND entradas.Fecha between '$fecha1' AND '$fecha2' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por nombre y lugar 
if(!empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && !empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']==" " && empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Evento like '$evento' AND entradas.Lugar like '$lugar' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por tipo y genero 
//if(empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']!=" " && $_POST['tipos']!=" " && empty($_POST['provincia'])){
//
//mysql_select_db($database_informeUrb,$informeUrb);
//$query_Listado3 = "SELECT * FROM entradas where tipoEspectaculo  like '$tipo' AND Genero like '$genero'";
//$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
//$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
//$row_Listado3 = mysql_fetch_assoc($Listado3);
//}

//busca por tipo 
if(empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']!=" " && empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.tipoEspectaculo like '$tipo' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por fecha
if(empty($_POST['evento']) && !(empty( $_POST['fecha1']))&& !(empty( $_POST['fecha2'])) && empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']==" " && empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Fecha between '$fecha1' AND '$fecha2' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por lugar
if(empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && !(empty($_POST['lugar'])) && $_POST['genero']==" " && $_POST['tipos']==" " && empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Lugar like '$lugar' and entradas.dniUsuario!='$idUsuario'and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por provincia 
if(empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']==" " && !(empty($_POST['provincia']))){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Provincia like '$provincia' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s	LIMIT %d , %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//busca por el nombre del evento
if(!empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']==" " && empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.Evento='$evento' and entradas.dniUsuario!='$idUsuario' and Estado!='Vendida'";
$query_limit_Listado3 = sprintf("%s	 LIMIT %d, %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

// busca todas las entradas
if(empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']==" " && empty($_POST['provincia'])){

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado3 = "SELECT * FROM entradas where entradas.dniUsuario!='$idUsuario' and Estado!='Vendida' ";
$query_limit_Listado3 = sprintf("%s LIMIT %d , %d", $query_Listado3, $startRow_Listado3, $maxRows_Listado3);
$Listado3 = mysql_query($query_limit_Listado3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($Listado3);
}

//guardar las consultas en la bd para alertas
 if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
 	if(empty($evento)){
 		$evento= "Evento no definido";
 	}
 	if(empty($_POST['evento']) && empty( $_POST['fecha1'])&& empty( $_POST['fecha2']) && empty($_POST['lugar']) && $_POST['genero']==" " && $_POST['tipos']==" " && empty($_POST['provincia'])){
 		
 	}else{
	$insertSQL="INSERT INTO consultas(Evento,Lugar,Provincia,Fecha1,Fecha2,Espectaculo,Genero,dniUsuario) VALUES ('$evento','$lugar','$provincia','$fecha1','$fecha2','$tipo','$genero','$idUsuario')";  
	$Result1 = mysql_query($insertSQL, $informeUrb) or die(mysql_error());
 }
 }
//Para avanzar y retroceder, flechas
if (!empty($query_Listado3)) { 
    if (isset($_GET['totalRows_Listado2'])) {
	  $totalRows_Listado2 = $_GET['totalRows_Listado2'];
	} else {
	  $all_Listado = mysql_query($query_Listado3);
	  $totalRows_Listado2 = mysql_num_rows($all_Listado);
	}
	$totalPages_Listado2 = ceil($totalRows_Listado2/$maxRows_Listado3)-1;
	
	$queryString_Listado = "";
	if (!empty($_SERVER['QUERY_STRING'])) {
	  $params = explode("&", $_SERVER['QUERY_STRING']);
	  $newParams = array();
	  foreach ($params as $param) {
	    if (stristr($param, "pageNum_Listado2") == false && 
	        stristr($param, "totalRows_Listado2") == false) {
	      array_push($newParams, $param);
	    }
	  }
	  if (count($newParams) != 0) {
	    $queryString_Listado = "&" . htmlentities(implode("&", $newParams));
	  }
	}
$queryString_Listado = sprintf("&totalRows_Listado2=%d%s", $totalRows_Listado2, $queryString_Listado);
}
?> 