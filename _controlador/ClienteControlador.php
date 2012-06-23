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
			 echo "<label>El cliente '".$cliente->getIdCliente()."' ha sido registrado satisfactoriamente.</label>";
		 else
		 	 echo "<label>El cliente '".$cliente->getIdCliente()."' existe en el sistema.</label>";
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
			 	 $cliente->setNombreCliente(utf8_encode($registro['nombre_cliente']));
			 	 $cliente->setDireccionCliente(utf8_encode($registro['direccion_cliente']));
		 		 $cliente->setTelefonoCliente(utf8_encode($registro['telefono_cliente']));
		 	 	 $cliente->setEmailCliente(utf8_encode($registro['mail_cliente']));
		 	 	 $cliente->setGiroCliente(utf8_encode($registro['giro_cliente']));
		 	 	 $cliente->setIndiceConfiabilidadCliente($registro['indice_confiabilidad']);
				 $cliente->setEstadoCliente($registro['estado_cliente']);
		 	 	 $comuna = new Comuna();
			 	 $comuna->setIdComuna($registro['comuna_id_comuna']);
			 	 $comuna->setNombreComuna(utf8_encode($registro['nombre_comuna']));
				 break;
			 }
			 
		 	 require("_vista/listarCliente.php");
		 }
		 else
		 	 echo "<label>El cliente '$nombre_cliente' no existe en el sistema.</label>";
			 exit;
	 }
	 else
		 require("_vista/buscarCliente.php");
 }
 
 function modificar()
 {
	 require("_modelo/Cliente.php");
	 require("_modelo/Comuna.php");
	 require("_modelo/Provincia.php");
	 require("_modelo/Region.php");
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
			 	 $cliente->setNombreCliente(utf8_encode($registro['nombre_cliente']));
			 	 $cliente->setDireccionCliente(utf8_encode($registro['direccion_cliente']));
		 		 $cliente->setTelefonoCliente(utf8_encode($registro['telefono_cliente']));
		 	 	 $cliente->setEmailCliente(utf8_encode($registro['mail_cliente']));
		 	 	 $cliente->setGiroCliente(utf8_encode($registro['giro_cliente']));
		 	 	 $cliente->setIndiceConfiabilidadCliente($registro['indice_confiabilidad']);
				 $cliente->setEstadoCliente($registro['estado_cliente']);
				 $_SESSION['comuna'] = $registro['comuna_id_comuna'];
				 $_SESSION['provincia'] = $registro['provincia_id_provincia'];
				 $_SESSION['region'] = $registro['region_id_region'];
				 break;
			 }
			 require("_vista/modificarCliente.php");
		 }
		 else
			 echo "<label>El cliente '$nombre_cliente' no existe en el sistema.</label>";
	 }
	 elseif(isset($_REQUEST['txtRUN']) && isset($_REQUEST['txtNombreNuevo']) && isset($_REQUEST['txtDireccionNueva'])
	 		&& isset($_REQUEST['cboComuna']) && isset($_REQUEST['txtTelefonoNuevo']) && isset($_REQUEST['txtEmailNuevo']) 
			&& isset($_REQUEST['txtGiroNuevo']))
	 {
		 $cliente = new Cliente();
		 $cliente->setIdCliente(addslashes($_REQUEST['txtRUN']));
		 $cliente->setNombreCliente(addslashes(strtoupper($_REQUEST['txtNombreNuevo'])));
		 $cliente->setDireccionCliente(addslashes(strtoupper($_REQUEST['txtDireccionNueva'])));
		 $cliente->setTelefonoCliente($_REQUEST['txtTelefonoNuevo']);
		 $cliente->setEmailCliente(addslashes(strtoupper($_REQUEST['txtEmailNuevo'])));
		 if (isset($_REQUEST['cboEstado']))
			 $cliente->setEstadoCliente(addslashes(strtoupper($_REQUEST['cboEstado'])));
		 else
		 	 $cliente->setEstadoCliente(addslashes('ACTIVO'));
		 $cliente->setGiroCliente(addslashes(strtoupper($_REQUEST['txtGiroNuevo'])));
		 $comuna = new Comuna();
		 $comuna->setIdComuna($_REQUEST['cboComuna']);
		 
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
			 echo "<label>El cliente '".$cliente->getNombreCliente()."' ha sido modificado satisfactoriamente.</label>";
		 else
		 	 echo "<label>El cliente '".$cliente->getNombreCliente()."' no existe en el sistema.</label>";
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
			 echo "<label>El cliente '$nombre_cliente' ha sido eliminado satisfactoriamente.</label>";
		 else
		 	 echo "<label>El cliente '$nombre_cliente' no existe en el sistema.</label>";
	 }
	 else
	 	 require("_vista/buscarCliente.php");
 } 
?>