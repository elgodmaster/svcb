<?php  
	require_once("conexion.php");
	$search_term = mysql_real_escape_string($_POST['id']);
	$query = mysql_query("SELECT * FROM producto WHERE nombre_producto = '$search_term'");
	$row = mysql_fetch_object($query);
	$jsondata['id_producto'] = $row->id_producto;
	$jsondata['precio_producto'] = $row->precio_producto;
	$jsondata['stock_real_producto'] = $row->stock_real_producto;
	echo json_encode($jsondata); 
?>