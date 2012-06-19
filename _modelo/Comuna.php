<?php
 class Comuna
 {
	 //Variables de la clase Comuna
	 private $id_comuna;
	 private $nombre_comuna;
	 
	 function listarComuna($codigo)
	 {
		 $link = conexion();
		 $query = "SELECT id_comuna, nombre_comuna FROM comuna WHERE provincia_id_provincia = '$codigo'";
		 $consulta = mysql_query($query,$link);
		 close($link);
		 $num_total_registros = mysql_num_rows($consulta);
		 if($num_total_registros>0)
			 return $consulta;
		 else
			 return false;
	 }
	 
	 //Get de la clase Comuna
	 function getIdComuna()
	 {
		 return $this->id_comuna;
	 }
	 
	 function getNombreComuna()
	 {
		 return $this->nombre_comuna;
	 }
	 
	 //Set de la clase Comuna
	 function setIdComuna($id_comuna)
	 {
		 $this->id_comuna = $id_comuna;
	 }
	 
	 function setNombreComuna($nombre_comuna)
	 {
		 $this->nombre_comuna = $nombre_comuna;		 
	 }	 
 }
?>