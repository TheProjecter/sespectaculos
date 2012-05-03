<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Sistema Reventa Entradas Teatro</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="./vistas/css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="./vistas/programas.js" type="text/javascript"></script>
<script language="javascript" src="./vistas/popcalendar.js" type="text/javascript"></script>
<script>
function volver(){
	parent.location.href='index.php?controlador=opcionesUsuario&opcion=lusuarios';
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
<form method="post" name="form1" enctype="multipart/form-data" action="<?php echo $editFormAction; ?>">
	
	<table align="center" width="100%">
	<tr>
		<td class="imgTituloTabla">
			<div class="tituloTabla">Formulario Valoracion Usuarios</div>
		</td>
	</tr>
	</table>
	
	<table align="center" width="100%" class="bordeTablaGris">
	<tr valign="baseline">
      <td align="right" class="letraLogin">Nombre:</td>
      <td><input readonly="readonly" type="text" name="nombre" value="<?php echo $row_MODIFICAR['Nombre']; ?>" size="32" class="inputTexto"></input></td>
    </tr>	
     <tr valign="baseline">
      <td align="right" class="letraLogin">Apellidos:</td>
      <td><input readonly="readonly" type="text" name="apellido" value="<?php echo $row_MODIFICAR['Apellidos']; ?>" size="32" class="inputTexto"></input></td>
    </tr>
    <tr valign="baseline">
      <td align="right" class="letraLogin">NIF:</td>
      <td><input readonly="readonly" type="text" name="dni" value="<?php echo $row_MODIFICAR['Dni']; ?>" size="32" class="inputTexto"></input></td>
    </tr>
    <tr valign="baseline">
      <td align="right" class="letraLogin">Email:</td>
      <td><input readonly="readonly" type="text" name="email" value="<?php echo $row_MODIFICAR['Email']; ?>" size="32" class="inputTexto"></input></td>
    </tr>
    <tr><td></td></tr>
	<tr valign="baseline">
      <td align="right" class="letraLogin">Valoracion:</td>
      <td><select name="valoracion">
      	<option value="0">0</option>
      	<option value="1">1</option>
      	<option value="2">2</option>
      	<option value="3">3</option>
      	<option value="4">4</option>
      	<option value="5">5</option>
      	<option value="6">6</option>
      	<option value="7">7</option>
      	<option value="8">8</option>
      	<option value="9">9</option>
      </select></td>
    </tr>     
    <tr valign="baseline">
      <td  align="right" class="letraLogin">Comentarios:</td>
     </tr>
     <tr valign="baseline">
     <td  align="right" class="letraLogin"></td>
      <td><textarea name="comentario" cols="30" rows="6" class="inputTexto"></textarea></td>
    </tr>
   </table>  
     
    <table align="center">
 		<tr valign="baseline">
      <td  >&nbsp;</td>
     <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Volver" onclick="volver()" class="inputTexto"></input><input type="submit" value="Registrar" class="inputTexto"></input></td>
    </tr>
  	</table>
     <div><input type="hidden" name="MM_insert" value="form1"></input></div>
</form>


<div style="clear: both;">&nbsp;</div>
<div><br></br><br></br><br></br></div>
<div id="footer">
	<p>Copyright &copy; 2011 . Designed by <strong>Melli</strong></p>
</div>
</body>
</html>