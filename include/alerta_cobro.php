<?php
 $controlador = '_controlador/VendedorControlador.php';
 $accion = 'alertacobros';
 if(is_file($controlador))
 	require_once $controlador;
 if(is_callable($accion))
 	$accion();
?>