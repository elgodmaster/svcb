<?php  

  $db_host = "localhost";
  $db_username = "artebism_svcb";
  $db_pass = "nxzdt23!12";
  $db_name = "artebism_svcb";

  $conexion = mysql_connect("$db_host","$db_username","$db_pass") or die ("Imposible conectarse a MySQL");
  @mysql_select_db($db_name, $conexion);
  
?>