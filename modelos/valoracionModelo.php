<?php require_once('./Connections/informeUrb.php'); ?>
<?php session_start();

$dni=$_GET['cod'];
$dniv=$_SESSION['dni'];
$cod2=$_GET['cod2'];
$colname_MODIFICAR = "-1";
if (isset($_GET['ID'])) {
  $colname_MODIFICAR = (get_magic_quotes_gpc()) ? $_GET['ID'] : addslashes($_GET['ID']);
}

mysql_select_db($database_informeUrb, $informeUrb);
$query_MODIFICAR = sprintf("SELECT * FROM usuarios WHERE Dni='$dni'", $colname_MODIFICAR);
$MODIFICAR = mysql_query($query_MODIFICAR, $informeUrb) or die(mysql_error());
$row_MODIFICAR = mysql_fetch_assoc($MODIFICAR);

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
    
     $insertSQL= sprintf("INSERT INTO critica(Comentario,Valoracion,dniValorador,dniValorado) VALUES ('%s','%s','$dniv','$dni')",
                       $_POST['comentario'],
                       $_POST['valoracion']);                
    
    mysql_select_db($database_informeUrb, $informeUrb);
 	$Result = mysql_query($insertSQL, $informeUrb) or die(mysql_error());

  	$puntuacion=$row_MODIFICAR['puntuacion']+$_POST['valoracion'];
 	 	
 	$updateSQL = sprintf("UPDATE usuarios   SET puntuacion='$puntuacion' where Dni='$dni'");
	mysql_select_db($database_informeUrb, $informeUrb);                                          
	$Result1 = mysql_query($updateSQL, $informeUrb) or die(mysql_error());
	
	mysql_select_db($database_informeUrb, $informeUrb);
	$query_MODIFICAR1 = sprintf("SELECT * FROM entradas WHERE codEntrada='$cod2'", $colname_MODIFICAR);
	$MODIFICAR1 = mysql_query($query_MODIFICAR1, $informeUrb) or die(mysql_error());
	$row_MODIFICAR1 = mysql_fetch_assoc($MODIFICAR1);	
	
	if($row_MODIFICAR1['dniUsuario']!=$dniv){
		$updateSQL1 = sprintf("UPDATE aceptada SET Valorado='Si' where codEntradas='$cod2'");
		mysql_select_db($database_informeUrb, $informeUrb);                                          
		$Result2 = mysql_query($updateSQL1, $informeUrb) or die(mysql_error());
	}else{
		$updateSQL1 = sprintf("UPDATE aceptada SET Valorado2='Si' where codEntradas='$cod2'");
		mysql_select_db($database_informeUrb, $informeUrb);                                          
		$Result2 = mysql_query($updateSQL1, $informeUrb) or die(mysql_error());
	}
?>
 	 <script type="text/javascript"> 	 
  		window.location="index.php?controlador=usuarios"; 
	</script> 
 <?php }?>