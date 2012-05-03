<?php require_once('./Connections/informeUrb.php'); ?>
<?session_start();?>
<?php 	

$cod=$_GET['entradas'];
mysql_select_db($database_informeUrb, $informeUrb);
$login = ("select * from entradas where codEntrada='$cod'");
$resultado = mysql_query($login, $informeUrb) or die(mysql_error());
$row_Listado = mysql_fetch_assoc($resultado);

$insertSQL= sprintf("INSERT INTO ofertas(dniUsuario,codEntrada,Hora,idEntrada) VALUES ('%s','%s','%s','%s')",
              $_SESSION['dni'],
              $cod,
              date("Y:m:d:H:i:s"),
              $row_Listado['idEntrada']);                
    
mysql_select_db($database_informeUrb, $informeUrb);
$Result= mysql_query($insertSQL, $informeUrb) or die(mysql_error());
?>
<script type="text/javascript"> 
	 
	window.location="index.php?controlador=opcionesUsuario&opcion=gestion&entradas=<?php echo $row_Listado['codEntrada']?>"; 

</script>