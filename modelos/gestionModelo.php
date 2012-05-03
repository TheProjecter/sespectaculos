<?php require_once('./Connections/informeUrb.php'); ?>
<?php session_start();

$cod=$_GET['entradas'];

mysql_select_db($database_informeUrb, $informeUrb);
$login = ("select * from entradas,usuarios where codEntrada='$cod' and Dni=dniUsuario");
$resultado = mysql_query($login, $informeUrb) or die(mysql_error());
$row_Listado = mysql_fetch_assoc($resultado);

$oferta= $row_Listado['Evento'];
$email=$row_Listado['Email'];

$insertSQL= sprintf("INSERT INTO ofertas(dniUsuario,codEntrada,Hora,estado) VALUES ('%s','%s','%s','Pendiente')",
              $_SESSION['dni'],
              $cod,
              date("Y:m:d:H:i:s"));                
    
mysql_select_db($database_informeUrb, $informeUrb);
$Result= mysql_query($insertSQL, $informeUrb) or die(mysql_error());

mysql_select_db($database_informeUrb, $informeUrb);
$login3 = ("SELECT * FROM ofertas, usuarios where codEntrada='$cod' and Dni=dniUsuario");
$resultado3 = mysql_query($login3, $informeUrb) or die(mysql_error());
$row_Listado3 = mysql_fetch_assoc($resultado3);

$nombre=$row_Listado3['Nombre'];
$apellidos=$row_Listado3['Apellidos'];
$dniof=$row_Listado3['Dni'];
$emailof=$row_Listado3['Email'];


if(mail("$email", "Tienes una nueva Oferta", "El siguiente usuario ".$nombre." ha realizado una oferta por tu siguiente entrada ".$oferta.",
 Los datos de contactos son los siguientes: 
       Nombre: ".$nombre."
       Apellidos: ".$apellidos."
       Dni: ".$dniof." 
       Correo Electronico: ".$emailof, "From: SREVENTA <ermelli20@gmail.com>\r\n")){

?>

     <script>parent.location.href="index.php?controlador=usuarios";</script><?php 
}else{
	?><script>parent.location.href="index.php?controlador=opcionesUsuario&opcion=error";</script><?php 
}
?>