<?php
 class Comuna
 {
	 //Variables de la clase Comuna
	 private $id_comuna;
	 private $nombre_comuna;
	 
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