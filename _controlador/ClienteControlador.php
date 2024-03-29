<?php

 require("_modelo/Cliente.php");
 require("_modelo/Comuna.php");
 require("_modelo/Usuario.php");
 require("_modelo/FabricaCliente.php");
 require("_modelo/FabricaUsuario.php");
 
 function ingresar()
 {
	 if (isset($_REQUEST['txtRUN']) && isset($_REQUEST['txtNombre']) && isset($_REQUEST['txtDireccion']) 
	 	&& isset($_REQUEST['cboComuna']) && isset($_REQUEST['txtTelefono']) && isset($_REQUEST['txtEmail']) 
	 	&& isset($_REQUEST['txtGiro']))
	 {
		 $id_cliente = (addslashes($_REQUEST['txtRUN']));
		 $nombre_cliente = (addslashes(strtoupper($_REQUEST['txtNombre'])));
		 $direccion_cliente = (addslashes(strtoupper($_REQUEST['txtDireccion'])));
		 $telefono_cliente = ($_REQUEST['txtTelefono']);
		 $email_cliente = (addslashes(strtoupper($_REQUEST['txtEmail'])));
		 $giro_cliente = (addslashes(strtoupper($_REQUEST['txtGiro'])));
		 
		 $cliente = FabricaCliente::crearCliente($id_cliente,$nombre_cliente,$direccion_cliente,$telefono_cliente,$email_cliente,$giro_cliente);
		 
		 $comuna = new Comuna();
		 $comuna->setIdComuna($_REQUEST['cboComuna']);
		 
		 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
	 	 $clientex = $admin->ingresarCliente($cliente->getIdCliente(),$cliente->getNombreCliente(),$cliente->getDireccionCliente(),
		 									 $cliente->getTelefonoCliente(),$cliente->getEmailCliente(),$cliente->getGiroCliente(),
											 $comuna->getIdComuna());
		 
		 while ($registro = mysql_fetch_array($clientex))
		 {
			 $existe = $registro['v_existe'];	
			 break;
		 }
		 
		 if ($existe == 0)
			 echo "<label>El cliente '".$cliente->getNombreCliente()."' ha sido registrado satisfactoriamente.</label>";
		 else
		 	 echo "<label>El cliente '".$cliente->getNombreCliente()."' existe en el sistema.</label>";
	 }
	 else
		 require("_vista/ingresarCliente.php");
 }

 function listar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {		 
		 $nombre_cliente = $_REQUEST['txtNombre'];
		 
		 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
	 	 $clientex = $admin->listarCliente($nombre_cliente);
	 
		 $num_rows = mysql_num_rows($clientex);
	 
		 if($num_rows != 0)
	 	 {
			 $registro = mysql_fetch_assoc($clientex);
			 
			 $id_cliente = $registro['id_cliente'];
			 $nombre_cliente = utf8_encode($registro['nombre_cliente']);
			 $direccion_cliente = utf8_encode($registro['direccion_cliente']);
			 $telefono_cliente = utf8_encode($registro['telefono_cliente']);
			 $email_cliente = utf8_encode($registro['mail_cliente']);
			 $giro_cliente = utf8_encode($registro['giro_cliente']);
			 
			 $cliente = FabricaCliente::crearCliente($id_cliente,$nombre_cliente,$direccion_cliente,$telefono_cliente,$email_cliente,$giro_cliente);
			 $cliente->setIndiceConfiabilidadCliente($registro['indice_confiabilidad']);
			 $cliente->setEstadoCliente($registro['estado_cliente']);
			 
			 $comuna = new Comuna();
			 $comuna->setIdComuna($registro['comuna_id_comuna']);
			 $comuna->setNombreComuna(utf8_encode($registro['nombre_comuna']));
			 			 
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
	 require("_modelo/Provincia.php");
	 require("_modelo/Region.php");	 
	 
	 if (isset($_REQUEST['txtNombre']))
	 {
		 $nombre_cliente = $_REQUEST['txtNombre'];
	 
	 	 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
	 	 $clientex = $admin->listarCliente($nombre_cliente);
		
		 $num_rows = mysql_num_rows($clientex);
		
		 if($num_rows != 0)
		 {
			 $registro = mysql_fetch_assoc($clientex);
			 
			 $id_cliente = $registro['id_cliente'];
			 $nombre_cliente = utf8_encode($registro['nombre_cliente']);
			 $direccion_cliente = utf8_encode($registro['direccion_cliente']);
			 $telefono_cliente = utf8_encode($registro['telefono_cliente']);
			 $email_cliente = utf8_encode($registro['mail_cliente']);
			 $giro_cliente = utf8_encode($registro['giro_cliente']);
			 
			 $cliente = FabricaCliente::crearCliente($id_cliente,$nombre_cliente,$direccion_cliente,$telefono_cliente,$email_cliente,$giro_cliente);
			 $cliente->setIndiceConfiabilidadCliente($registro['indice_confiabilidad']);
			 $cliente->setEstadoCliente($registro['estado_cliente']);
			 
			 $_SESSION['comuna'] = $registro['comuna_id_comuna'];
			 $_SESSION['provincia'] = $registro['provincia_id_provincia'];
			 $_SESSION['region'] = $registro['region_id_region'];
			 
			 require("_vista/modificarCliente.php");
		 }
		 else
			 echo "<label>El cliente '$nombre_cliente' no existe en el sistema.</label>";
	 }
	 elseif(isset($_REQUEST['txtRUN']) && isset($_REQUEST['txtNombreNuevo']) && isset($_REQUEST['txtDireccionNueva'])
	 		&& isset($_REQUEST['cboComuna']) && isset($_REQUEST['txtTelefonoNuevo']) && isset($_REQUEST['txtEmailNuevo']) 
			&& isset($_REQUEST['txtGiroNuevo']))
	 {
		 $id_cliente = addslashes($_REQUEST['txtRUN']);
		 $nombre_cliente = addslashes(strtoupper($_REQUEST['txtNombreNuevo']));
		 $direccion_cliente = addslashes(strtoupper($_REQUEST['txtDireccionNueva']));
		 $telefono_cliente = addslashes($_REQUEST['txtTelefonoNuevo']);
		 $email_cliente = addslashes(strtoupper($_REQUEST['txtEmailNuevo']));
		 $giro_cliente = addslashes(strtoupper($_REQUEST['txtGiroNuevo']));
		 
		 $cliente = FabricaCliente::crearCliente($id_cliente,$nombre_cliente,$direccion_cliente,$telefono_cliente,$email_cliente,$giro_cliente);
		 
		 if (isset($_REQUEST['cboEstado']))
			 $cliente->setEstadoCliente(addslashes(strtoupper($_REQUEST['cboEstado'])));
		 else
		 	 $cliente->setEstadoCliente(addslashes('ACTIVO'));
		 
		 $comuna = new Comuna();
		 $comuna->setIdComuna($_REQUEST['cboComuna']);
		 
		 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
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
		 $nombre_cliente = $_REQUEST['txtNombre'];
		 		 
		 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
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