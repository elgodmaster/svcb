<?php  
	require_once("conexion.php");
	$search_term = mysql_real_escape_string($_POST['id']);
	$query = mysql_query("SELECT * FROM producto WHERE nombre_producto = '$search_term'");
	$row = mysql_fetch_object($query);
	$jsondata['precio_producto'] = $row->precio_producto;
	//$jsondata['total_producto'] = $row->total_producto;	
	
	/*$comuna = $row->comuna_id_comuna;
	$query2 = mysql_query("SELECT * FROM comuna WHERE id_comuna = '$comuna'");
	$row2 = mysql_fetch_object($query2);
	$jsondata['comuna_id_comuna'] = $row2->nombre_comuna;
	$provincia = $row2->provincia_id_provincia;
	$query3 = mysql_query("SELECT * FROM provincia WHERE id_provincia = '$provincia'");
	$row3 = mysql_fetch_object($query3);
	$jsondata['nombre_comuna'] = $row3->nombre_provincia;*/
	echo json_encode($jsondata); 
?>