<?php session_start();
header('refresh:2; url=index.php?controlador=opcionesUsuario&opcion=entradas'); 
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Sistema Reventa Entradas Teatro</title>
<meta name="keywords" content=""  />
<meta name="description" content="" />
<meta content="refresh" />
<link href="./vistas/css/default.css" rel="stylesheet" type="text/css" />
<link href="./vistas/css/principal.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="./vistas/programas.js" type="text/javascript"></script>
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
      <td><input title="Contrase�a" type="password" name="pass" size="28"></input></td>
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
<div id="splash"><img src="./vistas/img/Portada.jpg" alt="sespectaculo.com" width="500" height="120" style="margin-left: 15%;" /></div>
<br></br>
<table align="center" width="100%" class="bordeTablaGris">
     <tr valign="baseline">
      <td style="text-decoration: blink;font-size: large;" align="center" class="letraLogin">Ya has aceptado una oferta por esta entrada</td>
      </tr>
      <tr><td></td></tr> <tr><td></td></tr> <tr><td></td></tr>
     <tr valign="baseline">
      <td style="text-decoration: blink" align="center" class="letraLogin">Cargando...</td>
      </tr>
     <tr align="center" valign="baseline">
     <td><input type="image" src="./vistas/img/anim-loader.gif" alt="Cargando" class="inputTexto"></input></td>
     </tr>
</table>

<br></br>
<br></br>
<br></br>
<div id="footer">
	<p>Copyright &copy; 2011 . Designed by <a> <strong>Melli</strong></a></p>
</div>
<div align="right">
<p>
 <a href="http://validator.w3.org/check?uri=referer"><img
      src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" />
  </a>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:70px;height:25px"
            src="http://jigsaw.w3.org/css-validator/images/vcss"
            alt="�CSS V�lido!" />
    </a>
<a href="http://jigsaw.w3.org/css-validator/check/referer">
    <img style="border:0;width:70px;height:25px"
        src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
        alt="�CSS V�lido!" />
</a>
</p>     
</div>
</body>
</html>