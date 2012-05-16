<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Sistema Reventa Entradas Teatro</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="./vistas/css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="./vistas/programas.js" type="text/javascript"></script>
<script language="javascript" src="./vistas/popcalendar.js" type="text/javascript"></script>
<script type="text/javascript">
function volver(){
	parent.location.href='index.php?controlador=opcionesUsuario&amp;opcion=entradas';
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
			<li><a href="index.php?controlador=acceso" accesskey="3" title="Administracion">Administracion</a></li>
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
      <td><input title="Usuarios" type="text" name="nick" size="28"></input></td>
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
   </table></td></tr>   
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
			<div class="tituloTabla">Formulario Para Modificar una Entrada</div>
		</td>
	</tr>
	</table>	
	<table align="center" width="100%" class="bordeTablaGris">
	<tr valign="baseline">
      <td  align="right" class="letraLogin">Tipo de Espectaculo:</td>
      <td><select title="Tipo Espectaculos" name="tipos" onchange="elijo_espectaculo()">
      <option value="<?php echo $row_MODIFICAR['tipoEspectaculo'] ?>"><?php echo $row_MODIFICAR['tipoEspectaculo'] ?></option>
     <?php  
		echo '';
		while ($row_Listado4=mysql_fetch_array($Listado4)){ 
     		echo ' <option value="'.$row_Listado4["NombreEspectaculo"].'">'.$row_Listado4["NombreEspectaculo"].'</option>'; 
    	} ?>
    	</select></td>
    </tr>
    <tr valign="baseline">
      <td align="right" class="letraLogin">Tipo:</td>
     	<td><select title="Genero" name="Genero"> 
			<option value="<?php echo $row_MODIFICAR['Genero']; ?>"><?php echo $row_MODIFICAR['Genero']; ?></option>
		</select></td> 
    </tr>
	<tr valign="baseline">
      <td align="right" class="letraLogin">Nombre del Evento:</td>
      <td><input title="Evento" type="text" name="Evento" value="<?php echo $row_MODIFICAR['Evento']; ?>" size="32" class="inputTexto"></input></td>
    </tr>	
     <tr valign="baseline">
      <td align="right" class="letraLogin">Lugar:</td>
      <td><input title="Lugar" type="text" name="Lugar" value="<?php echo $row_MODIFICAR['Lugar']; ?>" size="32" class="inputTexto"></input></td>
    </tr>
    <tr valign="baseline">
      <td align="right" class="letraLogin">Provincia:</td>
       <?php  echo '<td><select title="Provincia" name="Provincia">';  
      		  echo ' <option value="'.$row_MODIFICAR['Provincia'].'">'.$row_MODIFICAR['Provincia'].'</option>'; 	 
  			  while ($row_Listado1=mysql_fetch_array($Listado1)){ 
    		  echo ' <option value="'.$row_Listado1["Provincia"].'">'.$row_Listado1["Provincia"].'</option>';} 
  			  echo ' </select><td>';  
		?>
    </tr>
    <tr valign="baseline">
      <td align="right" class="letraLogin">Fecha:</td>
      <td><input title="Fecha" type="text" name="Fecha" value="<?php echo $row_MODIFICAR['Fecha']; ?>" size="10" class="inputTexto" id="dateArrival" readonly="readonly"/><img alt="Calendario" src="./vistas/img/week_f2.png" onclick="popUpCalendar(this, form2.dateArrival, 'yyyy/mm/dd');" width="24px" height="24px" title="Abrir calendario" style="cursor:pointer;" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" class="letraLogin">Precio:</td>
      <td><input title="Precio" type="text" name="Precio" value="<?php echo $row_MODIFICAR['Precio']; ?>" size="32" class="inputTexto"></input></td>
    </tr>
     <tr valign="baseline">
      <td align="right" class="letraLogin">Fila:</td>
      <td><input title="Fila" type="text" name="Fila" value="<?php echo $row_MODIFICAR['Fila']; ?>" size="32" class="inputTexto"></input></td>
    </tr>
	<tr valign="baseline">
      <td align="right" class="letraLogin">Asiento:</td>
      <td><input title="Asiento" type="text" name="Asiento" value="<?php echo $row_MODIFICAR['Asiento']; ?>" size="32" class="inputTexto"></input></td>
    </tr>
    <tr valign="baseline">
      <td align="right" class="letraLogin">Descripcion:</td>
    </tr>
    <tr valign="baseline">
     <td align="right" class="letraLogin"></td>
      <td><textarea title="Descripcion" name="Descripcion" cols="24" rows="5" class="inputTexto"><?php echo $row_MODIFICAR['Descripcion']; ?></textarea></td>
    </tr>
    
   </table>    
    <table align="center">
 		<tr valign="baseline">
      <td  >&nbsp;</td>
     <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input title="Volver" type="button" value="Volver" onclick="volver()" class="inputTexto"></input><input title="Modificar" type="submit" value="Modificar" class="inputTexto"></input></td>
    </tr>
  	</table>
	<div><input type="hidden" name="MM_update" value="form1"></input></div>
	<div><input type="hidden" name="id" value="<?php echo $row_MODIFICAR['idEntrada']; ?>"></input></div>
</form>
	<div style="clear: both;">&nbsp;</div>
<div><br></br><br></br><br></br></div>
<div id="footer">
	<p>Copyright &copy; 2011 . Designed by <a> <strong>Melli</strong></a></p>
</div>
</body>
</html>
<?php
mysql_free_result($MODIFICAR);
?>