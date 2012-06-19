<?php
 class Region
 {
	 //Variables de la clase Region
	 private $id_region;
	 private $nombre_region;
	 
	 function listarRegion()
	 {
		 $link = conexion();
		 $query = "SELECT id_region, nombre_region FROM region ORDER BY id_region ASC";
		 $consulta = mysql_query($query,$link);
		 close($link);
		 $num_total_registros = mysql_num_rows($consulta);
		 if($num_total_registros>0)
			 return $consulta;
		 else
			 return false;
	 }
	 
	 //Get de la clase Region
	 function getIdRegion()
	 {
		 return $this->id_region;
	 }
	 
	 function getNombreRegion()
	 {
		 return $this->nombre_region;
	 }
	 
	 //Set de la clase Region
	 function setIdRegion($id_region)
	 {
		 $this->id_region = $id_region;
	 }
	 
	 function setNombreRegion($nombre_region)
	 {
		 $this->nombre_region = $nombre_region;
	 }
 }
?>