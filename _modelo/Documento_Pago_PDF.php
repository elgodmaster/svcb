<?php
 class Documento_Pago_PDF
 {
	 //Variables de la clase Documento_Pago_PDF
	 private $id_documento;
	 private $nombre_documento;
	 
	 //Get de la clase Documento_Pago_PDF
	 function getIdDocumento()
	 {
		 return $this->id_documento;
	 }
	 
	 function getNombreDocumento()
	 {
		 return $this->nombre_documento;
	 }
	 
	 //Set de la clase Documento_Pago_PDF
	 function setIdDocumento($id_documento)
	 {
		 $this->id_documento = $id_documento;
	 }
	 
	 function setNombreDocumento($nombre_documento)
	 {
		 $this->nombre_documento = $nombre_documento;
	 }
 }
?>