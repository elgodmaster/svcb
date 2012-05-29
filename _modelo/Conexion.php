<?php
 /* DATOS DE CONEXIÓN A LA BBDD */
 function conexion()
 {
	 $server= "localhost";
	 $user= "artebism_svcb";
	 $pass="nxzdt23!12";
	 $db="artebism_svcb";
	 
	 if (!($link=mysql_connect($server,$user,$pass,true,65536)))
	 {
		 echo "Error conectando a la base de datos.";
		 exit();
	 }
	 if (!mysql_select_db($db,$link))
	 {
		 echo "Error seleccionando la base de datos.";
		 exit();
	 }
	 return $link;
 }

 /*CERRAR CONEXIÓN A BBDD*/
 function close($link)
 {
	 mysql_close($link);
 }
	 
 /*class Conexion
 {
	 //Variables de la clase Conexion
	 var $baseDatos;
	 var $servidor;
	 var $usuario;
	 var $clave;
	 var $conexion_ID;
	 var $consulta_ID;
	 var $errno = 0;	 
	 var $error = "";
	 
	 //Constructor de la clase Conexion
	 function Conexion()
	 {
		 $this->baseDatos  = "artebismarck";
		 $this->servidor = "localhost";
		 $this->usuario = "admin_ab";
		 $this->clave = "nxzdt23!12";
	 }
	 
	 //Metodo para conectarse a la base de datos
	function conectar() {
		$this->conexion_ID = mysql_connect ($this->servidor, $this->usuario, $this->clave);
		if (!$this->conexion_ID) {
			$this->error = "Ha fallado la conexion.";
			return 0;
		}
		
		if (!@mysql_select_db($this->baseDatos, $this->conexion_ID)) {
			$this->error = "Imposible abrir" .$this->baseDatos;
			return 0;
		}
		return $this->conexion_ID;
	}
}*/
?>