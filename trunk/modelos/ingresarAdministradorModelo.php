<?php require_once('./Connections/informeUrb.php'); ?>
<?php 

$lognick=$_POST['user'];
$logpass=$_POST['pass'];

mysql_select_db($database_informeUrb, $informeUrb);
$login = ("select * from Usuarios where Usuario='$lognick' AND pass='$logpass'");
$resultado = mysql_query($login, $informeUrb) or die(mysql_error());
$row_Listado = mysql_fetch_assoc($resultado);

if($row_Listado==""){	
	?>
	<script>
	alert("El usuario y la contraseña no estan registrados");
  	parent.location.href="index.php";
  				
  	</script>
  			<?php 
}else{
	if($row_Listado['Valor_Admin']>'8'){	
		session_start();
        $_SESSION['usuarioAdm']=$lognick;
        $_SESSION['contraseñaAdm']=$logpass;
	?>
	<script>
	
  	parent.location.href="index.php?controlador=administrador";
  				
  	</script>
  			<?php
}else{
	?>
	<script>
	alert("El usuario no tiene permiso para acceder a la aplicacion");
  	parent.location.href="index.php";
  				
  	</script><?php
}
}
?> 