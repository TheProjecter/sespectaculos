<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Sistema Reventa Entradas Teatro</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="./vistas/css/default.css" rel="stylesheet" type="text/css" />
<link href="./vistas/css/principal.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="header">
	<div id="logo">
	</div>
	<div id="menu">
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

<table  width="100%" style="margin-left: 5%;" >
<tr>
<td rowspan="2" colspan= ><h2  class="section">Datos Usuarios</h2>
		<div id="contentI" style="margin-top: 0.5em;">			
   			 <div id="div"> <a class="letraLogin" id="a">Nombre: </a>			<a id="b"><?php echo $row_Listado['Nombre']; ?></a></div>
    		 <div id="div"> <a class="letraLogin" id="a">Apellidos: </a> 		<a id="b"><?php echo $row_Listado['Apellidos']; ?></a></div>
   			 <div id="div"> <a class="letraLogin" id="a">Telefono: </a> 		<a id="b"><?php echo $row_Listado['Telefono']; ?></a></div>
   			 <div id="div"> <a class="letraLogin" id="a">Email: </a> 			<a id="b"><?php echo $row_Listado['Email']; ?></a></div>
</div></td>

<td colspan="2" ><span  style="font-size: 25px;font:bold;">Menu Administracion Web </span></td>
</tr>
<tr>
	<td>
	<br />
		<div style="float: left; margin-top: 5%;">
			<div class="icon">
				<a href="index.php?controlador=opcionesAdministrador&opcion=solicitudes">
					<img src="./vistas/images/header/icon-48-article.png" alt="Gestor de Solicitudes" title="Gestor de Solicitudes" ></img>					
					<br></br><span >Gestor de Solicitudes</span></a>
			</div>
		</div>
		
				<div style="float: left;margin-left: 10%; margin-top: 5%;">
			<div class="icon">
				<a href="index.php?controlador=opcionesAdministrador&opcion=entradas">
					<img src="./vistas/images/header/icon-48-media.png" alt="Gestor de Entradas" title="Gestor de Entradas">		</img>			
					<br></br><span>Gestor Entradas</span></a>
			</div>
		</div>
		<div style="float: left;margin-left: 10%; margin-top: 5%;">
			<div class="icon">
				<a href="index.php?controlador=opcionesAdministrador&opcion=usuarios">
					<img src="./vistas/images/header/icon-48-user.png" alt="Gestor de usuarios" title="Gestor de Usuarios">		</img>			
					<br></br><span>Gestor de usuarios</span></a>
			</div>
		</div>
		<div style="float: left;margin-left: 10%; margin-top: 5%;">
			<div class="icon">
				<a href="index.php?controlador=opcionesAdministrador&opcion=categorias" >
					<img src="./vistas/images/header/icon-48-category.png" alt="Gestor de Categorias" title="Gestor de Categorias"></img>					
					<br></br><span>Gestor de categorias</span></a>
			</div>			
		</div>
		</td>
		</tr>
		<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
		<tr>
		<td></td>
		<td>
			<div >
			<div  style="float: left; margin-top: 8%;">
				<a href="index.php?controlador=opcionesAdministrador&opcion=menuAnuncios" >
					<img src="./vistas/images/header/icon-48-category.png" alt="Gestor de Anuncios" title="Gestor de Anuncios"></img>					
					<br></br><span>Gestor de Anuncios</span></a>

			</div>			
		</div>
			<div  style="float: left;margin-left: 10%; margin-top: 8%;">
				<a href="index.php?controlador=salir" ><img src="./vistas/images/cerrarsesion.png" alt="Salir" title="Salir"></img>
				<br></br><span> &nbsp;&nbsp;&nbsp;&nbsp;Salir</span></a>				
			</div>			
		
		</td>
		
</tr>
</table>
<div><br></br><br></br><br></br></div><div id="footer">
	<p>Copyright &copy; 2011 . Designed by <a> <strong>Melli</strong></a></p>
</div>
</body>
</html>