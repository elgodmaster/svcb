<?php
 
 require("_modelo/Usuario.php");
 require("_modelo/FabricaUsuario.php");
 
 function ingresar()
 {
	 if (isset($_REQUEST['txtRUN']) && isset($_REQUEST['txtPassword']) && isset($_REQUEST['txtNombre']) && isset($_REQUEST['txtApat']) 
	     && isset($_REQUEST['txtAmat']) && isset($_REQUEST['cboUsuario']))
	 {
		 $id_usuario = (addslashes($_REQUEST['txtRUN']));
		 $nombre_usuario = (addslashes(strtoupper($_REQUEST['txtNombre'])));
		 $password_usuario = (addslashes(md5($_REQUEST['txtPassword'])));
		 $apat_usuario = (addslashes(strtoupper($_REQUEST['txtApat'])));
		 $amat_usuario = (addslashes(strtoupper($_REQUEST['txtAmat'])));
		 $tipo_usuario = $_REQUEST['cboUsuario'];		 
		 $estado_usuario = (addslashes('ACTIVO'));
		 
		 $usuario = FabricaUsuario::crearUsuario($id_usuario,$nombre_usuario,$apat_usuario,$amat_usuario,$estado_usuario,$tipo_usuario);
		 $usuario->setPasswordUsuario($password_usuario);
		 
		 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
	 	 $usuariox = $admin->ingresarUsuario($usuario->getIdUsuario(),$usuario->getPasswordUsuario(),$usuario->getNombreUsuario(),$usuario->getApatUsuario(),$usuario->getAmatUsuario(),$usuario->getTipoUsuario());
		 
		 while ($registro = mysql_fetch_array($usuariox))
		 {
			 $existe = $registro['v_existe'];	
			 break;
		 }
		 
		 if ($existe == 0)
			 echo "<label>El usuario '".$usuario->getIdUsuario()."' ha sido registrado satisfactoriamente.</label>";
		 else
		 	 echo "<label>El usuario '".$usuario->getIdUsuario()."' existe en el sistema.</label>";
	 }
	 else
		 require("_vista/ingresarUsuario.php");
 }
 
 function listar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 $id_usuario = $_REQUEST['txtNombre'];
	 
	 	 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
	 	 $usuariox = $admin->listarUsuario($id_usuario);
		 
		 $num_rows = mysql_num_rows($usuariox);
		
		 if($num_rows != 0)
		 {
			 $row = mysql_fetch_assoc($usuariox);
			 
			 $usuario = FabricaUsuario::crearUsuario($row['id_usuario'],$row['nombre_usuario'],$row['apat_usuario'],$row['amat_usuario'],$row['estado_usuario'],$row['tipo_usuario_id_tipo_usuario']);
			 
			 if ($usuario->getTipoUsuario() == 1001)
				$tipo_usuario='ADMINISTRADOR';
			 elseif ($usuario->getTipoUsuario() == 1002)
				$tipo_usuario='VENDEDOR';
			 elseif ($usuario->getTipoUsuario() == 1003)
				$tipo_usuario='BODEGUERO';
			 			 
			 require("_vista/listarUsuario.php");
		 }
		 else
		 	 echo "<label>El usuario '$id_usuario' no existe en el sistema.</label>";
	 }
	 else
	 	 require("_vista/buscarUsuario.php");
 }
 
 function modificar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 $id_usuario = $_REQUEST['txtNombre'];
	 
	 	 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
	 	 $usuariox = $admin->listarUsuario($id_usuario);
		 
		 $num_rows = mysql_num_rows($usuariox);
		
		 if($num_rows != 0)
		 {
			 $row = mysql_fetch_assoc($usuariox);			 
			 $usuario = FabricaUsuario::crearUsuario($row['id_usuario'],$row['nombre_usuario'],$row['apat_usuario'],$row['amat_usuario'],$row['estado_usuario'],$row['tipo_usuario_id_tipo_usuario']);			 
			 require("_vista/modificarUsuario.php");
		 }
		 else
			 echo "<label>El usuario '$id_usuario' no existe en el sistema.</label>";
	 }
	 elseif(isset($_REQUEST['txtRunNuevo']) && isset($_REQUEST['txtNombreNuevo']) && isset($_REQUEST['txtApatNuevo']) 
	 		&& isset($_REQUEST['txtAmatNuevo']) && isset($_REQUEST['cboUsuarioNuevo']))
	 {
		 $id_usuario = (addslashes($_REQUEST['txtRunNuevo']));
		 $nombre_usuario = (addslashes(strtoupper($_REQUEST['txtNombreNuevo'])));
		 $apat_usuario = (addslashes(strtoupper($_REQUEST['txtApatNuevo'])));
		 $amat_usuario = (addslashes(strtoupper($_REQUEST['txtAmatNuevo'])));
		 $tipo_usuario = $_REQUEST['cboUsuarioNuevo'];
		 
		 if (isset($_REQUEST['cboEstado']))
			 $estado_usuario = (addslashes(strtoupper($_REQUEST['cboEstado'])));
		 else
		 	 $estado_usuario = (addslashes('ACTIVO'));
		 
		 $usuario = FabricaUsuario::crearUsuario($id_usuario,$nombre_usuario,$apat_usuario,$amat_usuario,$estado_usuario,$tipo_usuario);
		 
		 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
		 $usuarioxx = $admin->modificarUsuario($usuario->getIdUsuario(),$usuario->getNombreUsuario(),$usuario->getApatUsuario(),
		 									   $usuario->getAmatUsuario(),$usuario->getEstadoUsuario(),$usuario->getTipoUsuario());
		 
		 while ($registro = mysql_fetch_array($usuarioxx))
		 {
			 $existe = $registro['v_existe'];	
			 break;
		 }
		 
		 if ($existe == 1)
			 echo "<label>El usuario '".$usuario->getIdUsuario()."' ha sido modificado satisfactoriamente.</label>";
		 else
		 	 echo "<label>El usuario '".$usuario->getIdUsuario()."' no existe en el sistema.</label>";
	 }	 
	 else
	 	 require("_vista/buscarUsuario.php");
 }
 
 function eliminar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {		 
		 $id_usuario = $_REQUEST['txtNombre'];
		 		 
		 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
	 	 $usuariox = $admin->eliminarUsuario($id_usuario);
		 
		 while ($registro = mysql_fetch_array($usuariox))
		 {
			 $existe = $registro['v_existe'];
			 break;		 
		 }
		 
		 if ($existe != 0)
			 echo "<label>El usuario '$id_usuario' ha sido eliminado satisfactoriamente.</label>";
		 else
		 	 echo "<label>El usuario '$id_usuario' no existe en el sistema.</label>";
	 }
	 else
		 require("_vista/buscarUsuario.php");
 }
 
 function modificarpassword()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {		 
		 $id_usuario = $_REQUEST['txtNombre'];
		 
		 $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		 $cad = "";
		 for($i=0;$i<12;$i++)
		 {
			 $cad .= substr($str,rand(0,62),1);
		 }
		 
		 $password_usuario = md5 ($cad);
		 		 
		 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
	 	 $usuariox = $admin->modificarPasswordUsuario($id_usuario,$password_usuario);
		 
		 while ($registro = mysql_fetch_array($usuariox))
		 {
			 $existe = $registro['v_existe'];
			 break;		 
		 }
		 
		 if ($existe != 0)
			 echo "<label>La nueva password del usuario '$id_usuario' es: '$cad'.</label>";
		 else
		 	 echo "<label>El usuario '$id_usuario' no existe en el sistema.</label>";
	 }
	 else
		 require("_vista/buscarUsuario.php");
 }
?>