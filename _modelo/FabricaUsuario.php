<?php
	include("InterfazUsuario.php");
	
	class FabricaUsuario implements InterfazUsuario
	{
		static public function autentificarUsuario($id_usuario,$nombre_usuario,$apat_usuario,$amat_usuario,$tipo)
		{
			switch ($tipo)
			{
				case 1001: return new Administrador($id_usuario,$nombre_usuario,$apat_usuario,$amat_usuario);
				case 1002: return new Vendedor($id_usuario,$nombre_usuario,$apat_usuario,$amat_usuario);
				case 1003: return new Bodeguero($id_usuario,$nombre_usuario,$apat_usuario,$amat_usuario);
				default: 
				throw new Exception('Tipo de usuario desconocido');
			}
		}
		
		static public function crearUsuario($id_usuario,$nombre_usuario,$apat_usuario,$amat_usuario,$tipo)
		{
			switch ($tipo)
			{
				case 1001: return new Administrador($id_usuario,$nombre_usuario,$apat_usuario,$amat_usuario);
				case 1002: return new Vendedor($id_usuario,$nombre_usuario,$apat_usuario,$amat_usuario);
				case 1003: return new Bodeguero($id_usuario,$nombre_usuario,$apat_usuario,$amat_usuario);
				default: 
				throw new Exception('Tipo de usuario desconocido');
			}
		}
		
	}
?>