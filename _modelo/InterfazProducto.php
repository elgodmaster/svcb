<?php
	interface InterfazProducto
	{
		static public function crearCategoriaProducto($id_categoria_producto,$nombre_categoria_producto);
		static public function crearProducto($id_producto,$nombre_producto,$descripcion_producto,$precio_producto,$stock_real_producto);
	}
?>