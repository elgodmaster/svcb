<?php
  require_once("conexion.php");
  $search_term = mysql_real_escape_string($_POST['id']);
  $sql = "SELECT cl.id_cliente, cl.direccion_cliente, cl.telefono_cliente, cl.mail_cliente, cl.giro_cliente, co.nombre_comuna, ";
  $sql.= "pr.nombre_provincia FROM cliente cl, comuna co, provincia pr WHERE cl.comuna_id_comuna = co.id_comuna AND ";
  $sql.= "co.provincia_id_provincia = pr.id_provincia AND nombre_cliente = '$search_term'";
  $query = mysql_query($sql);
  $row = mysql_fetch_object($query);
  $jsondata['id_cliente'] = $row->id_cliente;
  $jsondata['direccion_cliente'] = $row->direccion_cliente;
  $jsondata['telefono_cliente'] = $row->telefono_cliente;
  $jsondata['mail_cliente'] = $row->mail_cliente;
  $jsondata['giro_cliente'] = $row->giro_cliente;
  $jsondata['nombre_comuna'] = $row->nombre_comuna;
  $jsondata['nombre_provincia'] = $row->nombre_provincia;
  echo json_encode($jsondata);
?>