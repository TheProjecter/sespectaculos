<?session_start();?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Sistema Reventa Entradas Teatro</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="./vistas/css/default.css" rel="stylesheet" type="text/css" />
<link href="./vistas/css/principal.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="./vistas/programas.js" type="text/javascript"></script>
<script language="javascript" src="./vistas/popcalendar.js" type="text/javascript"></script>

<script>
function confirmar ( mensaje ) {
	return confirm( mensaje );
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
<form method="post" name="form1" enctype="multipart/form-data"  action="index.php?controlador=opcionesAdministrador&opcion=cargar">
	
<div id="tabla1">   <!-- Primera Tabla -->
	<table align="center" width="100%">
	<tr>
		<td class="imgTituloTabla">
			<div class="tituloTabla">Insertar Nuevo Espectaculo</div>
		</td>
	</tr>
	</table>	
<table align="center" width="100%" class="bordeTablaGris">
    <tr valign="baseline">
      <td  align="right" class="letraLogin">Nombre Espectaculo:</td>
      <td><input type="text" name="espectaculo" value="" size="50" class="inputTexto"></input></td>
    </tr>
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
      <td  align="right" class="letraLogin">Lugar:</td>
      <td><input type="text" name="lugar" value="" size="50" class="inputTexto"></input></td>
    </tr>
     <tr valign="baseline">
      <td  align="right" class="letraLogin">Fecha:</td>
      <td><input type="text" name="fecha" value="" size="20" class="inputTexto" id="dateArrival" readonly="readonly">&nbsp;<img src="./vistas/img/week_f2.png" onClick="popUpCalendar(this, form1.dateArrival, 'yyyy/mm/dd');" align="absmiddle" width="24px" height="24px" title="Abrir calendario" style="cursor:pointer;" /></input></td>
    </tr>
     <tr valign="baseline">
      <td  align="right" class="letraLogin">Precio:</td>
      <td><input type="text" name="precio" value="" size="10" class="inputTexto"></input></td>
    </tr>
    <tr valign="baseline">
      <td  align="right" class="letraLogin">Cartel del Espectaculo:</td>
      <td><input name="ufile[]" type="file" id="ufile[]" size="50" />  </td>
    </tr>
</table>
 <table align="center">
  <tr valign="baseline">
      <td>&nbsp;</td>
     <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Registrar" class="inputTexto"></input></td>
    </tr>
  	</table>
</div>
<div><input type="hidden" name="MM_insert" value="form1"></input></div>
</form>

<div><a href="index.php?controlador=administrador"><img alt="100" height="60" style="margin-left: 20%;" src="./vistas/images/return.png"></img></a></div>

<div><br></br><br></br><br></br></div>
<div id="footer">
	<p>Copyright &copy; 2011 . Designed by <a> <strong>Melli</strong></a></p>
</div>
</body>
</html>