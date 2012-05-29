<?php
 
 function ingresar()
 {
	 if (isset($_REQUEST['txtRut']))
	 {
		 /*require("_modelo/Cliente.php");
		 require("_modelo/Usuario.php");
		 require("_modelo/Comuna.php");
		 
		 $cliente = new Cliente();		 
		 $cliente->setIdCliente(addslashes($_REQUEST['txtRut']));
		 $cliente->setNombreCliente(addslashes($_REQUEST['txtNombre']));
		 $cliente->setDireccionCliente(addslashes($_REQUEST['txtDireccion']));
		 $cliente->setTelefonoCliente($_REQUEST['txtTelefono']);
		 $cliente->setEmailCliente(addslashes($_REQUEST['txtEmail']));
		 $cliente->setGiroCliente(addslashes($_REQUEST['txtGiro']));
		 $comuna = new Comuna();
		 $comuna->setIdComuna($_REQUEST['cboComuna']);
		 
		 $admin = new Administrador(); //arreglar que ingrese las weas con cliente GET
	 	 $clientex = $admin->ingresarCliente($id_cliente,$nombre_cliente,$direccion_cliente,$telefono_cliente,$email_cliente,	
		 $giro_cliente,$id_comuna);
		 
		 while ($registro = mysql_fetch_array($clientex))
		 {
			 $existe = $registro['v_existe'];			 
		 }
		 
		 if ($existe == 0)
			 echo "El cliente '$id_cliente' ha sido registrado satisfactoriamente";
		 else
		 	 echo "El cliente '$id_cliente' existe en el sistema";*/
	 }
	 else
		 require("_vista/ingresarCliente.php");
 }

 function listar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 require("_modelo/Cliente.php");
		 require("_modelo/Usuario.php");
		 require("_modelo/Comuna.php");
		 
		 $nombre_cliente = $_REQUEST['txtNombre'];
		 
		 $admin = new Administrador();
	 	 $clientex = $admin->listarCliente($nombre_cliente);
	 
		 $num_rows = mysql_num_rows($clientex);
	 
		 if($num_rows != 0)
	 	 {
			 while ($registro = mysql_fetch_assoc($clientex))
			 {
				 $cliente = new Cliente();
			 	 $cliente->setIdCliente($registro['id_cliente']);
			 	 $cliente->setNombreCliente($registro['nombre_cliente']);
			 	 $cliente->setDireccionCliente($registro['direccion_cliente']);
		 		 $cliente->setTelefonoCliente($registro['telefono_cliente']);
		 	 	 $cliente->setEmailCliente($registro['mail_cliente']);
		 	 	 $cliente->setGiroCliente($registro['giro_cliente']);
		 	 	 $cliente->setIndiceConfiabilidadCliente($registro['indice_confiabilidad']);
				 $cliente->setEstadoCliente($registro['estado_cliente']);
		 	 	 $comuna = new Comuna();
			 	 $comuna->setIdComuna($registro['comuna_id_comuna']);
			 	 $comuna->setNombreComuna($registro['nombre_comuna']);
			 }
			 
		 	 require("_vista/listarCliente.php");
		 }
		 else
		 	 echo "El cliente '$nombre_cliente' no existe en el sistema";
			 exit;
	 }
	 else
		 require("_vista/buscarCliente.php");
 }
 
 function modificar()
 {
 }
 
 function eliminar()
 {
 }
 
?>