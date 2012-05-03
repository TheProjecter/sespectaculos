<?php require_once('./Connections/informeUrb.php'); ?>
<?php session_start();

$usuario = $_SESSION['usuario'];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$dni = $_GET['dni'];
$dniCam=$_POST['dni'];
unset($_SESSION['dni']);
$_SESSION['dniNuevo']=$dniCam;

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
$updateSQL = sprintf("UPDATE usuarios  SET Nombre='%s', Apellidos='%s', Dni='%s', Edad='%s',Telefono='%s', Provincia='%s', Localidad='%s', Direccion='%s', Email='%s', Cp='%s' WHERE Dni='$dni'",
                       $_POST['nombre'], 
                       $_POST['apellido'],
                       $_POST['dni'], 
                       $_POST['edad'], 
                       $_POST['telefono'],
					   $_POST['provincia'], 
                       $_POST['localidad'], 
                       $_POST['direccion'],
					   $_POST['email'], 
                       $_POST['cp']);

mysql_select_db($database_informeUrb, $informeUrb);                                          
$Result1 = mysql_query($updateSQL, $informeUrb) or die(mysql_error());

?>
 <script>
  	window.location.href="index.php?controlador=usuarios";
  </script>
 <?php
}

$colname_MODIFICAR = "-1";
if (isset($_GET['ID'])) {
  $colname_MODIFICAR = (get_magic_quotes_gpc()) ? $_GET['ID'] : addslashes($_GET['ID']);
}

mysql_select_db($database_informeUrb, $informeUrb);
$query_MODIFICAR = sprintf("SELECT * FROM usuarios WHERE Dni='$dni'", $colname_MODIFICAR);
$MODIFICAR = mysql_query($query_MODIFICAR, $informeUrb) or die(mysql_error());
$row_MODIFICAR = mysql_fetch_assoc($MODIFICAR);
?>