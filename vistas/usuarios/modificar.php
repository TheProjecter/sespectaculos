<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Sistema Reventa Entradas Teatro</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="./vistas/css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="./vistas/programas.js" type="text/javascript"></script>
<script type="text/javascript">
function volver(){
	parent.location.href='index.php?controlador=usuarios';
}
</script>
</head>
<body>
<div id="header">
	<div id="logo">
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
  	<form action="index.php?controlador=ingresar&amp;Accion=usuarios" method="post">
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
      <td><input title="Usuario" type="text" name="nick" size="28"></input></td>
    </tr>
    <tr valign="baseline">
      <td align="right" class="letraLogin">Contrase&ntilde;a:</td>
      <td><input title="Contraseņa" type="password" name="pass" size="28"></input></td>
    </tr>     
  </table>
  <h1 class="letraLogin" style="text-align: center; color: white;">Si no estas registrado pincha <a href="index.php?controlador=registro"><strong style="color: white;">aqui</strong></a></h1>
  <table align="center">
    <tr valign="baseline">
      <td>&nbsp;</td>
     <td> <input type="submit" class="boton" value="Ingresar"></input></td>
    </tr>
    <?php }else{?>
    <tr><td>
    <table align="center" width="35%">
    	<tr><td><?php 
    	echo "Usuario:".$_SESSION['usuario'];
    	?>
    	</td>
    	</tr> 
    	<tr><td><a  class="letraLogin" style="text-align: right; color: white;" href="index.php?controlador=usuarios">Mi Zona</a></td></tr>     
        <tr><td><a  class="letraLogin" style="text-align: right; color: white;" href="index.php?controlador=salir">Cerrar Seccion</a></td></tr>
    <?php 
    } ?>
   </table> </td></tr>  
  	</table>
      </form>
  	</div>
</div>
<div id="splash"><img src="./vistas/img/Portada.jpg" alt="sespectaculo.com" width="500" height="120" style="margin-left: 15%;" /></div>
<br></br>
<form method="post" name="form1" enctype="multipart/form-data" action="<?php echo $editFormAction; ?>" onsubmit="return valida(this);">
	
	<table align="center" width="100%">
	<tr>
		<td class="imgTituloTabla">
			<div class="tituloTabla">Formulario Para Modificar Datos de Usuario</div>
		</td>
	</tr>
	</table>	
	<table align="center" width="100%" class="bordeTablaGris">
	<tr valign="baseline">
      <td align="right" class="letraLogin">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Nombre:</td>
      <td><input title="Nombre" type="text" name="nombre" value="<?php echo $row_MODIFICAR['Nombre']; ?>" size="40" class="inputTexto"/></td>
    </tr>	
     <tr valign="baseline">
      <td align="right" class="letraLogin">Apellidos:</td>
      <td><input title="Apellidos" type="text" name="apellido" value="<?php echo $row_MODIFICAR['Apellidos']; ?>" size="40" class="inputTexto"/></td>
    </tr>
    <tr valign="baseline">
      <td align="right" class="letraLogin">NIF:</td>
      <td><input title="Dni" type="text" name="dni" value="<?php echo $row_MODIFICAR['Dni']; ?>" size="40" class="inputTexto"/></td>
    </tr>
    <tr valign="baseline">
      <td align="right" class="letraLogin">Edad:</td>
      <td><input title="Edad" type="text" name="edad" value="<?php echo $row_MODIFICAR['Edad']; ?>" size="40" class="inputTexto"/></td>
    </tr>
    <tr valign="baseline">
      <td align="right" class="letraLogin">Telefono:</td>
      <td><input title="Telefono" type="text" name="telefono" value="<?php echo $row_MODIFICAR['Telefono']; ?>" size="40" class="inputTexto"/></td>
    </tr>
     <tr valign="baseline">
      <td align="right" class="letraLogin">Provincia:</td>
      <td><input title="Provincia" type="text" name="provincia" value="<?php echo $row_MODIFICAR['Provincia']; ?>" size="40" class="inputTexto"/></td>
    </tr>
	<tr valign="baseline">
      <td align="right" class="letraLogin">Localidad:</td>
      <td><input title="Localidad" type="text" name="localidad" value="<?php echo $row_MODIFICAR['Localidad']; ?>" size="40" class="inputTexto"/></td>
    </tr>
    <tr valign="baseline">
      <td align="right" class="letraLogin">Direccion:</td>
      <td><input title="Direccion" type="text" name="direccion" value="<?php echo $row_MODIFICAR['Direccion']; ?>" size="40" class="inputTexto"/></td>
    </tr>
    <tr valign="baseline">
      <td align="right" class="letraLogin">Email:</td>
      <td><input title="Email" type="text" name="email" value="<?php echo $row_MODIFICAR['Email']; ?>" size="40" class="inputTexto"/></td>
    </tr>
    <tr valign="baseline">
      <td  align="right" class="letraLogin">Cod. Postal:</td>
      <td><input title="Codigo Postal" type="text" name="cp" value="<?php echo $row_MODIFICAR['Cp']; ?>" size="40" class="inputTexto"/></td>
    </tr>
   </table>    
    <table align="center">
 	<tr valign="baseline">
     <td><input title="Volver" type="button" value="Volver" onclick="volver()" class="inputTexto"/><input title="Modificar" type="submit" value="Modificar" class="inputTexto"/></td>
    </tr>
  	</table>
	<input type="hidden" name="MM_update" value="form1"></input>
    <input type="hidden" name="id" value="<?php echo $row_MODIFICAR['idUsuario']; ?>"/>
</form>
	<div style="clear: both;">&nbsp;</div>
	<div><br></br><br></br></div>
<div id="footer">
	<p>Copyright &copy; 2011 . Designed by <a> <strong>Melli</strong></a></p>
</div>
    </body>
</html>
<?php
mysql_free_result($MODIFICAR);
?>