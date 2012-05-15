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
    <?php }else{?>
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
   </table>   
  	</table>
      </form>
  	</div>
</div>
<div id="splash"><img src="./vistas/img/Portada.jpg" alt="sespectaculos" width="500" height="120" style="margin-left: 15%;" /></div>
<div><br></br></div>

<table border="0" align="center" width="100%">
<?php
if (empty($row_Listado) ) { 
		//echo " 1 ".$_POST['evento']." 2 ".$_POST['lugar']." 3 ".$_POST['fecha']." 4 ".$query_Listado3;
        echo "</br><h3 style='text-align: center;'>No hay resultados para la busqueda o no ha realizado ninguna busqueda </h3>";
}else {
if ($row_Listado['idEntrada'] != null || $row_Listado['idEntrada'] != ""){
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
  if ($row_Listado['idEntrada'] != null || $row_Listado['idEntrada'] != ""){
  ?>
    <tr class="colorFila" align="center">
    <td><a href="index.php?controlador=opcionesUsuario&opcion=vendedor&entrada=<?php echo $row_Listado['codEntrada']?>"><img src="./vistas/img/edit_f2.png" title="oferta"  alt="oferta"/></a></td>
      <td><?php echo $row_Listado['Evento']; ?></td>
      <td><?php echo $row_Listado['Provincia']; ?></td>
      <td><?php echo $row_Listado['Lugar']; ?></td>  
      <td><?php echo $row_Listado['Fecha']; ?></td> 
      <td><?php echo $row_Listado['tipoEspectaculo']; ?></td> 
      <td><?php echo $row_Listado['Genero']; ?></td>
      <td><?php echo $row_Listado['Precio']; ?></td> 
      <td><?php echo $row_Listado['Fila']; ?></td>
      <td><?php echo $row_Listado['Asiento']; ?></td> 
      
    </tr>
    <?php }} while ($row_Listado = mysql_fetch_assoc($Listado)); ?>
  
  </table>
  <table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center"><?php if ($pageNum_Listado > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Listado=%d%s", $currentPage, 0, $queryString_Listado); ?>"><img alt="Primera" src="./vistas/img/First.gif"></img></a>
          <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center"><?php if ($pageNum_Listado > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Listado=%d%s", $currentPage, max(0, $pageNum_Listado - 1), $queryString_Listado); ?>"><img alt="Anterior" src="./vistas/img/Previous.gif"></img></a>
          <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_Listado < $totalPages_Listado) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Listado=%d%s", $currentPage, min($totalPages_Listado, $pageNum_Listado + 1), $queryString_Listado); ?>"><img alt="Siguiente" src="./vistas/img/Next.gif"></img></a>
          <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_Listado < $totalPages_Listado) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Listado=%d%s", $currentPage, $totalPages_Listado, $queryString_Listado); ?>"><img alt="Ultima" src="./vistas/img/Last.gif"></img></a>
          <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
<?php }?>
<div><br></br><br></br></div>
<div><a href="index.php?controlador=opcionesUsuario&opcion=alertas"><img alt="100" height="60" style="margin-left: 20%;" src="./vistas/images/return.png"></img></a></div>

<div><br></br><br></br></div>
<div id="footer">
	<p>Copyright &copy; 2011 . Designed by <a> <strong>Melli</strong></a></p>
</div>
</body>
</html>