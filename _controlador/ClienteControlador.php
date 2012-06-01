<?php
 
 function ingresar()
 {
	 if (isset($_REQUEST['txtRUN']) && isset($_REQUEST['txtNombre']) && isset($_REQUEST['txtDireccion']) 
	 	&& isset($_REQUEST['cboComuna']) && isset($_REQUEST['txtTelefono']) && isset($_REQUEST['txtEmail']) 
	 	&& isset($_REQUEST['txtGiro']))
	 {
		 require("_modelo/Cliente.php");
		 require("_modelo/Usuario.php");
		 require("_modelo/Comuna.php");
		 
		 $cliente = new Cliente();		 
		 $cliente->setIdCliente(addslashes($_REQUEST['txtRUN']));
		 $cliente->setNombreCliente(addslashes(strtoupper($_REQUEST['txtNombre'])));
		 $cliente->setDireccionCliente(addslashes(strtoupper($_REQUEST['txtDireccion'])));
		 $cliente->setTelefonoCliente($_REQUEST['txtTelefono']);
		 $cliente->setEmailCliente(addslashes(strtoupper($_REQUEST['txtEmail'])));
		 $cliente->setGiroCliente(addslashes(strtoupper($_REQUEST['txtGiro'])));
		 $comuna = new Comuna();
		 $comuna->setIdComuna($_REQUEST['cboComuna']);
		 
		 $admin = new Administrador();
	 	 $clientex = $admin->ingresarCliente($cliente->getIdCliente(),$cliente->getNombreCliente(),$cliente->getDireccionCliente(),
		 									 $cliente->getTelefonoCliente(),$cliente->getEmailCliente(),$cliente->getGiroCliente(),
											 $comuna->getIdComuna());
		 
		 while ($registro = mysql_fetch_array($clientex))
		 {
			 $existe = $registro['v_existe'];	
			 break;
		 }
		 
		 if ($existe == 0)
			 echo "El cliente '".$cliente->getIdCliente()."' ha sido registrado satisfactoriamente";
		 else
		 	 echo "El cliente '".$cliente->getIdCliente()."' existe en el sistema";
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
				 break;
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
	 require("_modelo/Cliente.php");
	 require("_modelo/Comuna.php");
	 require("_modelo/Usuario.php");
	 
	 if (isset($_REQUEST['txtNombre']))
	 {
		 $nombre_cliente = $_REQUEST['txtNombre'];
	 
	 	 $admin = new Administrador();
	 	 $clientex = $admin->listarCliente($nombre_cliente);
		
		 $num_rows = mysql_num_rows($clientex);
		
		 if($num_rows != 0)
		 {
			 while ($registro=mysql_fetch_assoc($clientex))
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
				 break;
			 }
			 require("_vista/modificarCliente.php");
		 }
		 else
			 echo("El cliente '$nombre_cliente' no existe en el sistema");		 
	 }
	 elseif(isset($_REQUEST['txtRUN']) && isset($_REQUEST['txtNombreNuevo']) && isset($_REQUEST['txtDireccionNueva'])
	 		&& isset($_REQUEST['cboComunaNueva']) && isset($_REQUEST['txtTelefonoNuevo']) && isset($_REQUEST['cboEstado'])
			&& isset($_REQUEST['txtEmailNuevo']) && isset($_REQUEST['txtGiroNuevo']))
	 {
		 $cliente = new Cliente();
		 $cliente->setIdCliente(addslashes($_REQUEST['txtRUN']));
		 $cliente->setNombreCliente(addslashes(strtoupper($_REQUEST['txtNombreNuevo'])));
		 $cliente->setDireccionCliente(addslashes(strtoupper($_REQUEST['txtDireccionNueva'])));
		 $cliente->setTelefonoCliente($_REQUEST['txtTelefonoNuevo']);
		 $cliente->setEmailCliente(addslashes(strtoupper($_REQUEST['txtEmailNuevo'])));
		 $cliente->setEstadoCliente(addslashes(strtoupper($_REQUEST['cboEstado'])));
		 $cliente->setGiroCliente(addslashes(strtoupper($_REQUEST['txtGiroNuevo'])));
		 $comuna = new Comuna();
		 $comuna->setIdComuna($_REQUEST['cboComunaNueva']);
		 
		 $admin = new Administrador();
		 $clientexx = $admin->modificarCliente($cliente->getIdCliente(),$cliente->getNombreCliente(),$cliente->getDireccionCliente(),
		 									   $cliente->getTelefonoCliente(),$cliente->getEmailCliente(),$cliente->getEstadoCliente(),
											   $cliente->getGiroCliente(),$comuna->getIdComuna());
		 
		 while ($registro = mysql_fetch_array($clientexx))
		 {
			 $existe = $registro['v_existe'];	
			 break;
		 }
		 
		 if ($existe == 1)
			 echo "El cliente '".$cliente->getIdCliente()."' ha sido modificado satisfactoriamente";
		 else
		 	 echo "El cliente '".$cliente->getIdCliente()."' no existe en el sistema";
	 }	 
	 else
	 	 require("_vista/buscarCliente.php");
 }
 
 function eliminar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 require("_modelo/Usuario.php");
		 
		 $nombre_cliente = $_REQUEST['txtNombre'];
		 		 
		 $admin = new Administrador();
	 	 $clientex = $admin->eliminarCliente($nombre_cliente);
		 
		 while ($registro = mysql_fetch_array($clientex))
		 {
			 $existe = $registro['v_existe'];
			 break;		 
		 }
		 
		 if ($existe != 0)
			 echo "El cliente '$nombre_cliente' ha sido eliminado satisfactoriamente";
		 else
		 	 echo "El cliente '$nombre_cliente' no existe en el sistema";		 
	 }
	 else
	 	 require("_vista/buscarCliente.php");
 } 
?>