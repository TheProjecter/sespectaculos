<?php require_once('./Connections/informeUrb.php'); ?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

//obtengo todas las provincias 
$maxRows_Listado = 80;
$pageNum_Listado = 0;
if (isset($_GET['pageNum_Listado'])) {
  $pageNum_Listado = $_GET['pageNum_Listado'];
}
$startRow_Listado = $pageNum_Listado * $maxRows_Listado;

mysql_select_db($database_informeUrb,$informeUrb);
$query_Listado = "SELECT * FROM provincias";
$query_limit_Listado = sprintf("%s LIMIT %d, %d", $query_Listado, $startRow_Listado, $maxRows_Listado);
$Listado= mysql_query($query_limit_Listado, $informeUrb) or die(mysql_error());

 if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
                      
      $dni=$_POST['dni'];
      $usuario=$_POST['usuario'];
      $nombre=$_POST['nombre'];      
      $email=$_POST['email'];     
      $fecha=date("Y/m/d h:m:s"); 
      //echo "tiempo:".$fecha;
       
     $insertSQL= sprintf("INSERT INTO usuarios(Nombre,Apellidos,Edad,Telefono,Provincia,Localidad,Direccion,Email,Usuario,pass,Cp,Dni,Valor_Admin,fecha_Alta,Activado) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','0','%s',0)",
                       $_POST['nombre'],
                       $_POST['apellidos'],
                       $_POST['edad'],
                       $_POST['telefono'],
                       $_POST['provincia'],
                       $_POST['localidad'],
                       $_POST['direccion'],
                       $_POST['email'],
                       $_POST['usuario'],
                       $_POST['contrasenha'],
                       $_POST['cp'],                              
                       $_POST['dni'],
                       $fecha);                
    
     mysql_select_db($database_informeUrb, $informeUrb);
 	$Result1 = mysql_query($insertSQL, $informeUrb) or die(mysql_error());
 	//$Result1 = mysql_query($insertSQL1, $informeUrb) or die(mysql_error());
 	
 	
 	// prueba mail
 	
$cuerpo = "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'> 
<html> 
<head></head> 
<body bgcolor='#E0E2E0'> 

</div> 
<table width='100%' border='0' cellspacing='20'> 
<tr>  
    <td width='90%'><div align='left'><font class='comentarios'>Estimado señor $nombre, Tu informacion ha ingresado a nuestra base de datos. <br>Porfavor para activar su cuenta ingrese aqui: <a href=http://localhost/sreventa/login/activacion.php?dni=".$dni."&usuario=".$usuario."&activo=1>Activar Cuenta</a></font></div></td> 
    <td width='5%'>&nbsp;</td> 
  </tr>  
</table> 
</body> 
</html>"; 

$sheader= "From: SREVENTA <ermelli20@gmail.com>\r\n"; 
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n"; 
$sheader=$sheader."Mime-Version: 1.0\n"; 
$sheader=$sheader."Content-Type: text/html"; 

$asunto="Activacion de Usuario"; //subject  

mail($email,$asunto,$cuerpo,$sheader);

// fin de pruebas
     
   ?>
 	 <script type="text/javascript"> 
	 
  		window.location="index.php"; 

	</script> 
 	<?php
    }

?>