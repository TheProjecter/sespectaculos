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
	parent.location.href='index.php';
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
      <td><input title="Contraseña" type="password" name="pass" size="28"></input></td>
    </tr>     
  </table>
  <h1 class="letraLogin" style="text-align: center; color: white;">Si no estas registrado pincha <a href="index.php?controlador=registro"><strong style="color: white;">aqui</strong></a></h1>
  <table align="center">
    <tr valign="baseline">
      <td>&nbsp;</td>
     <td><input type="submit" class="boton" value="Ingresar"></input></td>
    </tr>
    <?php }else{?>
    <tr><td>
    <table align="center" width="35%" >
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
<div id="splash"><img src="./vistas/img/Portada.jpg" alt="sespectaculos.com" width="500" height="120" style="margin-left: 15%;" /></div>
<div><br></br></div>

<form method="post" name="form1" enctype="multipart/form-data" action="<?php echo $editFormAction; ?>" onsubmit="return valida(this);">
	
	<table align="center" width="100%">
	<tr>
		<td class="imgTituloTabla">
			<div class="tituloTabla">Formulario de Registro de la Aplicacion</div>
		</td>
	</tr>
	</table>
	
	<table align="center" width="100%" class="bordeTablaGris">
    <tr valign="baseline">
      <td  align="right" class="letraLogin">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Usuario:</td>
      <td><input title="Usuario" type="text" name="usuario"  value="" size="40" class="inputTexto"></input></td>
    </tr>
     <tr valign="baseline">
      <td  align="right" class="letraLogin">Contrase&ntilde;a:</td>
      <td><input title="Contraseña" type="password" name="contrasenha" value="" size="40" class="inputTexto"></input></td>
    </tr>
    <tr valign="baseline">
      <td  align="right" class="letraLogin">Repetir Contrase&ntilde;a:</td>
      <td><input title="Repetir Contraseña" type="password" name="pass"  value="" size="40" class="inputTexto"></input></td>
    </tr>
    <tr valign="baseline">
      <td  align="right" class="letraLogin">E-mail:</td>
      <td><input title="Email" type="text" name="email" value="" size="40" class="inputTexto"></input></td>
    </tr>
    <tr valign="baseline">
      <td  align="right" class="letraLogin">Nombre:</td>
      <td><input title="Nombre" type="text" name="nombre" value="" size="40" class="inputTexto"></input></td>
    </tr>
    <tr valign="baseline">
      <td  align="right" class="letraLogin">Apellidos:</td>
      <td><input title="Apellidos" type="text" name="apellidos"  value="" size="40" class="inputTexto"></input></td>
    </tr>
    <tr valign="baseline">
      <td  align="right" class="letraLogin">Edad:</td>
      <td><input title="Edad" type="text" name="edad"  value="" size="40" class="inputTexto"></input></td>
    </tr>
    <tr valign="baseline">
      <td  align="right" class="letraLogin">Dni:</td>
      <td><input title="Dni" type="text" name="dni" value="" size="40" class="inputTexto"></input></td>
    </tr>
    <tr valign="baseline">
      <td  align="right" class="letraLogin">Telefono:</td>
      <td><input title="Telefono" type="text" name="telefono" value="" size="40" class="inputTexto"></input></td>
    </tr>
    <tr valign="baseline">
      <td  align="right" class="letraLogin">Direccion:</td>
      <td><input title="Direccion" type="text" name="direccion" value="" size="40" class="inputTexto"></input></td>
    </tr>
	<tr valign="baseline">
      <td  align="right" class="letraLogin">Provincia:</td>
     <?php  
	 echo '<td><select title="Provincia" name="provincia">';  
	 echo ' <option value=""></option>';	 
  	 while ($row_Listado=mysql_fetch_array($Listado)){ 
     echo ' <option value="'.$row_Listado["Provincia"].'">'.$row_Listado["Provincia"].'</option>'; 
     }   
	 echo ' </select><td>';  
	 ?>
    </tr>  
	<tr valign="baseline">
      <td  align="right" class="letraLogin">Localidad:</td>
      <td><input title="Localidad" type="text" name="localidad" value="" size="40" class="inputTexto"></input></td>
    </tr>
    <tr valign="baseline">
      <td  align="right" class="letraLogin">Cod. Postal:</td>
      <td><input title="Codigo Postal" type="text" name="cp" value="" size="40" class="inputTexto"></input></td>
    </tr>
   </table>    
    <table align="center">
 		<tr valign="baseline">
      <td  >&nbsp;</td>
     <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input title="Volver" type="button" value="Volver" onclick="volver()" class="inputTexto"></input><input title="Registrar" type="submit" value="Registrar" class="inputTexto"></input></td>
    </tr>
  	</table>
    <div> <input type="hidden" name="MM_insert" value="form1"></input></div>
</form>
	<div style="clear: both;">&nbsp;</div>
	<div><br></br><br></br></div>
<div id="footer">
	<p>Copyright &copy; 2011 . Designed by <strong>Melli</strong></p>
</div>
</body>
</html>