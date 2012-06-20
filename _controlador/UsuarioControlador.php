<?php

 function ingresar()
 {
	 if (isset($_REQUEST['txtRUN']) && isset($_REQUEST['txtPassword']) && isset($_REQUEST['txtNombre']) && isset($_REQUEST['txtApat']) 
	     && isset($_REQUEST['txtAmat']) && isset($_REQUEST['cboUsuario']))
	 {		 
		 require("_modelo/Usuario.php");
		 
		 if ($_REQUEST['cboUsuario'] == 1001)
			 $usuario = new Administrador();
		 elseif ($_REQUEST['cboUsuario'] == 1002)
		 	 $usuario = new Vendedor();
		 elseif ($_REQUEST['cboUsuario'] == 1003)
		 	 $usuario = new Bodeguero();
			 
		 $usuario->setIdUsuario(addslashes($_REQUEST['txtRUN']));
		 $usuario->setPasswordUsuario(addslashes(md5($_REQUEST['txtPassword'])));
		 $usuario->setNombreUsuario(addslashes(strtoupper($_REQUEST['txtNombre'])));
		 $usuario->setApatUsuario(addslashes(strtoupper($_REQUEST['txtApat'])));
		 $usuario->setAmatUsuario(addslashes(strtoupper($_REQUEST['txtAmat'])));
		 
		 $admin = new Administrador();
	 	 $usuariox = $admin->ingresarUsuario($usuario->getIdUsuario(),$usuario->getPasswordUsuario(),$usuario->getNombreUsuario(),
		 									 $usuario->getApatUsuario(),$usuario->getAmatUsuario(),$usuario->getTipoUsuario());
		 
		 while ($registro = mysql_fetch_array($usuariox))
		 {
			 $existe = $registro['v_existe'];	
			 break;
		 }
		 
		 if ($existe == 0)
			 echo "El usuario '".$usuario->getIdUsuario()."' ha sido registrado satisfactoriamente";
		 else
		 	 echo "El usuario '".$usuario->getIdUsuario()."' existe en el sistema";
	 }
	 else
		 require("_vista/ingresarUsuario.php");
 }
 
 function listar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 require("_modelo/Usuario.php");
	 	 
		 $id_usuario = $_REQUEST['txtNombre'];
	 
	 	 $admin = new Administrador();
	 	 $usuariox = $admin->listarUsuario($id_usuario);
		 
		 $num_rows = mysql_num_rows($usuariox);
		
		 if($num_rows != 0)
		 {
			 while ($registro=mysql_fetch_assoc($usuariox))
			 {
				 if ($registro['tipo_usuario_id_tipo_usuario'] == 1001)
				 {
					 $usuario = new Administrador();
					 $tipo_usuario='ADMINISTRADOR';
				 }
			 	 elseif ($registro['tipo_usuario_id_tipo_usuario'] == 1002)
				 {
					 $usuario = new Vendedor();
					 $tipo_usuario='VENDEDOR';
				 }
		 	 	 elseif ($registro['tipo_usuario_id_tipo_usuario'] == 1003)
				 {
					 $usuario = new Bodeguero();
					 $tipo_usuario='BODEGUERO';
				 }
					
				 $usuario->setIdUsuario($registro['id_usuario']);
				 $usuario->setNombreUsuario($registro['nombre_usuario']);
				 $usuario->setApatUsuario($registro['apat_usuario']);
		 		 $usuario->setAmatUsuario($registro['amat_usuario']);
				 $usuario->setEstadoUsuario($registro['estado_usuario']);
				 break;
			 }
			 require("_vista/listarUsuario.php");
		 }
		 else
		 	 echo("El usuario '$id_usuario' no existe en el sistema");
	 }
	 else
	 	 require("_vista/buscarUsuario.php");
 }
 
 function modificar()
 {
	 require("_modelo/Usuario.php");
	 
	 if (isset($_REQUEST['txtNombre']))
	 {
		 $id_usuario = $_REQUEST['txtNombre'];
	 
	 	 $admin = new Administrador();
	 	 $usuariox = $admin->listarUsuario($id_usuario);
		 
		 $num_rows = mysql_num_rows($usuariox);
		
		 if($num_rows != 0)
		 {
			 while ($registro=mysql_fetch_assoc($usuariox))
			 {
				 if ($registro['tipo_usuario_id_tipo_usuario'] == 1001)
				 {
					 $usuario = new Administrador();
					 $tipo_usuario='ADMINISTRADOR';
				 }
			 	 elseif ($registro['tipo_usuario_id_tipo_usuario'] == 1002)
				 {
					 $usuario = new Vendedor();
					 $tipo_usuario='VENDEDOR';
				 }
		 	 	 elseif ($registro['tipo_usuario_id_tipo_usuario'] == 1003)
				 {
					 $usuario = new Bodeguero();
					 $tipo_usuario='BODEGUERO';
				 }
					
				 $usuario->setIdUsuario($registro['id_usuario']);
				 $usuario->setNombreUsuario($registro['nombre_usuario']);
				 $usuario->setApatUsuario($registro['apat_usuario']);
		 		 $usuario->setAmatUsuario($registro['amat_usuario']);
				 $usuario->setEstadoUsuario($registro['estado_usuario']);
				 break;
			 }
			 require("_vista/modificarUsuario.php");
		 }
		 else
			 echo("El usuario '$id_usuario' no existe en el sistema");		 
	 }
	 elseif(isset($_REQUEST['txtRunNuevo']) && isset($_REQUEST['txtNombreNuevo']) && isset($_REQUEST['txtApatNuevo']) 
	 		&& isset($_REQUEST['txtAmatNuevo']) && isset($_REQUEST['cboUsuarioNuevo']) && isset($_REQUEST['cboEstado']))
	 {
		 
		 $usuario = new Usuario();
		 
		 if ($_REQUEST['cboUsuarioNuevo'] == 1001)
			 $usuario = new Administrador();
		 elseif ($_REQUEST['cboUsuarioNuevo'] == 1002)
		 	 $usuario = new Vendedor();
		 elseif ($_REQUEST['cboUsuarioNuevo'] == 1003)
		 	 $usuario = new Bodeguero();
		 
		 $usuario->setIdUsuario(addslashes($_REQUEST['txtRunNuevo']));
		 $usuario->setNombreUsuario(addslashes(strtoupper($_REQUEST['txtNombreNuevo'])));
		 $usuario->setApatUsuario(addslashes(strtoupper($_REQUEST['txtApatNuevo'])));
		 $usuario->setAmatUsuario(addslashes(strtoupper($_REQUEST['txtAmatNuevo'])));
		 $usuario->setEstadoUsuario(strtoupper($_REQUEST['cboEstado']));
		 
		 $admin = new Administrador();
		 $usuarioxx = $admin->modificarUsuario($usuario->getIdUsuario(),$usuario->getNombreUsuario(),$usuario->getApatUsuario(),
		 									   $usuario->getAmatUsuario(),$usuario->getEstadoUsuario(),$usuario->getTipoUsuario());
		 
		 while ($registro = mysql_fetch_array($usuarioxx))
		 {
			 $existe = $registro['v_existe'];	
			 break;
		 }
		 
		 if ($existe == 1)
			 echo "El usuario '".$usuario->getIdUsuario()."' ha sido modificado satisfactoriamente";
		 else
		 	 echo "El usuario '".$usuario->getIdUsuario()."' no existe en el sistema";
	 }	 
	 else
	 	 require("_vista/buscarUsuario.php");
 }
 
 function eliminar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {		 
		 require("_modelo/Usuario.php");
		 
		 $id_usuario = $_REQUEST['txtNombre'];
		 		 
		 $admin = new Administrador();
	 	 $usuariox = $admin->eliminarUsuario($id_usuario);
		 
		 while ($registro = mysql_fetch_array($usuariox))
		 {
			 $existe = $registro['v_existe'];
			 break;		 
		 }
		 
		 if ($existe != 0)
			 echo "El usuario '$id_usuario' ha sido eliminado satisfactoriamente";
		 else
		 	 echo "El usuario '$id_usuario' no existe en el sistema";
	 }
	 else
		 require("_vista/buscarUsuario.php");
 }
 
 function modificarpassword()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {		 
		 require("_modelo/Usuario.php");
		 
		 $id_usuario = $_REQUEST['txtNombre'];
		 
		 $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		 $cad = "";
		 for($i=0;$i<12;$i++)
		 {
			 $cad .= substr($str,rand(0,62),1);
		 }
		 
		 $password_usuario = md5 ($cad);
		 		 
		 $admin = new Administrador();
	 	 $usuariox = $admin->modificarPasswordUsuario($id_usuario,$password_usuario);
		 
		 while ($registro = mysql_fetch_array($usuariox))
		 {
			 $existe = $registro['v_existe'];
			 break;		 
		 }
		 
		 if ($existe != 0)
			 echo "La nueva password del usuario '$id_usuario' es: '$cad'";
		 else
		 	 echo "El usuario '$id_usuario' no existe en el sistema";
	 }
	 else
		 require("_vista/buscarUsuario.php");
 }