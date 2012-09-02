<?php
 //validamos que este iniciada una sesion
 include("seguridad.php");
 
 //La carpeta donde buscaremos los controladores
 $carpetaControladores = "_controlador/";

 if(!empty($_GET['controlador']))
 	$controlador = ucfirst($_GET['controlador']);

 if(!empty($_GET['accion']))
 	$accion = $_GET['accion'];

 //Ya tenemos el controlador y la accion

 //Formamos el nombre del fichero que contiene nuestro controlador
 $controlador = $carpetaControladores . $controlador . 'Controlador.php';

 //Incluimos el controlador o detenemos todo si no existe
 if(is_file($controlador))
 	require_once $controlador;
 else
 	die('El controlador no existe - 404 not found');

 //Llamamos la accion o detenemos todo si no existe
 if(is_callable($accion))
 	$accion();
 else
 	die('La accion no existe - 404 not found');
?>