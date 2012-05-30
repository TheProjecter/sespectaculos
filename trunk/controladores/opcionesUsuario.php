<?php
$valor=$_GET['opcion'];

if( $valor=="solicitudes"){
require 'modelos/ofertasModelo.php';
require 'vistas/usuarios/ofertas.php';
}

if($valor=="entradas"){
require 'modelos/entradasModelo.php';
require 'vistas/entradas/entradas.php';
}

if($valor=="modificar"){
require 'modelos/modificarModelo.php';
require 'vistas/usuarios/modificar.php';
}

if($valor=="busqueda"){
require 'modelos/busquedaModelo.php';
require 'vistas/usuarios/busqueda.php';
}

if($valor=="insertarEntrada"){
require 'modelos/insertarModelo.php';
require 'vistas/usuarios/insertar.php';
}

if($valor=="alertas"){
require 'modelos/alertasModelo.php';
require 'vistas/usuarios/alerta.php';
}

if($valor=="vendedor"){
require 'modelos/ventaModelo.php';
require 'vistas/usuarios/vendedor.php';
}

if($valor=="comprar"){
require 'modelos/comprarModelo.php';
require 'vistas/entradas/comprar.php';
}

if($valor=="servicios"){
require 'modelos/serviciosModelo.php';
}

if($valor=="gestion"){
require 'modelos/gestionModelo.php';
require 'vistas/entradas/gestion.php';
}

if($valor=="error"){
require 'vistas/entradas/error.php';
}

if($valor=="borrar"){
require 'modelos/eliminarModelo.php';
}

if($valor=="buscar"){
require 'modelos/buscarModelo.php';
require 'vistas/usuarios/buscar.php';
}

if($valor=="interesado"){
require 'modelos/interesadosModelo.php';
require 'vistas/entradas/interesado.php';
}

if($valor=="datos"){
require 'modelos/datosModelo.php';
require 'vistas/usuarios/datos.php';
}

if($valor=="modEntradas"){
require 'modelos/modEntradaModelo.php';
require 'vistas/entradas/modEntrada.php';
}

if($valor=="ultimo"){
require 'modelos/finalModelo.php';
}

if($valor=="fallo"){
require 'vistas/usuarios/fallo.php';
}

if($valor=="ventana"){
require 'vistas/usuarios/ventana.php';
}

if($valor=="comentarios"){
require 'modelos/criticaModelo.php';
require 'vistas/usuarios/comentarios.php';
}

if($valor=="cuestionario"){
require 'modelos/valoracionModelo.php';
require 'vistas/usuarios/valoracion.php';
}

if($valor=="svaloracion"){
require 'vistas/usuarios/gvaloracion.php';
}

if($valor=="lusuarios"){
require 'modelos/lusuariosModelo.php';
require 'vistas/usuarios/lusuarios.php';
}

if($valor=="informacionUsuario"){
require 'modelos/datosModelo.php';
require 'vistas/usuarios/datosUsuario.php';
}