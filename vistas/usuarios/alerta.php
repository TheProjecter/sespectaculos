<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Sistema Reventa Entradas Teatro</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="./vistas/css/default.css" rel="stylesheet" type="text/css" />
<link href="./vistas/css/principal.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="./vistas/programas.js"
        type="text/javascript"></script>
<script language="javascript" src="./vistas/popcalendar.js"
        type="text/javascript"></script>
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
        <li><a href="#" accesskey="2" title="Login" onclick="funcion1a()">Login</a></li>
        <li><a href="index.php?controlador=acceso" accesskey="3" title="Administracion">Administracion </a></li>
        <li><a href="./vistas/foro/index.php" accesskey="4" title="Sobre Nosotros">Foro</a></li>
        <li><a href="./vistas/contacto/contactform.htm" accesskey="5" title="Contacta">Contacta</a></li>
                
</ul>
</div>
</div>

<div id="login">
<div id="tabla2" style="display: none;">
<form action="index.php?controlador=ingresar&Accion=usuarios"
        method="post">
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
                <td><input type="text" name="nick" size=28 maxlength=20></input></td>
        </tr>
        <tr valign="baseline">
                <td align="right" class="letraLogin">Contrase&ntilde;a:</td>
                <td><input type="password" name="pass" size=28 maxlength=20></input></td>
        </tr>
</table>
<h1 class="letraLogin" style="text-align: center; color: white;">Si no
estas registrado pincha <a href="index.php?controlador=registro"><strong
        style="color: white;">aqui</strong></a></h1>
<table align="center">
        <tr valign="baseline">
                <td>&nbsp;</td>
                <td><input type="submit" class="boton" value="Ingresar"></input></td>
        </tr>
        </table>
        <?php }else{
                ?>
        <table align="center" width="35%">
                <tr>
                        <td><?php 
                        echo "Usuario:".$_SESSION['usuario'];
                        ?></td>
                </tr>
                <tr>
                        <td><a class="letraLogin" style="text-align: right; color: white;"
                                href="index.php?controlador=usuarios">Mi Zona</a></td>
                </tr>
                <tr>
                        <td><a class="letraLogin" style="text-align: right; color: white;"
                                href="index.php?controlador=salir">Cerrar Seccion</a></td>
                </tr>
                <?php
        } ?>
        </table>

</form>
</div>
</div>
<div id="splash"><img src="./vistas/img/Portada.jpg" alt="" width="500"
        height="120" style="margin-left: 15%;" /></div>
<br></br>
        <?php
        if (empty($row_Listado) ) {
                //echo " 1 ".$_POST['evento']." 2 ".$_POST['lugar']." 3 ".$_POST['fecha']." 4 ".$query_Listado3;
                echo "</br><h3 style='text-align: center;'>No hay resultados para la busqueda o no ha realizado ninguna busqueda </h3>";
        }else {?>
<table border="0" align="center" width="100%">

        <tr class="letraCabeceraListado">
                <td>Nombre Evento</td>
                <td>Provincia</td>
                <td>Lugar</td>
                <td>Resultados</td>
                <td>Eliminar</td>
        </tr>
        <?php
        do {
                if ($row_Listado['idConsulta'] != null || $row_Listado['idConsulta'] != ""){
                        $url="";
                        if($row_Listado['Fecha1']!="0000-00-00"){$url="&Fecha1=".$row_Listado['Fecha1'];}
                        if($row_Listado['Fecha2']!="0000-00-00"){$url=$url."&Fecha2=".$row_Listado['Fecha2'];}
                        if(isset($row_Listado['Evento']) && $row_Listado['Evento']!="")      { $url=$url."&Evento=".$row_Listado['Evento']; }
                        if(isset($row_Listado['Provincia']) && $row_Listado['Provincia']!="")   {$url=$url."&Provincia=".$row_Listado['Provincia'];}
                        if(isset($row_Listado['Lugar']) && $row_Listado['Lugar']!="")       {$url=$url."&Lugar=".$row_Listado['Lugar'];}
                        if($row_Listado['Espectaculo']!=" ")    {$url=$url."&Espectaculo=".$row_Listado['Espectaculo'];}
                        if($row_Listado['Genero']!=" ")         {$url=$url."&Genero=".$row_Listado['Genero'];}

                        //echo $url."</br>";
                        ?>
        <tr class="colorFila" align="center">
                <td><?php echo $row_Listado['Evento']; ?></td>
                <td><?php echo $row_Listado['Provincia']; ?></td>
                <td><?php echo $row_Listado['Lugar']; ?></td>
                <td><a
                        href="index.php?controlador=opcionesUsuario&opcion=buscar<?php echo $url;?>"><img
                        src="./vistas/img/edit_f2.png" title="MODIFICAR" border="0"
                        alt="MODIFICAR" /></a></td>
                <td><a
                        href="index.php?controlador=opcionesUsuario&opcion=borrar&eliminar=alertas&cod=<?php echo $row_Listado['idConsulta']; ?>"
                        onclick="return confirmar('�Est� seguro que desea eliminar el registro?')"><img
                        src="./vistas/img/cancel_f2.png" title="ELIMINAR" border="0"
                        alt="ELIMINAR" /></a></td>
        </tr>
        <?php }} while ($row_Listado = mysql_fetch_assoc($Listado)); ?>

</table>
<table border="0" width="50%" align="center">
        <tr>
                <td width="23%" align="center"><?php if ($pageNum_Listado > 0) { // Show if not first page ?>
                <a
                        href="<?php printf("%s?pageNum_Listado=%d%s", $currentPage, 0, $queryString_Listado); ?>"><img
                        src="./vistas/img/First.gif" border=0></img></a> <?php } // Show if not first page ?>
                </td>
                <td width="31%" align="center"><?php if ($pageNum_Listado > 0) { // Show if not first page ?>
                <a
                        href="<?php printf("%s?pageNum_Listado=%d%s", $currentPage, max(0, $pageNum_Listado - 1), $queryString_Listado); ?>"><img
                        src="./vistas/img/Previous.gif" border=0></img></a> <?php } // Show if not first page ?>
                </td>
                <td width="23%" align="center"><?php if ($pageNum_Listado < $totalPages_Listado) { // Show if not last page ?>
                <a
                        href="<?php printf("%s?pageNum_Listado=%d%s", $currentPage, min($totalPages_Listado, $pageNum_Listado + 1), $queryString_Listado); ?>"><img
                        src="./vistas/img/Next.gif" border=0></img></a> <?php } // Show if not last page ?>
                </td>
                <td width="23%" align="center"><?php if ($pageNum_Listado < $totalPages_Listado) { // Show if not last page ?>
                <a
                        href="<?php printf("%s?pageNum_Listado=%d%s", $currentPage, $totalPages_Listado, $queryString_Listado); ?>"><img
                        src="./vistas/img/Last.gif" border=0></img></a> <?php } // Show if not last page ?>
                </td>
        </tr>
</table>
        <?php }?>
<br></br>
<br></br>
<div><a href="index.php?controlador=usuarios"><img alt="100" height="60"
        style="margin-left: 20%;" src="./vistas/images/return.png"></img></a></div>
<div><br></br><br></br></div>
<div id="footer">
<p>Copyright &copy; 2011 . Designed by <a> <strong>Melli</strong></a></p>
</div>
</body>
</html>