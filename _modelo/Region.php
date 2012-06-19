<?php
 class Region
 {
	 //Variables de la clase Region
	 private $id_region;
	 private $nombre_region;
	 
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