<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Sistema Reventa Entradas Teatro</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="./vistas/css/default.css" rel="stylesheet" type="text/css" />
<link href="./vistas/css/principal.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../login/programas.js" type="text/javascript"></script>
<script>
function volver(){
	parent.location.href='menu.php';
}
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
			<li><a href="index.php?controlador=administrador" accesskey="3" title="Administracion">Administracion	</a></li>
			<li><a href="./vistas/foro/index.php" accesskey="4" title="Sobre Nosotros">Foro</a></li>
			<li><a href="./vistas/contacto/contactform.htm" accesskey="5" title="Contacta">Contacta</a></li>
		</ul>
	</div>
</div>

<div id="splash"><img src="./vistas/img/Portada.jpg" alt="" width="500" height="120" style="margin-left: 15%;" /></div>
<div><br></br></div>
    
 <table border="0" align="center" width="100%">
   <tr class="letraCabeceraListado">
    <td>Nombre</td>
    <td>Apellidos</td>
    <td>Nombre de Usuario</td>
    <td>Email</td>
    <td>Activado</td>
    <td>Puntuacion</td>
    <td>Comentarios</td>
    <td>Eliminar</td> 	
  </tr>
   <?php if($totalRows_Listado==0 || $totalRows_Listado== null){  
   }else{ do {    	
   	 ?>
    <tr class="colorFila" align="center">       
      <td><?php echo $row_Listado['Nombre']; ?></td>
      <td><?php echo $row_Listado['Apellidos']; ?></td>
      <td><?php echo $row_Listado['Usuario']; ?></td>
      <td><?php echo $row_Listado['Email']; ?></td>
      <td><?php echo $row_Listado['Activado']; ?></td>
 	  <td><?php echo $row_Listado['puntuacion']; ?></td>
 	  <td><a href="index.php?controlador=opcionesAdministrador&opcion=comentarios&cod=<?php echo $row_Listado['Dni']?>" ><img src="./vistas/img/query.png" height="25" title="Modificar" alt="MODIFICAR"/></a></td>  
 	  <td><a href="index.php?controlador=opcionesAdministrador&opcion=borrar&eliminar=usuarios&cod=<?php echo $row_Listado['Dni']; ?>" onclick="return confirmar('�Est� seguro que desea eliminar el registro?')"><img src="./vistas/img/cancel_f2.png" title="ELIMINAR" alt="ELIMINAR"/></a></td>     
    </tr>
   <?php }  while ($row_Listado = mysql_fetch_assoc($Listado)); }?>  
  </table>
  
  <table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center"><?php if ($pageNum_Listado > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Listado=%d%s", $currentPage, 0, $queryString_Listado); ?>"><img src="./vistas/img/First.gif" border=0></img></a>
          <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center"><?php if ($pageNum_Listado > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Listado=%d%s", $currentPage, max(0, $pageNum_Listado - 1), $queryString_Listado); ?>"><img src="./vistas/img/Previous.gif" border=0></img></a>
          <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_Listado +1 < $totalPages_Listado) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Listado=%d%s", $currentPage, min($totalPages_Listado, $pageNum_Listado + 1), $queryString_Listado); ?>"><img src="./vistas/img/Next.gif" border=0></img></a>
          <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_Listado +1 < $totalPages_Listado) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Listado=%d%s", $currentPage, $totalPages_Listado, $queryString_Listado); ?>"><img src="./vistas/img/Last.gif" border=0></img></a>
          <?php } // Show if not last page ?>
    </td>
  </tr>
 
</table>
<?php if($totalRows_Listado==0 || $totalRows_Listado== null){?><div><br></br><a style="margin-left: 45%;font-size: medium;"><?php  echo "No hay resultados disponibles";} ?> </a></div>
<div><br></br><br></br></div>
<div><a href="index.php?controlador=administrador"><img alt="100" height="60" style="margin-left: 20%;" src="./vistas/images/return.png"></img></a></div>

<div><br></br><br></br><br></br></div>
<div id="footer">
	<p>Copyright &copy; 2011 . Designed by <a> <strong>Melli</strong></a></p>
</div>
</body>
</html>