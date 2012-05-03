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


// inserccion de la entrada en nuestra base de datos
mysql_select_db($database_informeUrb, $informeUrb);
$login = ("select * from usuarios where Usuario='$lognick'");
$resultado = mysql_query($login, $informeUrb) or die(mysql_error());
$row_Listado = mysql_fetch_assoc($resultado);
//echo "id".$row_Listado['idUsuario'];
$vari=substr($_POST['evento'],0,3).base64_encode(time());

 if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
    
     $insertSQL= sprintf("INSERT INTO entradas(tipoEspectaculo,Genero,Evento,dniUsuario,Provincia,Lugar,Fecha,Precio,Fila,Asiento,Descripcion,codEntrada,Estado) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','$vari','Sin Vender')",
                       $_POST['tipos'],
                       $_POST['genero'],
     				   $_POST['evento'],
                       $row_Listado['Dni'],
                       $_POST['provincia'],
                       $_POST['lugar'],
                       $_POST['fecha'],
                       $_POST['precio'],
                       $_POST['fila'],
                       $_POST['asiento'],
                       $_POST['descripcion']);                
    
     mysql_select_db($database_informeUrb, $informeUrb);
 	$Result1 = mysql_query($insertSQL, $informeUrb) or die(mysql_error());

//reenvio de correo a las personas que coincida con el tipo de espectaculo para posible coincidencia en gusto

$tipos=$_POST['tipos'];
$Evento=$_POST['evento'];
$Provincia=$_POST['provincia'];
$Lugar=$_POST['lugar'];
$Genero=$_POST['genero'];
$fecha=$_POST['fecha'];
 	
$maxRows_Listado5 = 80;
$pageNum_Listado5 = 0;
if (isset($_GET['pageNum_Listado'])) {
  $pageNum_Listado5 = $_GET['pageNum_Listado'];
}
$startRow_Listado5 = $pageNum_Listado5 * $maxRows_Listado5;


mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado5 = "SELECT * FROM consultas,usuarios where usuarios.Dni=consultas.dniUsuario and consultas.dniUsuario!='$dni'";
$query_limit_Listado5 = sprintf("%s LIMIT %d, %d", $query_Listado5, $startRow_Listado5, $maxRows_Listado5);
$Listado5 = mysql_query($query_limit_Listado5, $informeUrb) or die(mysql_error());
$row_Listado5= mysql_fetch_assoc($Listado5);

do{ 
	if ($row_Listado5['idConsulta'] != null || $row_Listado5['idConsulta'] != ""){
		$url=" ";
  	    if($row_Listado5['Fecha1']!="0000-00-00"){$url="Fecha1='".$row_Listado5['Fecha1']."'";}
		if($row_Listado5['Fecha2']!="0000-00-00"){$url=$url." && Fecha2='".$row_Listado5['Fecha2']."'";}     
  		if(isset($row_Listado5['Evento']) && $row_Listado5['Evento']!=" ")      { $url=$url." && Evento='".$row_Listado5['Evento']."'"; }
		if(isset($row_Listado5['Provincia']) && $row_Listado5['Provincia']!="")   {$url=$url." && Provincia='".$row_Listado5['Provincia']."'";}
		if(isset($row_Listado5['Lugar']) && $row_Listado5['Lugar']!="")       {$url=$url." && Lugar='".$row_Listado5['Lugar']."'";}
		if($row_Listado5['Espectaculo']!=" ")    {$url=$url." && Espectaculo='".$row_Listado5['Espectaculo']."'";}
		if($row_Listado5['Genero']!=" ")         {$url=$url." && Genero='".$row_Listado5['Genero']."'";}
		
		echo $url;
		mysql_select_db($database_informeUrb,$informeUrb);
		$query_Listado = "SELECT * FROM consultas where ".$url." ";
		$query_limit_Listado = sprintf("%s LIMIT %d, %d", $query_Listado, $startRow_Listado, $maxRows_Listado);
		$Listado = mysql_query($query_limit_Listado, $informeUrb) or die(mysql_error());
		$row_Listado= mysql_fetch_assoc($Listado);	  	

	if(!empty($row_Listado)){
		$para=$row_Listado5["Email"];
		//echo "email".$para;
		$titulo="Nueva entrada que coincide con tus preferencias";
		$mensaje="Se ha insertado una nueva entrada que coincide con las preferencias que usted tiene definida en su perfil.";
		mail($para, $titulo, $mensaje);
	}}}while ($row_Listado = mysql_fetch_assoc($Listado));
	  	
     
   ?>
 	 <script type="text/javascript"> 
	 
  		window.location="index.php?controlador=usuarios"; 

	</script> 
 	<?php
    }

?>