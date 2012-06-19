<?php
 class Provincia
 {
	 //Variables de la clase Ciudad
	 private $id_provincia;
	 private $nombre_provincia;
	 
	 function listarProvincia($codigo)
	 {
		 $link = conexion();
		 $query = "SELECT id_provincia, nombre_provincia FROM provincia WHERE region_id_region = '$codigo'";
		 $consulta = mysql_query($query,$link);
		 close($link);
		 $num_total_registros = mysql_num_rows($consulta);
		 if($num_total_registros>0)
			 return $consulta;
		 else
			 return false;
	 }
	 
	 //Get de la clase Ciudad
	 function getIdProvincia()
	 {
		 return $this->id_provincia;
	 }
	 
	 function getNombreProvincia()
	 {
		 return $this->nombre_provincia;	 
	 }
	 
	 //Set de la clase Provincia
	 function setIdProvincia($id_provincia)
	 {
		 $this->id_provincia = $id_provincia;
	 }
	 
	 function setNombreProvincia($nombre_provincia)
	 {
		 $this->nombre_provincia = $nombre_provincia;
	 }
 }
?>