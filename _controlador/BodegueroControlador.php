<?php

 function ingresarstock()
 {
	 require("_modelo/Categoria_Producto.php");
	 require("_modelo/Producto.php");
	 require("_modelo/Usuario.php");
	 
	 if (isset($_REQUEST['txtNombre']))
	 {
		 $nombre_producto = $_REQUEST['txtNombre'];
	 
		 $admin = new Administrador();
		 $productox = $admin->listarProducto($nombre_producto);
		 
		 $num_rows = mysql_num_rows($productox);
		 
		 if($num_rows != 0)
		 {
			 while ($registro=mysql_fetch_assoc($productox))
			 {				 
				 $producto = new Producto();
				 $producto->setCodigoProducto($registro['id_producto']);
				 $producto->setNombre($registro['nombre_producto']);
				 $producto->setDescripcion($registro['descripcion_producto']);
				 $producto->setPrecio($registro['precio_producto']);
				 $producto->setEstado($registro['estado_producto']);
				 $producto->setStockMinimo($registro['stock_minimo_producto']);
				 $producto->setStockReal($registro['stock_real_producto']);
				 $categoria = new Categoria_Producto();
				 $categoria->setIdCategoriaProducto($registro['id_categoria_producto']);
				 $categoria->setNombreCategoriaProducto($registro['nombre_categoria_producto']);
				 break;
			 }
			 require("_vista/ingresarStockProducto.php");
		 }
		 else
		 	 echo("El producto '$nombre_producto' no existe en el sistema");	 
	 }
	 elseif(isset($_REQUEST['txtCodigo']) && isset($_REQUEST['txtNombreNuevo']) && isset($_REQUEST['txtStockRNuevo']))
	 {
	 	 $producto = new Producto();
		 $producto->setCodigoProducto($_REQUEST['txtCodigo']);
		 $producto->setNombre($_REQUEST['txtNombreNuevo']);
		 $producto->setStockReal($_REQUEST['txtStockRNuevo']);
		 		 
		 $bodeguero = new Bodeguero();
		 $productoxx = $bodeguero->ingresarStockProducto($producto->getCodigoProducto(),$producto->getStockReal());
		 
		 while ($registro = mysql_fetch_array($productoxx))
		 {
			 $existe = $registro['v_existe'];	
			 break;
		 }
		 
		 if ($existe == 1)
			 echo "El stock del producto '".$producto->getNombre()."' ha sido actualizado satisfactoriamente";
		 else
		 	 echo "El producto '".$producto->getNombre()."' no existe en el sistema";
	 }	 
	 else
	 	 require("_vista/buscarProductoBodeguero.php");
 }
 
 function consultarProducto()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 require("_modelo/Categoria_Producto.php");
		 require("_modelo/Producto.php");
	 	 require("_modelo/Usuario.php");
	 	 	 	 
	 	 $nombre_producto = $_REQUEST['txtNombre'];
	 
		 $bodeguero = new Bodeguero();
		 $productox = $bodeguero->consultarProducto($nombre_producto);
		 
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
				 break;
			 }
			 require("_vista/listarProductoBodeguero.php");
		 }
		 else
		 	 echo("El producto '$nombre_producto' no existe en el sistema");
	 }
	 else
	 	 require("_vista/buscarProductoBodeguero.php");
 }
 
?>