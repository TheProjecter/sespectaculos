<?php  require_once 'Connections/informeUrb.php';?>
<?php 
$lognick=$_POST['nick'];
$logpass=$_POST['pass'];
//echo $lognick;
//echo $logpass;
mysql_select_db($database_informeUrb, $informeUrb);
$login = ("select * from usuarios where Usuario='$lognick' and pass='$logpass'");
$resultado = mysql_query($login, $informeUrb) or die(mysql_error());
$row_Listado = mysql_fetch_assoc($resultado);
//echo "el valor es ".$row_Listado;
$idUsuario= $row_Listado['idUsuario'];
if($row_Listado==""){	
	?>
	<script>
	alert("El usuario y la contraseña no estan registrados");
  	parent.location.href="index.php?errorusuario=si";
  	</script>
  			<?php 
}
if ($fila =$row_Listado ){
    if ($lognick == $fila['Usuario'] && $logpass == $fila['pass'])  {
    	session_start();
        $_SESSION['usuario']=$lognick;
        $_SESSION['idUsuario']=$row_Listado['idUsuario'];
        $_SESSION['dni']=$row_Listado['Dni'];
        $_SESSION['contraseña']=$logpass;
        $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s"); 
 ?>
		 <script>
  			parent.location.href="index.php";
 		 </script>
 <?php     	
    }else{
      
    
      ?>
			 <script>
			 alert("El usuario y la contraseña no estan registrados");
  			 parent.location.href="index.php?errorusuario=si";
  			</script>
 <?php
 
    }
}	
