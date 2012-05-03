<?php
$carpetaControladores = "controladores/";

//Si no se indica un controlador, este es el controlador que se usará
$controladorPredefinido = "inicio";

//Si no se indica una accion, esta accion es la que se usará

if(! empty($_GET['controlador']))
      $controlador = $_GET['controlador'];
else
      $controlador = $controladorPredefinido;

//Ya tenemos el controlador 

//Formamos el nombre del fichero que contiene nuestro controlador
$controlador = $carpetaControladores . $controlador . '.php';

//Incluimos el controlador o detenemos todo si no existe
if(is_file($controlador))
      require_once $controlador;
else
      die('El controlador no existe - 404 not found');

