<?php
	include("InterfazUsuario.php");
	
	class FabricaUsuario implements InterfazUsuario
	{
		static public function autentificarUsuario($id_usuario,$nombre_usuario,$apat_usuario,$amat_usuario,$estado_usuario,$tipo)
		{
			$usuario_login = self::crearUsuario($id_usuario,$nombre_usuario,$apat_usuario,$amat_usuario,$estado_usuario,$tipo);
			
			session_start();
			$_SESSION['id_usuario'] = $usuario_login->getIdUsuario();
			$_SESSION['nombre_usuario'] = $usuario_login->getNombreUsuario();
			$_SESSION['apat_usuario'] = $usuario_login->getApatUsuario();
			$_SESSION['amat_usuario'] = $usuario_login->getAmatUsuario();
			$_SESSION['estado_usuario'] = $usuario_login->getEstadoUsuario();
			$_SESSION['codigo_usuario'] = $usuario_login->getTipoUsuario();
					 
			if ($tipo == 1001)
				$_SESSION['tipo_usuario'] = "Administrador";
			elseif ($tipo == 1002)
				$_SESSION['tipo_usuario'] = "Vendedor";
			elseif ($tipo == 1003)
				$_SESSION['tipo_usuario'] = "Bodeguero";
			
			return true;
		}
		
		static public function crearUsuario($id_usuario,$nombre_usuario,$apat_usuario,$amat_usuario,$estado_usuario,$tipo)
		{
			switch ($tipo)
			{
				case 1001: return new Administrador($id_usuario,$nombre_usuario,$apat_usuario,$amat_usuario,$estado_usuario);
				case 1002: return new Vendedor($id_usuario,$nombre_usuario,$apat_usuario,$amat_usuario,$estado_usuario);
				case 1003: return new Bodeguero($id_usuario,$nombre_usuario,$apat_usuario,$amat_usuario,$estado_usuario);
				default: 
				throw new Exception('Tipo de usuario desconocido');
			}
		}
		
	}
?>