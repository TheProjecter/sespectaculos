<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Sistema Reventa Entradas Teatro</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="./vistas/css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="./vistas/programas.js" type="text/javascript"></script>
<script>
function volver(){
	parent.location.href='index.php?controlador=opcionesAdministrador&opcion=lanuncios';
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
			<li><a href="index.php?controlador=administrador" accesskey="3" title="Administracion">Administracion</a></li>
			<li><a href="./vistas/foro/index.php" accesskey="4" title="Sobre Nosotros">Foro</a></li>
			<li><a href="./vistas/contacto/contactform.htm" accesskey="5" title="Contacta">Contacta</a></li>
		</ul>
	</div>
</div>

<div id="splash"><img src="./vistas/img/Portada.jpg" alt="" width="500" height="120" style="margin-left: 15%;" /></div>
<div><br></br></div>

<form method="post" name="form1" enctype="multipart/form-data" action="<?php echo $editFormAction; ?>" onSubmit="return valida(this);">
	
	<table align="center" width="100%">
	<tr>
		<td class="imgTituloTabla">
			<div class="tituloTabla">Formulario Para Modificar Datos de Usuario</div>
		</td>
	</tr>
	</table>	
	<table align="center" width="100%" class="bordeTablaGris">
	<tr valign="baseline">
      <td align="right" class="letraLogin">Espectaculo:</td>
      <td><input type="text" name="nombre" value="<?php echo $row_MODIFICAR['NombreEspectaculo']; ?>" size="32" class="inputTexto"></input></td>
    </tr>	
     <tr valign="baseline">
      <td  align="right" class="letraLogin">Provincia:</td>
     <?php  
			echo '<td><select name="provincia">';  
			echo ' <option value="'.$row_MODIFICAR["Provincia"].'">'.$row_MODIFICAR["Provincia"].'</option>';	 
  	while ($row_Listado1=mysql_fetch_array($Listado1)){ 
     echo ' <option value="'.$row_Listado1["Provincia"].'">'.$row_Listado1["Provincia"].'</option>'; 
    } 
  
echo ' </select><td>';  
?>
    </tr>
    <tr valign="baseline">
      <td  align="right" class="letraLogin">Tipo de Espectaculo:</td>
      <td><select name="tipos" onchange="elijo_espectaculo()">
     <?php  
		echo '';  
		echo ' <option value="'.$row_MODIFICAR["Tipo"].'">'.$row_MODIFICAR["Tipo"].'</option>';	  
  		while ($row_Listado4=mysql_fetch_array($Listado4)) 
    	{ 
     		echo ' <option value="'.$row_Listado4["NombreEspectaculo"].'">'.$row_Listado4["NombreEspectaculo"].'</option>'; 
    	} ?>
    	</select></td>
    </tr>
    <tr valign="baseline">
      <td  align="right" class="letraLogin">Tipo:</td>
     	<td><select name=genero> 
			<option value="<?php echo $row_MODIFICAR["Genero"]?>"><?php echo $row_MODIFICAR["Genero"]?> </option>
		</select>  </td>
 
    </tr>
    <tr valign="baseline">
      <td align="right" class="letraLogin">Lugar:</td>
      <td><input type="text" name="lugar" value="<?php echo $row_MODIFICAR['Lugar']; ?>" size="32" class="inputTexto"></input></td>
    </tr>
     <tr valign="baseline">
      <td align="right" class="letraLogin">Precio:</td>
      <td><input type="text" name="precio" value="<?php echo $row_MODIFICAR['Precio']; ?>" size="32" class="inputTexto"></input></td>
    </tr>
	<tr valign="baseline">
      <td align="right" class="letraLogin">Fecha:</td>
      <td><input type="text" name="fecha" value="<?php echo $row_MODIFICAR['Fecha']; ?>" size="32" class="inputTexto"></input></td>
    </tr>
    <tr valign="baseline">
      <td align="right" class="letraLogin">Cartel Espectaculo:</td>
      <td><input type="text" name="cartel" value="<?php echo $row_MODIFICAR['Ruta']; ?>" size="32" class="inputTexto"></input><input name="ufile[]" type="file" id="ufile[]" size="50" />  </td>
    </tr>
   </table>    
    <table align="center">
 		<tr valign="baseline">
      <td  >&nbsp;</td>
     <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Volver" onclick="volver()" class="inputTexto"></input><input type="submit" value="Registrar" class="inputTexto"></input></td>
    </tr>
  	</table>
	<div><input type="hidden" name="MM_update" value="form1"></input></div>
    <div><input type="hidden" name="id" value="<?php echo $row_MODIFICAR['idInformacion']; ?>"></input></div>
</form>
	<div style="clear: both;">&nbsp;</div>
<div><br></br><br></br><br></br></div>
<div id="footer">
	<p>Copyright &copy; 2011 . Designed by <a> <strong>Melli</strong></a></p>
</div>
</body>
</html>