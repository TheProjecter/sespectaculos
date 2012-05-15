<?php session_start()?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Sistema Reventa Entradas Teatro</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="./vistas/css/default.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="./votos/css/rating.css" />
<script type="text/javascript"  src="./vistas/programas.js"></script>
<script type="text/javascript"  src="./votos/js/behavior.js"></script>
<script type="text/javascript"  src="./votos/js/rating.js"></script>

</head>
<body>
<div id="header">
	<div id="menu">
		<ul>
			<li><a href="#" accesskey="1" title="Inicio">Inicio</a></li>
			<li><a href="#" accesskey="2" title="Login" onclick="funcion1a()">Login</a></li>
			<li><a href="index.php?controlador=acceso" accesskey="3" title="Administracion">Administracion</a></li>
			<li><a href="./vistas/foro/index.php" accesskey="4" title="Sobre Nosotros">Foro</a></li>
			<li><a href="./vistas/contacto/contactform.htm" accesskey="5" title="Contacta">Contacta</a></li>
		</ul>
	</div>
</div>

<div id="login">
<div  id="tabla2" style="display: none;">  
  	<form action="index.php?controlador=ingresar&Accion=usuarios"; method="post">
    <table align="center" width="65%">
	<tr>
		<td align="center" class="imgTituloTabla">
			<div class="tituloTabla">Panel Control</div>
		</td>
	</tr>
	</table>
	<?php if (!isset($_SESSION['usuario'])) {?>
	<table align="center"  width="65%" class="bordeTablaGris">
	<tr valign="baseline">
      <td align="right" class="letraLogin">Usuario:</td>
      <td><input title="Usuario" type="text" name="nick" size="28"></input></td>
    </tr>
    <tr valign="baseline">
      <td align="right" class="letraLogin">Contrase&ntilde;a:</td>
      <td><input title="Contraseña" type="password" name="pass" size="28"></input></td>
    </tr>     
  </table>
  <h1 class="letraLogin" style="text-align: center; color: white;">Si no estas registrado pincha <a href="index.php?controlador=registro"  ><strong style="color: white;">aqui</strong></a></h1>
  <table align="center">
    <tr valign="baseline">
      <td >&nbsp;</td>
     <td> <input type="submit" class="boton" value="Ingresar"></input></td>
    </tr>
    </table>
    <?php }else{?>
    <table align="center" width="35%" >   
    	<tr><td><?php 
    	echo "Usuario:".$_SESSION['usuario'];
    	?>
    	</td>
    	</tr> 
    	<tr><td><a class="letraLogin" style="text-align: right; color: white;" href="index.php?controlador=usuarios">Mi Zona</a></td></tr>     
        <tr><td><a class="letraLogin" style="text-align: right; color: white;" href="index.php?controlador=salir">Cerrar Seccion</a></td></tr>
    <?php 
    } ?>
   </table>   
  	
      </form>
  	</div>
</div>
<div id="splash"><img src="./vistas/img/Portada.jpg" title="Portada" alt="100" width="500" height="120" style="margin-left: 15%;"  /></div>
<div><br></br></div>
<div id="content">
	<div id="colOne">
		<h2 class="section">Bienvenidos a nuestro portal Web</h2>
		<div class="content">
		<marquee onmouseover=this.stop() onmouseout=this.start() scrollAmount="2" scrollDelay="9" direction="up">
		<div class="content">
			<?php 
  				if($row_Listado==0 || $row_Listado== null){  
   				}else{  do {
			?>
			<div style="float:left; margin-left: 8em; margin-bottom: 15%;">
    			<a href="index.php?controlador=opcionesAdministrador&opcion=informacion&valor=<?php echo $row_Listado['idInformacion']?>">
				<img src="<?php echo  $row_Listado['Ruta']?>" alt="Gestor de usuarios" title="Gestor de Usuarios" width="110" height="150"></img>			
				<!--<br></br><span style="text-align: center;"><?php echo  $row_Listado['NombreEspectaculo']?></span>
				--></a>
    		</div>
   			<?php }  while ($row_Listado = mysql_fetch_assoc($Listado)); } 
			?> 
		</div>
		</marquee>
		</div>		
		<div class="boxed">		
			<h2 class="section">Ultimos Comentarios</h2>
			<div class="content">
			<marquee onmouseover=this.stop() onmouseout=this.start() scrollAmount="2" scrollDelay="9" direction="up">
  <div class="content">
			<?php
  do { 
  if ($row_Listado1['idComentario'] != null || $row_Listado1['idComentario'] != ""){ ?>      
      <p><?php echo $row_Listado1['Usuario'].": ".$row_Listado1['Comentario']; ?></p>    
         <?php }} while ($row_Listado1 = mysql_fetch_assoc($Listado1)); ?>
		</div>
		</marquee>
		<br></br>
		<form method="post"  name="form1" enctype="multipart/form-data" action="index.php?controlador=comentario">
			<p>Nick : <input type="text" name="nick" title="comentarios" size="25"></input>
			Comentario: <input type="text" name="comentarios" title="comentarios" size="80"></input>
          <input type="submit" class="boton" value="Enviar Comentario"></input></p>
          <p><input type="hidden" name="MM_insert" value="form1"></input></p>
		</form>
			</div>
		</div>
	</div>
	<div id="colTwo">
		<h2 class="section">Espectaculos mas solicitados</h2>
		<div class="content">
		<marquee onmouseover=this.stop() onmouseout=this.start() scrollAmount="2" scrollDelay="9" direction="up">
		<div class="content">
		
			<?php if($row_Listado2==0 || $row_Listado2== null){?>
			  <div style="float:center; text-align:center;">
    		  <a name="Informacion"> No hay ningun espectaculo solicitado</a><br />
    		  </div>
  			<?php  }else{  do {?>
			<div style="float:center; text-align:center;">
    		<a name="Evento"><?php echo $row_Listado2['Evento']?></a><br />
    		<a name="Fecha"><?php echo $row_Listado2['Fecha']?></a><br />
    		<a name="Precio"><?php echo $row_Listado2['Precio']." Euros"?></a><br />
    		<hr /><br />
    		</div>
   			<?php }  while ($row_Listado2 = mysql_fetch_assoc($Listado2)); } 
			?> 
		</div>
		</marquee>
		</div>
		<hr />
		<div class="boxed">
			<h2 class="section">Que te parece nuestra pagina</h2>
			<div class="content">
				<ul>
					<li><?php echo rating_bar('8'); ?> </li>
				</ul>
			</div>
		</div>
	</div>
	<div style="clear: both;">&nbsp;</div>
</div>
<div><br></br><br></br></div>
<div id="footer">
	<p>Copyright &copy; 2011 . Designed by <strong>Melli</strong></p>
</div>
<div align="right">
<p>
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