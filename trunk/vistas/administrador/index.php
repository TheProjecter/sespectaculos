<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Sistema Reventa Entradas Teatro</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="./vistas/css/default.css" rel="stylesheet" type="text/css" />
<link href="./vistas/css/principal.css" rel="stylesheet" type="text/css" />
<link href="./vistas/css/administrator.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
	<div id="logo">
	</div>
	<div id="menuPag">
		<ul>
			<li><a href="index.php" accesskey="1" title="Inicio">Inicio</a></li>
			<li><a href="#" accesskey="3" title="Administracion">Administracion	</a></li>
			<li><a href="./vistas/foro/index.php" accesskey="4" title="Sobre Nosotros">Foro</a></li>
			<li><a href="./vistas/contacto/contactform.htm" accesskey="5" title="Contacta">Contacta</a></li>
		</ul>
	</div>
</div>
<div id="splash"><img src="./vistas/img/Portada.jpg" alt="sespectaculos.com" width="500" height="120" style="margin-left: 15%;" /></div>
<div><br></br></div>
<?php if(isset($_SESSION['usuarioAdm'])){
?>
	<script>
	
  	parent.location.href="index.php?controlador=administrador";
  				
  	</script>
<?php

}?>
<div id="menuAdm">
<h3>Zona Administracion SEspectaculo</h3><br />

<form method="post" name="form1" enctype="multipart/form-data" action=index.php?controlador=ingresar&Accion=admnistrador>
<dl>
<dt>Usuario:</dt>
<dd><input title="usuario" name="user" type="text" id="users" size="40" ></input></dd>
</dl>

<dl>
<dt>Contraseña:</dt>
<dd><input title="contraseña" name="pass" type="password" id="pass" size="40"></input></dd>
</dl>

<div><input title="entrar" type="submit" value="Entrar" size=""></input></div>
<div><input type="hidden" name="MM_insert" value="form1"> </input></div>	
</form>
		
		
</div>
<div><br></br><br></br><br></br></div>
<div id="footer">
	<p>Copyright &copy; 2011 . Designed by <a> <strong>Melli</strong></a></p>
</div>
</body>
</html>