<?php  
	require_once("conexion.php");
	$search_term = mysql_real_escape_string($_POST['id']);
	$query = mysql_query("SELECT * FROM cliente WHERE nombre_cliente = '$search_term'");
	$row = mysql_fetch_object($query);
	$jsondata['id_cliente'] = $row->id_cliente;
	$jsondata['nombre_cliente'] = $row->nombre_cliente;
	$jsondata['direccion_cliente'] = $row->direccion_cliente;
	$jsondata['telefono_cliente'] = $row->telefono_cliente;
	$jsondata['mail_cliente'] = $row->mail_cliente;
	$jsondata['giro_cliente'] = $row->giro_cliente;
	$jsondata['comuna_id_comuna'] = $row->comuna_id_comuna;
	echo json_encode($jsondata); 
?>