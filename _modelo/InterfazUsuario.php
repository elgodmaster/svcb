<?php
	interface InterfazUsuario
	{
		static public function autentificarUsuario($id_usuario,$nombre_usuario,$apat_usuario,$amat_usuario,$estado_usuario,$tipo);
		static public function crearUsuario($id_usuario,$nombre_usuario,$apat_usuario,$amat_usuario,$estado_usuario,$tipo);
	}

?>