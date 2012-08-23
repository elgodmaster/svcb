<?php
	include("InterfazCliente.php");
	
	class FabricaCliente implements InterfazCliente
	{
		static public function crearCliente($id_cliente,$nombre_cliente,$direccion_cliente,$telefono_cliente,$email_cliente,$giro_cliente)
		{
			return new Cliente($id_cliente,$nombre_cliente,$direccion_cliente,$telefono_cliente,$email_cliente,$giro_cliente);
		}		
	}
?>