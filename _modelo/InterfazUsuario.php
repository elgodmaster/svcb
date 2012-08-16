<?php
	interface InterfazUsuario
	{
		public function autentificarUsuario($usuario,$tipo);
		public function crearUsuario();
	}

?>