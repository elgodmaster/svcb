<?php  
  require_once("conexion.php");
  
  if(isset($_GET['q']) == true && empty($_GET['q']) == false)
  {
	  $search_term = mysql_real_escape_string($_GET['q']);
	  $query = mysql_query("SELECT nombre_categoria_producto as resultado FROM categoria_producto WHERE nombre_categoria_producto LIKE 
	  '$search_term%'");
	  while(($row = mysql_fetch_assoc($query)) !== false)
	  {
		  $cname = $row['resultado'];
		  echo utf8_encode($cname)."\n";
	  }
  }
?>