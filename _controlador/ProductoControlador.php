<?php

 function ingresar()
 {
	 require("_modelo/Categoria_Producto.php");
	 require("_modelo/Usuario.php");
		 
	 if (isset($_REQUEST['cboCategoria']) && isset($_REQUEST['txtNombre']) && isset($_REQUEST['txtaDescripcion'])
	 	 && isset($_REQUEST['txtPrecio']) && isset($_REQUEST['txtStockR']) && isset($_REQUEST['txtStockM']))
	 {
		 require("_modelo/Producto.php");
		 		 
		 $producto = new Producto();
		 $codigo = $producto->codigoSiguiente();
		 
		 while ($reg = mysql_fetch_array($codigo))
		 {
			 $producto->setCodigoProducto($reg['codigo']);
			 $producto->setNombre(addslashes(strtoupper($_REQUEST['txtNombre'])));
			 $producto->setDescripcion(addslashes(strtoupper($_REQUEST['txtaDescripcion'])));
			 $producto->setPrecio($_REQUEST['txtPrecio']);
			 $producto->setStockReal($_REQUEST['txtStockR']);
			 $producto->setStockMinimo($_REQUEST['txtStockM']);
			 $categoria = new Categoria_Producto();
			 $categoria->setIdCategoriaProducto($_REQUEST['cboCategoria']);
			 break;
		 }
		 
		 $admin = new Administrador();
	 	 $productox = $admin->ingresarProducto($producto->getCodigoProducto(),$producto->getNombre(),$producto->getPrecio(),
		 									   $producto->getStockReal(),$producto->getStockMinimo(),$producto->getDescripcion(),	
											   $categoria->getIdCategoriaProducto());
														 
		 while ($registro = mysql_fetch_array($productox))
		 {
			 $existe = $registro['v_existe'];	
			 break;		 
		 }
		 
		 if ($existe == 0)
			 echo "El producto '".$producto->getNombre()."' ha sido registrado satisfactoriamente";
		 else
		 	 echo "El producto '".$producto->getNombre()."' existe en el sistema";
	 }
	 else
	 {
		 $categoria = new Categoria_Producto();
		 $productos = $categoria->todosProductos();
		 require("_vista/ingresarProducto.php");
	 }
 }
 
 function listar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 require("_modelo/Categoria_Producto.php");
		 require("_modelo/Producto.php");
	 	 require("_modelo/Usuario.php");
	 	 	 	 
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
				 break;
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
			 $cat_producto = new Categoria_Producto();
			 $lista = $cat_producto->todosProductos();
			 require("_vista/modificarProducto.php");
		 }
		 else
		 	 echo("El producto '$nombre_producto' no existe en el sistema");	 
	 }
	 elseif(isset($_REQUEST['txtCodigo']) && isset($_REQUEST['txtNombreNuevo']) && isset($_REQUEST['txtPrecioNuevo'])
	 		&& isset($_REQUEST['cboCategoriaNuevo']) && isset($_REQUEST['txtaDescripcionNuevo'])
			&& isset($_REQUEST['txtStockRNuevo']) && isset($_REQUEST['txtStockMNuevo']) && isset($_REQUEST['cboEstado']))
	 {
	 	 $producto = new Producto();
		 $producto->setCodigoProducto($_REQUEST['txtCodigo']);
		 $producto->setNombre(addslashes(strtoupper($_REQUEST['txtNombreNuevo'])));
		 $producto->setDescripcion(addslashes(strtoupper($_REQUEST['txtaDescripcionNuevo'])));
		 $producto->setPrecio($_REQUEST['txtPrecioNuevo']);
		 $producto->setEstado(strtoupper($_REQUEST['cboEstado']));
		 $producto->setStockMinimo($_REQUEST['txtStockMNuevo']);
		 $producto->setStockReal($_REQUEST['txtStockRNuevo']);
		 $categoria = new Categoria_Producto();
		 $categoria->setIdCategoriaProducto($_REQUEST['cboCategoriaNuevo']);
		 
		 $admin = new Administrador();
		 $productoxx = $admin->modificarProducto($producto->getCodigoProducto(),$producto->getNombre(),$producto->getPrecio(),
		 										 $producto->getStockReal(),$producto->getStockMinimo(),$producto->getDescripcion(),
												 $producto->getEstado(),$categoria->getIdCategoriaProducto());
		 
		 while ($registro = mysql_fetch_array($productoxx))
		 {
			 $existe = $registro['v_existe'];	
			 break;
		 }
		 
		 if ($existe == 1)
			 echo "El producto '".$producto->getNombre()."' ha sido modificado satisfactoriamente";
		 else
		 	 echo "El producto '".$producto->getNombre()."' no existe en el sistema";
	 }	 
	 else
	 	 require("_vista/buscarProducto.php");
 }
 
 function eliminar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {		 
		 require("_modelo/Usuario.php");
		 
		 $nombre_producto = $_REQUEST['txtNombre'];
		 		 
		 $admin = new Administrador();
	 	 $productox = $admin->eliminarProducto($nombre_producto);
		 
		 while ($registro = mysql_fetch_array($productox))
		 {
			 $existe = $registro['v_existe'];
			 break;		 
		 }
		 
		 if ($existe != 0)
			 echo "El producto '$nombre_producto' ha sido eliminado satisfactoriamente";
		 else
		 	 echo "El producto '$nombre_producto' no existe en el sistema";
	 }
	 else
		 require("_vista/buscarProducto.php");
 }

?>