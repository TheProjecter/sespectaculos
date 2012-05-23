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
<script type="text/javascript">
function volver(){
	parent.location.href='index.php?controlador=usuarios';
}
function ir(){
	parent.location.href='index.php?controlador=opcionesUsuario&opcion=busqueda';
}
function comprar(){
	parent.location.href='index.php?controlador=opcionesUsuario&opcion=comprar&entradas=<?php echo $row_Listado2['codEntrada']?>';
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
     <td> <input type="submit" class="boton" value="Ingresar"></input></td>
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
<div id="colOneI">
		<h2  class="section">Datos Contacto Vendedor</h2>
		<div id="content" style="margin-top: 0.8em;">			
   			 <div> <a class="as">Nombre: </a>			<a class="bs"><?php echo $row_Listado['Nombre']; ?></a></div>
    		 <div> <a class="as">Apellidos: </a> 		<a class="bs"><?php echo $row_Listado['Apellidos']; ?></a></div>
   			 <div> <a class="as">Dni: </a>				<a class="bs"><?php echo $row_Listado['Dni']; ?></a></div>
    		 <div> <a class="as">Edad: </a>			    <a class="bs"><?php echo $row_Listado['Edad']; ?></a></div>
   			 <div> <a class="as">Telefono: </a> 		<a class="bs"><?php echo $row_Listado['Telefono']; ?></a></div>
   			 <div> <a class="as">Email: </a> 			<a class="bs"><?php echo $row_Listado['Email']; ?></a></div>
   			 <div> <a class="as">Direccion: </a> 		<a class="bs"><?php echo $row_Listado['Direccion']; ?></a></div>
   			 <div> <a class="as">Localidad: </a> 		<a class="bs"><?php echo $row_Listado['Localidad']; ?></a></div>
   			 <div> <a class="as">Provincia: </a> 		<a class="bs"><?php echo $row_Listado['Provincia']; ?></a></div>
	</div>
		</div>
		
<div id="colTwoI">
		<h2  class="section">Datos Entradas</h2>
		<div id="contentI" style="margin-top: 0.8em;">			
   			 <div> <a class="as">Evento: </a>			<a class="bs"><?php echo $row_Listado2['Evento']; ?></a></div>
    		 <div> <a class="as">Provincia: </a> 		<a class="bs"><?php echo $row_Listado2['Provincia']; ?></a></div>
   			 <div> <a class="as">Lugar: </a>			<a class="bs"><?php echo $row_Listado2['Lugar']; ?></a></div>
    		 <div> <a class="as">Fecha: </a>			<a class="bs"><?php echo $row_Listado2['Fecha']; ?></a></div>
   			 <div> <a class="as">Precio: </a> 		    <a class="bs"><?php echo $row_Listado2['Precio']; ?></a></div>
   			 <div> <a class="as">Fila: </a> 			<a class="bs"><?php echo $row_Listado2['Fila']; ?></a></div>
   			 <div> <a class="as">Asiento: </a> 		    <a class="bs"><?php echo $row_Listado2['Asiento']; ?></a></div>
   			 <div> <a class="as">Genero:</a> 		    <a class="bs"><?php echo $row_Listado2['Genero']; ?></a></div>
   			 <div> <a class="as">Descripcion: </a> 		<a class="bs"><?php echo $row_Listado2['Descripcion']; ?></a></div>
</div>
</div>	

<div id="contentII">
<input type="button" title="Volver" value="Volver" onclick="volver()" style="margin-top: 50px;" />
<input type="button" title="Nueva Busqueda" value="Nueva Busqueda" onclick="ir()" style="margin-top: 50px;" />
<input type="button" title="Aceptar" value="Aceptar Oferta" onclick="comprar()" style="margin-top: 50px;" />
</div>

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
            alt="¡CSS Válido!" />
    </a>
<a href="http://jigsaw.w3.org/css-validator/check/referer">
    <img style="border:0;width:70px;height:25px"
        src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
        alt="¡CSS Válido!" />
</a>
</p>     
</div>
</body>
</html>