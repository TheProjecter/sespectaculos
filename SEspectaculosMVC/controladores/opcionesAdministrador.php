<?php
$valor=$_GET['opcion'];

if( $valor=="solicitudes"){
require 'modelos/gsolicitudesModelo.php';
require 'vistas/administrador/gsolicitudes.php';
}

if($valor=="entradas"){
require 'modelos/gentradasModelo.php';
require 'vistas/administrador/gentradas.php';
}

if($valor=="usuarios"){
require 'modelos/gusuarioModelo.php';
require 'vistas/administrador/gusuarios.php';
}

if($valor=="categorias"){
require 'modelos/gcategoriaModelo.php';
require 'vistas/administrador/gcategoria.php';
}

if($valor=="anuncios"){
require 'modelos/gModelo.php';
require 'vistas/administrador/ganuncios.php';
}

if($valor=="menuAnuncios"){
require 'vistas/administrador/menuAnuncios.php';
}

if($valor=="cargar"){
require 'modelos/ganunciosModelo.php';
}

if($valor=="lanuncios"){
require 'modelos/lanunciosModelo.php';
require 'vistas/administrador/lanuncios.php';
}

if($valor=="modificar"){
require 'modelos/modificarInformacionModelo.php';
require 'vistas/administrador/modificar.php';
}

if($valor=="borrar"){
require 'modelos/eliminarAdministradorModelo.php';
}

if($valor=="comentarios"){
require 'modelos/lectorComentariosModelo.php';
require 'vistas/usuarios/Comentarios.php';
}

if($valor=="informacion"){
require 'modelos/informacionEspectaculoModelo.php';
require 'vistas/administrador/informacionEspectaculo.php';
}