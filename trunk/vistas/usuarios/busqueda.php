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
      <td align="right" class="letraLogin">Usuario:</td>
      <td><input title="Usuario" type="text" name="nick" size=28 maxlength=20></input></td>
    </tr>
    <tr valign="baseline">
      <td align="right" class="letraLogin">Contrase&ntilde;a:</td>
      <td><input title="contraseña" type="password" name="pass" size=28 maxlength=20></input></td>
    </tr>     
  </table>
  <h1 class="letraLogin" style="text-align: center; color: white;">Si no estas registrado pincha <a href="index.php?controlador=registro"  ><strong style="color: white;">aqui</strong></a></h1>
  <table align="center">
    <tr valign="baseline">
      <td>&nbsp;</td>
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
        <tr><td><a  class="letraLogin" style="text-align: right; color: white;" href="index.php?controlador=salir">Cerrar Seccion</a></td></tr>
    <?php 
    } ?>
   </table>   
  	</table>
      </form>
  	</div>
</div>
<div id="splash"><img src="./vistas/img/Portada.jpg" alt="sespectaculos" width="500" height="120" style="margin-left: 15%;" /></div>
<div><br></br><br></br></div>
<form method="post" name="form1" enctype="multipart/form-data" action="<?php echo $editFormAction; ?>">
	
	<table align="center" width="100%">
	<tr>
		<td class="imgTituloTabla">
			<div class="tituloTabla">Busqueda de Espectaculos</div>
		</td>
	</tr>
	</table>
	
	<table align="center" width="100%" class="bordeTablaGris">
    <tr valign="baseline">
      <td align="right" class="letraLogin">Nombre del Evento:</td>
      <td><input type="text" name="evento" title="Nombre Evento" value="" size="32" class="inputTexto"></input></td>
    </tr>
    
     <tr valign="baseline">
      <td  align="right" class="letraLogin">Lugar:</td>
      <td><input type="text" name="lugar" value="" title="Lugar" size="32" class="inputTexto"></input></td>
    </tr>
     <tr valign="baseline">
      <td  align="right" class="letraLogin">Provincia:</td>
     <?php  echo '<td><select title="Provincia" name="provincia">'; 
      echo ' <option value=""></option>';
 	  while ($row_Listado1=mysql_fetch_array($Listado1)){ 
     	echo ' <option value="'.$row_Listado1["Provincia"].'">'.$row_Listado1["Provincia"].'</option>'; 
    }   echo ' </select><td>'; ?>
    </tr>
     <tr valign="baseline">
      <td  align="right" class="letraLogin">Fecha: Entre</td>
      <td><input title="Fecha Entre" type="text" name="fecha1" value="" size="10" class="inputTexto" id="dateArrival" readonly="readonly">&nbsp;<img alt="calendario" src="./vistas/img/week_f2.png" onclick="popUpCalendar(this, form1.dateArrival, 'yyyy/mm/dd');"  width="24px" height="24px" title="Abrir calendario" style="cursor:pointer;" /></input>
      <input title="y" type="text" name="fecha2" value="" size="10" class="inputTexto" id="dateArriva2" readonly="readonly">&nbsp;<img alt="Calendario" src="./vistas/img/week_f2.png" onclick="popUpCalendar(this, form1.dateArriva2, 'yyyy/mm/dd');"  width="24px" height="24px" title="Abrir calendario" style="cursor:pointer;" /></input></td>
      </tr>
     <tr valign="baseline">
      <td  align="right" class="letraLogin">Tipo de Espectaculo:</td>
      <td><select title="Tipo Espectaculo" name="tipos" onchange="elijo_espectaculo()">
     <?php  
		 
		echo ' <option value=" "></option>';	  
  		while ($row_Listado4=mysql_fetch_array($Listado2)) 
    	{ 
     		echo ' <option value="'.$row_Listado4["NombreEspectaculo"].'">'.$row_Listado4["NombreEspectaculo"].'</option>'; 
    	} ?>
    	</select></td>
    </tr>
    <tr valign="baseline">
      <td  align="right" class="letraLogin">Tipo:</td>
     	<td><select title="Genero" name=genero> 
			<option value=" "> </option>
		</select>  </td>
 
    </tr>
 </table>
   <table align="center">
 		<tr valign="baseline">
      <td  >&nbsp;</td>
     <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input title="volver" type="button" value="Volver" onclick="volver()" class="inputTexto"></input><input title="buscar" type="submit" value="Buscar" class="inputTexto"></input></td>
    </tr>
  	</table>
     <input type="hidden" name="MM_insert" value="form1"></input>
     
</form>
<table border="0" align="center" width="100%">
<?php
if (empty($row_Listado3) ) { 
		//echo " 1 ".$_POST['evento']." 2 ".$_POST['lugar']." 3 ".$_POST['fecha']." 4 ".$query_Listado3;
        echo "</br><h3 style='text-align: center;'>No hay resultados para la busqueda o no ha realizado ninguna busqueda </h3>";
}else {
if ($row_Listado3['idEntrada'] != null || $row_Listado3['idEntrada'] != ""){
?>
   <tr class="letraCabeceraListado">
   <td>Oferta</td>
    <td>Nombre Evento</td>
    <td>Provincia</td>
    <td>Lugar</td>
    <td>Fecha</td>
    <td>Tipo</td>
    <td>Genero</td>
    <td>Precio</td>
    <td>Fila</td>
    <td>Asiento</td>    
  </tr>
   <?php
}
?>
   <?php
  do { 
  if ($row_Listado3['idEntrada'] != null || $row_Listado3['idEntrada'] != ""){
  	
  ?>
    <tr class="colorFila" align="center">
    
      <td><a href="index.php?controlador=opcionesUsuario&opcion=vendedor&entrada=<?php echo $row_Listado3['codEntrada']?>"><img src="./vistas/img/edit_f2.png" title="oferta" border="0" align="absmiddle" alt="oferta"/></a></td>
      <td><?php echo $row_Listado3['Evento']; ?></td>
      <td><?php echo $row_Listado3['Provincia']; ?></td>
      <td><?php echo $row_Listado3['Lugar']; ?></td>  
      <td><?php echo $row_Listado3['Fecha']; ?></td> 
      <td><?php echo $row_Listado3['tipoEspectaculo']; ?></td> 
      <td><?php echo $row_Listado3['Genero']; ?></td>
      <td><?php echo $row_Listado3['Precio']; ?></td> 
      <td><?php echo $row_Listado3['Fila']; ?></td>
      <td><?php echo $row_Listado3['Asiento']; ?></td>
     
      
    </tr>
    <?php }} while ($row_Listado3 = mysql_fetch_assoc($Listado3)); ?>
  
  </table>
  <table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center"><?php if ($pageNum_Listado3 > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Listado3=%d%s", $currentPage, 0, $queryString_Listado); ?>"><img src="./vistas/img/First.gif" alt="Principio"></img></a>
          <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center"><?php if ($pageNum_Listado3 > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Listado3=%d%s", $currentPage, max(0, $pageNum_Listado3 - 1), $queryString_Listado); ?>"><img src="./vistas/img/Previous.gif" alt="Anterior"></img></a>
          <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_Listado3 < $totalPages_Listado2) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Listado3=%d%s", $currentPage, min($totalPages_Listado2, $pageNum_Listado3 + 1), $queryString_Listado); ?>"><img src="./vistas/img/Next.gif" alt="Siguiente"></img></a>
          <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_Listado3 < $totalPages_Listado2) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Listado3=%d%s", $currentPage, $totalPages_Listado2, $queryString_Listado); ?>"><img src="./vistas/img/Last.gif" alt="Ultima"></img></a>
          <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
<?php }?>
<div><br></br><br></br></div>
<div id="footer">
	<p>Copyright &copy; 2011 . Designed by <a> <strong>Melli</strong></a></p>
</div>
</body>
</html>