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
function confirmar ( mensaje ) {
	return confirm( mensaje );
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
      <td >&nbsp;</td>
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
   </table></td></tr>   
  	</table>
      </form>
  	</div>
</div>
<div id="splash"><img src="./vistas/img/Portada.jpg" alt="sespectaculos" width="500" height="120" style="margin-left: 15%;" /></div>
<div><br></br></div>	

<center>
<table width="80%" style="border:1px solid black">
<tr>
<td bgcolor="#FAFAFA">
<center>
<span style="font-size:15px;font-family:Tahoma;color:black;font-weight:bold"><?php echo $totalrows['count(idCritica)'] ;?>  Comentarios de usuarios</span>
</center>
</td></tr>

<tr><td height="1" bgcolor="black"></td></tr>
<?php if($totalrows['count(idCritica)']!=0){?>
<tr><td bgcolor="#FEFEFE">
<span style="font-size:12px;font-family:Tahoma;color:black;">
<?php while($row_Listado1=mysql_fetch_array($Listado1)){?> 
<font color="RED">
<b><?php echo $row_Listado1["Usuario"]; ?></b>
</font>:<?php echo $row_Listado1["Comentario"]; ?>. Valoracion: <?php echo $row_Listado1['Valoracion'];?>.
<br />
<?php }?>
</span>
</td></tr>
<?php }else{?>
<tr><td align="center"><a>No tiene ningun comentario</a></td></tr>
<?php }?>
</table>
 <table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center"><?php if ($pageNum_Listado > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Listado=%d%s", $currentPage, 0, $queryString_Listado); ?>"><img src="./vistas/img/First.gif" alt="Primera"></img></a>
          <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center"><?php if ($pageNum_Listado > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Listado=%d%s", $currentPage, max(0, $pageNum_Listado - 1), $queryString_Listado); ?>"><img src="./vistas/img/Previous.gif" alt="Anterior"></img></a>
          <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_Listado < $totalPages_Listado) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Listado=%d%s", $currentPage, min($totalPages_Listado, $pageNum_Listado + 1), $queryString_Listado); ?>"><img src="./vistas/img/Next.gif" alt="Siguiente"></img></a>
          <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_Listado < $totalPages_Listado) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Listado=%d%s", $currentPage, $totalPages_Listado, $queryString_Listado); ?>"><img src="./vistas/img/Last.gif" alt="Ultima"></img></a>
          <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
</center>

<div><br></br></div>
<?php if(!isset($_GET[cod])){?>
<div><a href="index.php?controlador=opcionesUsuario&amp;opcion=svaloracion"><img alt="volver" height="60" style="margin-left: 20%;" src="./vistas/images/return.png"></img></a></div>
<?php }else{?>
<div><a href="index.php?controlador=opcionesAdministrador&amp;opcion=usuarios"><img alt="volver" height="60" style="margin-left: 20%;" src="./vistas/images/return.png"></img></a></div>
<?php }?>
<div><br></br><br></br></div>	
		
<div id="footer">
	<p>Copyright &copy; 2011 . Designed by <a> <strong>Melli</strong></a></p>
</div>
</body>
</html> 