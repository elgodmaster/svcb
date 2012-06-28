<?php  
  require_once("conexion.php");
  
  if(isset($_GET['q']) == true && empty($_GET['q']) == false)
  {
	  $search_term = mysql_real_escape_string($_GET['q']);
	  $query = mysql_query("call consultarCliente('$search_term%')");
	  while(($row = mysql_fetch_assoc($query)) !== false)
	  {
		  $cname = $row['resultado'];
		  echo utf8_encode($cname)."\n";
	  }
  }
?>