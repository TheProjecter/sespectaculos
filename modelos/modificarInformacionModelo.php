<?php require_once('./Connections/informeUrb.php'); ?>
<?php session_start();

$usuario = $_SESSION['usuario'];
$cod = $_GET['cod'];

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

$identificador = $_GET['cod'];

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
$updateSQL = sprintf("UPDATE infEspectaculos  SET NombreEspectaculo='%s',Provincia='%s',Lugar='%s',Fecha='%s',Precio='%s',Genero='%s',Tipo='%s' where idInformacion='$identificador'",
                      $_POST['nombre'],
                      $_POST['provincia'],
                      $_POST['lugar'],
                      $_POST['fecha'],
                      $_POST['precio'],
					  $_POST['genero'],
                      $_POST['tipos']);

mysql_select_db($database_informeUrb, $informeUrb);                                          
$Result1 = mysql_query($updateSQL, $informeUrb) or die(mysql_error());

mysql_select_db($database_informeUrb, $informeUrb);
$query_MODIFICAR1 = sprintf("SELECT * FROM infEspectaculos WHERE idInformacion='$identificador'", $colname_MODIFICAR);
$MODIFICAR1 = mysql_query($query_MODIFICAR1, $informeUrb) or die(mysql_error());
$row_MODIFICAR1 = mysql_fetch_assoc($MODIFICAR1);
$totalRows_MODIFICAR1 = mysql_num_rows($MODIFICAR1);

$nombre=$row_MODIFICAR1['Ruta'];

	$arr1 = str_split ( $nombre);

	$num1=0;
	for( $i = 0; $i < count($arr1); $i++){
		if($arr1[$i] =='/'){
			$num1=$i+1;
		
		}
	}
	$destino="./Espectaculos/";
	  
    $num1 = 0; //numero autoincrementable que se unira al nombre del archivo en caso de estar repetido
    
 	if(!empty($HTTP_POST_FILES['ufile']['name'][0])) { 
 		//echo $row_MODIFICAR1['Ruta'];
 	 unlink($row_MODIFICAR1['Ruta']);
 	
	$name =basename($HTTP_POST_FILES['ufile']['name'][0]); //obtenemos nombre base del archivo
    $extension = end(explode('.',$name =basename($HTTP_POST_FILES['ufile']['name'][0])));//aqui se obtiene la extension
    $onlyName = substr($name =basename($HTTP_POST_FILES['ufile']['name'][0]),0,strlen(basename($HTTP_POST_FILES['ufile']['name'][0]))-(strlen($extension)+1));//aqui se elimina la extension del archivo
    while(file_exists($destino.$name)){//preguntamos si existe el fichero
        $num1++;            //incrementamos la variable
        $name = $onlyName."".$num1.".".$extension; //unimos el nombre la variable y la extension
    } 
	$path1= $destino.$name;
	
    copy($HTTP_POST_FILES['ufile']['tmp_name'][0], $path1);    
    $updateSQL4 = sprintf("UPDATE infEspectaculos SET Ruta='$path1' WHERE idInformacion='$identificador'");
    mysql_select_db($database_informeUrb, $informeUrb);                                          
	$Result1 = mysql_query($updateSQL4, $informeUrb) or die(mysql_error());
    //echo "4". $updateSQL4;
	}	
?>
 <script>
  	window.location.href="index.php?controlador=opcionesAdministrador&opcion=lanuncios";
  </script>
 <?php
}

$colname_MODIFICAR = "-1";
if (isset($_GET['ID'])) {
  $colname_MODIFICAR = (get_magic_quotes_gpc()) ? $_GET['ID'] : addslashes($_GET['ID']);
}

mysql_select_db($database_informeUrb, $informeUrb);
$query_MODIFICAR = sprintf("SELECT * FROM infEspectaculos WHERE idInformacion='$cod'", $colname_MODIFICAR);
$MODIFICAR = mysql_query($query_MODIFICAR, $informeUrb) or die(mysql_error());
$row_MODIFICAR = mysql_fetch_assoc($MODIFICAR);
?>