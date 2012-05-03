<?php
$valor=$_GET['Accion'];
if($valor=="usuarios"){
require 'modelos/ingresarModelo.php';
}else{
require 'modelos/ingresarAdministradorModelo.php';	
}