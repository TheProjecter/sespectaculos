<?session_start();?> 
<?php require_once('./Connections/informeUrb.php');

$entrada=$_GET['cod2'];
$dni=$_GET['cod'];
$updateSQL= sprintf("UPDATE ofertas SET estado='Aceptada' WHERE dniUsuario='$dni' && codEntrada='$entrada'");                
mysql_select_db($database_informeUrb, $informeUrb);
$Result = mysql_query($updateSQL, $informeUrb) or die(mysql_error());

$updateSQL1= sprintf("UPDATE entradas SET Estado='Vendida' WHERE codEntrada='$entrada'");                
mysql_select_db($database_informeUrb, $informeUrb);
$Result3 = mysql_query($updateSQL1, $informeUrb) or die(mysql_error());

$insertSQL2= sprintf("INSERT INTO aceptada(dniUsuarios,codEntradas) VALUES ('%s','%s')",
                       $_GET['cod'],
                       $_GET['cod2']);                
mysql_select_db($database_informeUrb, $informeUrb);
$Result2 = mysql_query($insertSQL2, $informeUrb) or die(mysql_error());

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado = "SELECT * FROM ofertas,usuarios where codEntrada='$entrada' AND dniUsuario!='$dni' and dniUsuario=Dni";
$Listado = mysql_query($query_Listado, $informeUrb) or die(mysql_error());
$row_Listado= mysql_fetch_assoc($Listado);

if(isset($row_Listado['codEntrada'])){
do{
	$dniU=$row_Listado['Dni'];
	$updateSQL3= sprintf("UPDATE ofertas SET estado='Rechazada' WHERE dniUsuario='$dniU' && codEntrada='$entrada'");                
	mysql_select_db($database_informeUrb, $informeUrb);
	$Result = mysql_query($insertSQL3, $informeUrb) or die(mysql_error());	
} while ($row_Listado = mysql_fetch_assoc($Listado));
}
?>
 	 <script type="text/javascript"> 
	 
  		window.location="index.php?controlador=usuarios"; 

	</script> 
 