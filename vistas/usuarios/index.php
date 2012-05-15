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
			<li><a href="index.php?controlador=acceso" accesskey="3" title="Administracion">Administracion	</a></li>
			<li><a href="./vistas/foro/index.php" accesskey="4" title="Sobre Nosotros">Foro</a></li>
			<li><a href="./vistas/contacto/contactform.htm" accesskey="5" title="Contacta">Contacta</a></li>
		</ul>
	</div>
</div>


<div id="splash"><img src="./vistas/img/Portada.jpg" alt="sespectaculo.com" width="500" height="120" style="margin-left: 15%;" /></div>
<div><br></br></div>

<table  width="100%" style="margin-left: 5%;" >
<tr>
<td rowspan="2" colspan= ><h2  class="section">Datos Usuarios</h2>
		<div id="contentI" style="margin-top: 0.5em;">			
   			 <div id="div"> <a class="letraLogin" id="a">Nombre: </a>			<a id="b"><?php echo $row_Listado['Nombre']; ?></a></div>
    		 <div id="div"> <a class="letraLogin" id="a">Apellidos: </a> 		<a id="b"><?php echo $row_Listado['Apellidos']; ?></a></div>
   			 <div id="div"> <a class="letraLogin" id="a">Dni: </a>				<a id="b"><?php echo $row_Listado['Dni']; ?></a></div>
    		 <div id="div"> <a class="letraLogin" id="a">Edad: </a>			    <a id="b"><?php echo $row_Listado['Edad']; ?></a></div>
   			 <div id="div"> <a class="letraLogin" id="a">Telefono: </a> 		<a id="b"><?php echo $row_Listado['Telefono']; ?></a></div>
   			 <div id="div"> <a class="letraLogin" id="a">Email: </a> 			<a id="b"><?php echo $row_Listado['Email']; ?></a></div>
   			 <div id="div"> <a class="letraLogin" id="a">Direccion: </a> 		<a id="b"><?php echo $row_Listado['Direccion']; ?></a></div>
   			 <div id="div"> <a class="letraLogin" id="a">Localidad: </a> 		<a id="b"><?php echo $row_Listado['Localidad']; ?></a></div>
   			 <div id="div"> <a class="letraLogin" id="a">Provincia: </a> 		<a id="b"><?php echo $row_Listado['Provincia']; ?></a></div>
   			 <div id="div"> <a class="letraLogin" id="a">Valoracion: </a> 		<a id="b"><?php echo $puntuacion; ?></a></div>
</div>
</td>

<td colspan="2" ><span  style="font-size: 25px;font:bold;">Menu Opciones Usuarios </span></td>
</tr>
<tr>
	<td>
	<br />
		<div style="float: left;">
			<div class="icon">
				<a href="index.php?controlador=opcionesUsuario&opcion=solicitudes">
					<img src="./vistas/images/header/icon-48-article.png" alt="Mis Solicitudes" title="Mis Solicitudes" ></img>					
					<br></br><span >Mis Solicitudes</span></a>
			</div>
		</div>
		
				<div style="float: left;margin-left: 10%;">
			<div class="icon">
				<a href="index.php?controlador=opcionesUsuario&opcion=entradas">
					<img src="./vistas/images/header/icon-48-media.png" alt="Mis Entradas" title="Mis Entradas"></img>			
					<br></br><span>Mis Entradas</span></a>
			</div>
		</div>
		<div style="float: left;margin-left: 10%;">
			<div class="icon">
				<a href="index.php?controlador=opcionesUsuario&opcion=modificar&dni=<?php echo $row_Listado['Dni']; ?>">
					<img src="./vistas/images/header/icon-48-user.png" alt="Modificar Perfil" title="Modificar Perfil">		</img>			
					<br></br><span>Modificar mi Perfil</span></a>
			</div>
		</div>
		<div style="float: left;margin-left: 10%;">
			<div class="icon">
				<a href="index.php?controlador=opcionesUsuario&opcion=busqueda" >
					<img src="./vistas/images/header/icon-48-category.png" alt="Busqueda de Entradas" title="Busqueda de Entradas"></img>					
					<br></br><span>Busqueda de Entradas</span></a>

			</div>			
		</div>
		</td>
		</tr><tr>
		<td></td>
		<td>
			<div style="float: left;">
			<div class="icon">
				<a href="index.php?controlador=opcionesUsuario&opcion=insertarEntrada" >
					<img src="./vistas/images/header/icon-48-category.png" alt="Insertar Entradas" title="Insertar Entradas"></img>					
					<br></br><span>Insertar Entradas</span></a>

			</div>		
		</div>
		<div style="float: left;margin-left: 10%;">
			<div class="icon">
				<a href="index.php?controlador=opcionesUsuario&opcion=alertas">
					<img src="./vistas/img/alerta.png" alt="Alertas" title="Alertas" height="50"></img>			
					<br></br><span>Alertas</span></a>
			</div>
			</div>
			<div style="float: left;margin-left: 12%;">
			<div class="icon">
				<a href="index.php?controlador=opcionesUsuario&opcion=svaloracion">
					<img src="./vistas/img/comments.png" alt="Sistema Valoracion" title="Sistema Valoracion" height="50"></img>			
					<br></br><span>Sistema Valoracion</span></a>
			</div>
			</div>
			
			<div  style="float: left;margin-left: 10%;">
			<div class="icon">
				<a href="index.php?controlador=salir" ><img src="./vistas/images/cerrarsesion.png" alt="Salir" title="Salir" height="50"></img>
				<br></br><span style="font-size: medium;"> &nbsp;&nbsp;&nbsp;&nbsp;Salir</span></a>					
			</div>			
			</div>
		
		</td>
		
</tr>
<tr>
<td>
<div style="margin-left: 15%;"><a href="index.php?controlador=opcionesUsuario&opcion=borrar&eliminar=usuarios&cod=<?php echo $row_Listado['Dni'];?>" ><img src="./vistas/images/delete_user.png" alt="Eliminar Usuario" title="Eliminar Usuario" height="50"></img></a></div>
<div style="margin-left: 10%;"><span style="font-size: medium;"> Eliminar Usuario</span></div>
</td>
</tr>
</table>
<div><br></br><br></br><br></br><br></br></div>	
		
<div id="footer">
	<p>Copyright &copy; 2011 . Designed by <a> <strong>Melli</strong></a></p>
</div>
</body>
</html>
