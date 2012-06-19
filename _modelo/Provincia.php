<?php
 class Provincia
 {
	 //Variables de la clase Ciudad
	 private $id_provincia;
	 private $nombre_provincia;
	 
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