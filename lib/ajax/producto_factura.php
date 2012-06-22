<?php  
	require_once("conexion.php");
	$search_term = mysql_real_escape_string($_POST['id']);
	$query = mysql_query("SELECT * FROM producto WHERE nombre_producto = '$search_term'");
	$row = mysql_fetch_object($query);
	$jsondata['precio_producto'] = $row->precio_producto;
	echo json_encode($jsondata); 
?>