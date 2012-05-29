<?php

 function ingresar()
 {
 }
 
 function listar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 require("_modelo/Producto.php");
	 	 require("_modelo/Administrador.php");
	 	 require("_modelo/Categoria_Producto.php");
	 	 
	 	 $nombre_producto = $_REQUEST['txtNombre'];
	 
		 $admin = new Administrador();
		 $productox = $admin->listarProducto($nombre_producto);
		 
		 $num_rows = mysql_num_rows($productox);
		 
		 if($num_rows != 0)
		 {
			 while ($registro=mysql_fetch_assoc($productox))
			 {
				 $categoria = new Categoria_Producto();
				 $producto = new Producto();
				 $producto->setCodigoProducto($registro['id_producto']);
				 $producto->setNombre($registro['nombre_producto']);
				 $producto->setDescripcion($registro['descripcion_producto']);
				 $producto->setPrecio($registro['precio_producto']);
				 $producto->setEstado($registro['estado_producto']);
				 $producto->setStockMinimo($registro['stock_minimo_producto']);
				 $producto->setStockReal($registro['stock_real_producto']);
				 $categoria->setIdCategoriaProducto($registro['id_categoria_producto']);
				 $categoria->setNombreCategoriaProducto($registro['nombre_categoria_producto']);
			 }
			 require("_vista/listarProducto.php");
		 }
		 else
		 	 echo("El producto '$nombre_producto' no existe en el sistema");
	 }
	 else
	 	 require("_vista/buscarProducto.php");
 }
 
 function modificar()
 {
 }
 
 function eliminar()
 {
 }

?>