<?php
 class Cliente
 {
	 //Variables de la clase Cliente
	 private $id_cliente;
	 private $nombre_cliente;
	 private $direccion_cliente;
	 private $telefono_cliente;
	 private $email_cliente;
	 private $indice_confiabilidad;
	 private $giro_cliente;
	 private $estado_cliente;
	 
	 //Constructor de la clase Cliente 
	 public function __construct($id_cliente,$nombre_cliente,$direccion_cliente,$telefono_cliente,$email_cliente,$giro_cliente)
	 {
		 $this->id_cliente = $id_cliente;
		 $this->nombre_cliente = $nombre_cliente;
		 $this->direccion_cliente = $direccion_cliente;
		 $this->telefono_cliente = $telefono_cliente;
		 $this->email_cliente = $email_cliente;
		 $this->giro_cliente = $giro_cliente;
	 }
	 
	 //Get de la clase Cliente
	 function getIdCliente()
	 {
		 return $this->id_cliente;
	 }
	
	 function getNombreCliente()
	 {
		 return $this->nombre_cliente;
	 }
	 
	 function getDireccionCliente()
	 {
		 return $this->direccion_cliente;
	 }
	
	 function getTelefonoCliente()
	 {
		 return $this->telefono_cliente;
	 }
	
	 function getEmailCliente()
	 {
		 return $this->email_cliente;
	 }
	
	 function getIndiceConfiabilidadCliente()
	 {
		 return $this->indice_confiabilidad;
	 }
	
	 function getGiroCliente()
	 {
		 return $this->giro_cliente;
	 }
	 
	 function getEstadoCliente()
	 {
		 return $this->estado_cliente;
	 }
	
	 //Set de la clase Cliente
	 function setIdCliente($id_cliente)
	 {
		 $this->id_cliente = $id_cliente;
	 }
	
	 function setNombreCliente($nombre_cliente)
	 {
		 $this->nombre_cliente = $nombre_cliente;
	 }
	
	 function setDireccionCliente($direccion_cliente)
	 {
		 $this->direccion_cliente = $direccion_cliente;		
	 }
	
	 function setTelefonoCliente($telefono_cliente)
	 {
		 $this->telefono_cliente = $telefono_cliente;
	 }
	
	 function setEmailCliente($email_cliente)
	 {
		 $this->email_cliente = $email_cliente;
	 }
	
	 function setIndiceConfiabilidadCliente($indice_confiabilidad)
	 {
		 $this->indice_confiabilidad = $indice_confiabilidad;
	 }
	
	 function setGiroCliente($giro_cliente)
	 {
		 $this->giro_cliente = $giro_cliente;		
	 }
	 
	 function setEstadoCliente($estado_cliente)
	 {
		 $this->estado_cliente = $estado_cliente;
	 }
 } 
?>