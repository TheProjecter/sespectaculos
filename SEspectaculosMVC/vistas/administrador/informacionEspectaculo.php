<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Sistema Reventa Entradas Teatro</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="./vistas/css/default.css" rel="stylesheet" type="text/css" />
<link href="./vistas/css/principal.css" rel="stylesheet" type="text/css" />
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
			<li><a href="#" accesskey="3" title="Administracion">Administracion	</a></li>
			<li><a href="./vistas/foro/index.php" accesskey="4" title="Sobre Nosotros">Foro</a></li>
			<li><a href="./vistas/contacto/contactform.htm" accesskey="5" title="Contacta">Contacta</a></li>
		</ul>
	</div>
</div>


<div id="splash"><img src="./vistas/img/Portada.jpg" alt="" width="500" height="120" style="margin-left: 15%;" /></div>
<div><br></br></div>
    
<div id= "informacion">
	<img src="<?php echo  $row_Listado['Ruta']?>" alt="Gestor de usuarios" title="Gestor de Usuarios" width="450" height="350"></img><br /><br />		
	<h3 id="ficha">Ficha Tecnica </h3><br />
    <a id="titulos">Nombre del Espectaculo: </a><a>    <?php echo $row_Listado['NombreEspectaculo']?></a><br></br>
    <a id="titulos">Tipo: </a><a>  <?php  echo $row_Listado['Tipo']?></a><br></br>
    <a id="titulos">Lugar: </a><a>  <?php echo  $row_Listado['Lugar']?></a><br></br>
    <a id="titulos">Fecha: </a><a>  <?php echo $row_Listado['Fecha']?></a><br></br>
    <a id="titulos"> Precio: </a><a>  <?php echo $row_Listado['Precio']?></a><br></br>
    <a id="titulos">Fecha:  </a><a>	  <?php echo  $row_Listado['Fecha']?></a><br></br>	
</div>
  
<div><br></br><br></br></div>
<div><a href="index.php"><img alt="100" height="60" style="margin-left: 20%;" src="./vistas/images/return.png"></img></a></div>
<div><br></br><br></br><br></br></div>	
		
<div id="footer">
	<p>Copyright &copy; 2011 . Designed by <strong>Melli</strong></p>
</div>

</body>
</html>   