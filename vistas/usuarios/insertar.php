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
	parent.location.href='index.php?controlador=usuarios';
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
      <td nowrap align="right" class="letraLogin">Usuario:</td>
      <td><input type="text" name="nick" size=28 maxlength=20></input></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right" class="letraLogin">Contrase&ntilde;a:</td>
      <td><input type="password" name="pass" size=28 maxlength=20></input></td>
    </tr>     
  </table>
  <h1 class="letraLogin" style="text-align: center; color: white;">Si no estas registrado pincha <a href="index.php?controlador=registro"  ><strong style="color: white;">aqui</strong></a></h1>
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="">&nbsp;</td>
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
        <td><a  class="letraLogin" style="text-align: right; color: white;" href="index.php?controlador=salir">Cerrar Seccion</a></td>
    <?php 
    } ?>
   </table>   
  	</table>
      </form>
  	</div>
</div>
<div id="splash"><img src="./vistas/img/Portada.jpg" alt="" width="500" height="120" style="margin-left: 15%;" /></div>
<br></br>
<form method="post" name="form1" enctype="multipart/form-data" action="<?php echo $editFormAction; ?>">
	
	<table align="center" width="100%">
	<tr>
		<td class="imgTituloTabla">
			<div class="tituloTabla">Formulario para la insercion de una nueva entrada</div>
		</td>
	</tr>
	</table>
	
	<table align="center" width="100%" class="bordeTablaGris">
	<tr valign="baseline">
      <td  align="right" class="letraLogin">Tipo de Espectaculo:</td>
      <td><select name="tipos" onchange="elijo_espectaculo()">
     <?php  
		echo '';  
		echo ' <option value="">-</option>';	  
  		while ($row_Listado4=mysql_fetch_array($Listado4)) 
    	{ 
     		echo ' <option value="'.$row_Listado4["NombreEspectaculo"].'">'.$row_Listado4["NombreEspectaculo"].'</option>'; 
    	} ?>
    	</select></td>
    </tr>
    <tr valign="baseline">
      <td  align="right" class="letraLogin">Tipo:</td>
     	<td><select name=genero> 
			<option value="-">- </option>
		</select>  </td>
 
    </tr>
    <tr valign="baseline">
      <td  align="right" class="letraLogin">Nombre del Evento:</td>
      <td><input type="text" name="evento"  value="" size="32" class="inputTexto"></input></td>
    </tr>
     <tr valign="baseline">
      <td  align="right" class="letraLogin">Lugar:</td>
      <td><input type="text" name="lugar" value="" size="32" class="inputTexto"></input></td>
      </tr>
    <tr valign="baseline">
      <td  align="right" class="letraLogin">Provincia:</td>
     <?php  
			echo '<td><select name="provincia">';  
			echo ' <option value=""></option>';	 
  	while ($row_Listado1=mysql_fetch_array($Listado1)){ 
     echo ' <option value="'.$row_Listado1["Provincia"].'">'.$row_Listado1["Provincia"].'</option>'; 
    } 
  
echo ' </select><td>';  
?>
    </tr>
     <tr valign="baseline">
      <td  align="right" class="letraLogin">Fecha:</td>
      <td><input type="text" name="fecha" value="" size="10" class="inputTexto" id="dateArrival" readonly="readonly">&nbsp;<img src="./vistas/img/week_f2.png" onClick="popUpCalendar(this, form1.dateArrival, 'yyyy/mm/dd');" align="absmiddle" width="24px" height="24px" title="Abrir calendario" style="cursor:pointer;" /></input></td>
    </tr>
    <tr valign="baseline">
      <td  align="right" class="letraLogin">Precio:</td>
      <td><input type="text" name="precio" value="" size="32" class="inputTexto"></input></td>
    </tr>
     <tr valign="baseline">
      <td  align="right" class="letraLogin">Fila:</td>
      <td><input type="text" name="fila" value="" size="32" class="inputTexto"></input></td>
    </tr>
     <tr valign="baseline">
      <td  align="right" class="letraLogin">Asiento:</td>
      <td><input type="text" name="asiento" value="" size="32" class="inputTexto"></input></td>
    </tr>
    <tr valign="baseline">
      <td  align="right" class="letraLogin">Descripcion:</td>
     </tr>
     <tr valign="baseline">
     <td  align="right" class="letraLogin"></td>
      <td><textarea name="descripcion" cols="24" rows="5" class="inputTexto">Descripcion del Evento</textarea></td>
    </tr>
   </table>    
    <table align="center">
 		<tr valign="baseline">
      <td  >&nbsp;</td>
     <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Volver" onclick="volver()" class="inputTexto"></input><input type="submit" value="Registrar" class="inputTexto"></input></td>
    </tr>
  	</table>
     <input type="hidden" name="MM_insert" value="form1"></input>
</form>


<div style="clear: both;">&nbsp;</div>
<div><br></br><br></br></div>
<div id="footer">
	<p>Copyright &copy; 2011 . Designed by <strong>Melli</strong></p>
</div>
</body>
</html>