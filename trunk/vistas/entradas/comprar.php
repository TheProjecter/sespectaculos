<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Sistema Reventa Entradas Teatro</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="./vistas/css/default.css" rel="stylesheet" type="text/css" />
<link href="./vistas/css/principal.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="./vistas/programas.js" type="text/javascript"></script>
<script>
function rechazar(){
	parent.location.href='index.php?controlador=usuarios';
}
function aceptar(){
	parent.location.href='index.php?controlador=opcionesUsuario&opcion=gestion&email=<?php echo $row_Listado2['Email']?>&entradas=<?php echo $row_Listado['codEntrada']?>';
}
</script>
</head>
<body>
<div id="header">
	<div id="logo">
		<h1><a href="#"></a></h1>
		<h2><a href=""> </a></h2>
	</div>
	<div id="menu">
		<ul>
			<li><a href="index.php" accesskey="1" title="Inicio">Inicio</a></li>
			<li><a href="#" accesskey="2" title="Login" onclick="funcion1a()">Login</a></li>
			<li><a href="index.php?controlador=acceso" accesskey="3" title="Administracion">Administracion	</a></li>
			<li><a href="./vistas/foro/index.php" accesskey="4" title="Sobre Nosotros">Foro</a></li>
			<li><a href="./vistas/contacto/contactform.htm" accesskey="5" title="Contacta">Contacta</a></li>
		</ul>
	</div>
</div>

<div id="login">
<div id="tabla2" style="display:none;">  
  	<form action="index.php?controlador=ingresar&Accion=usuarios" method="post">
    <table align="center" width="68%">
	<tr>
		<td class="imgTituloTabla">
			<div class="tituloTabla">Panel Control</div>
		</td>
	</tr>
	</table>
	<?php if (!isset($_SESSION['usuario'])) {?>
	<table align="center" width="25%" class="bordeTablaGris">
	<tr valign="baseline">
      <td align="right" class="letraLogin">Usuario:</td>
      <td><input type="text" name="nick" size=28 maxlength=20></input></td>
    </tr>
    <tr valign="baseline">
      <td align="right" class="letraLogin">Contrase&ntilde;a:</td>
      <td><input type="password" name="pass" size=28 maxlength=20></input></td>
    </tr>     
  </table>
  <h1 class="letraLogin" style="text-align: center; color: white;">Si no estas registrado pincha <a href="index.php?controlador=registro"  ><strong style="color: white;">aqui</strong></a></h1>
  <table align="center">
    <tr valign="baseline">
      <td>&nbsp;</td>
     <td> <input type="submit" class="boton" value="Ingresar"></input></td>
    </tr>
    <?php }else{
    	?><table align="center" width="35%" >
    	<tr><td><?php 
    	echo "Usuario:".$_SESSION['usuario'];
    	?>
    	</td>
    	</tr> 
    	<tr><td><a  class="letraLogin" style="text-align: right; color: white;" href="index.php?controlador=usuarios">Mi Zona</a></td></tr>     
        <tr><td><a  class="letraLogin" style="text-align: right; color: white;" href="index.php?controlador=salir">Cerrar Seccion</a></td></tr>
    <?php 
    } ?>
   </table>   
  	</table>
      </form>
  	</div>
</div>
<div id="splash"><img src="./vistas/img/Portada.jpg" alt="" width="500" height="120" style="margin-left: 15%;" /></div>
<div><br></br></div>
<div id="colTot">
		<h2  class="section">Datos Compra</h2>
		<div id="contentI" style="margin-top: 0.5em;">			
   			 <div id="div"> <a class="letraLogin" id="a">Evento: </a>			<a id="b"><?php echo $row_Listado['Evento']; ?></a></div>
    		 <div id="div"> <a class="letraLogin" id="a">Provincia: </a> 		<a id="b"><?php echo $row_Listado['Provincia']; ?></a></div>
   			 <div id="div"> <a class="letraLogin" id="a">Lugar: </a>			<a id="b"><?php echo $row_Listado['Lugar']; ?></a></div>
    		 <div id="div"> <a class="letraLogin" id="a">Fecha: </a>			<a id="b"><?php echo $row_Listado['Fecha']; ?></a></div>
   			 <div id="div"> <a class="letraLogin" id="a">Precio: </a> 		    <a id="b"><?php echo $row_Listado['Precio']; ?></a></div>
   			 <div id="div"> <a class="letraLogin" id="a">Fila: </a> 			<a id="b"><?php echo $row_Listado['Fila']; ?></a></div>
   			 <div id="div"> <a class="letraLogin" id="a">Asiento: </a> 		    <a id="b"><?php echo $row_Listado['Asiento']; ?></a></div>
   			 <div id="div"> <a class="letraLogin" id="a">Genero</a> 		    <a id="b"><?php echo $row_Listado['Genero']; ?></a></div>
   			 <div id="div"> <a class="letraLogin" id="a">Descripcion: </a> 		<a id="b"><?php echo $row_Listado['Descripcion']; ?></a></div>
   		</div>
   		<br />
   		<hr />
   		<br />
   			<h2  class="section">Datos Vendedor</h2>
		<div id="contentI" style="margin-top: 0.5em;">
   			 <div id="div"> <a class="letraLogin" id="a">Nombre: </a> 		<a id="b"><?php echo $row_Listado2['Nombre']; ?></a></div>
   			 <div id="div"> <a class="letraLogin" id="a">Apellidos: </a> 	<a id="b"><?php echo $row_Listado2['Apellidos']; ?></a></div>
   			 <div id="div"> <a class="letraLogin" id="a">Dni: </a> 			<a id="b"><?php echo $row_Listado2['Dni']; ?></a></div>
   			 
</div>
		</div>
<div id="contentII">
<input type="button" title="Rechazar compra" value="Cancelar" onclick="rechazar()" style="margin-top: 50px;" />
<input type="button" title="Aceptar Compra" value="Peticion Usuario" onclick="aceptar()" style="margin-top: 50px;" />
</div>

<div><br></br><br></br><br></br></div>
<div id="footer">
	<p>Copyright &copy; 2011 . Designed by <a> <strong>Melli</strong></a></p>
</div>
</body>
</html>