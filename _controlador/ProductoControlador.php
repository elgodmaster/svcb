<?php
 
 require("_modelo/Categoria_Producto.php");
 require("_modelo/Producto.php");
 require("_modelo/FabricaProducto.php");
 require("_modelo/Usuario.php");
 require("_modelo/FabricaUsuario.php");
 
 function ingresar()
 {
	 if (isset($_REQUEST['cboCategoria']) && isset($_REQUEST['txtNombre']) && isset($_REQUEST['txtaDescripcion']) && isset($_REQUEST['txtPrecio']) && isset($_REQUEST['txtStockR']) && isset($_REQUEST['txtStockM']))
	 {
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
		 
		 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
	 	 $productox = $admin->ingresarProducto($producto->getCodigoProducto(),$producto->getNombre(),$producto->getPrecio(),
		 									   $producto->getStockReal(),$producto->getStockMinimo(),$producto->getDescripcion(),	
											   $categoria->getIdCategoriaProducto());
														 
		 while ($registro = mysql_fetch_array($productox))
		 {
			 $existe = $registro['v_existe'];	
			 break;		 
		 }
		 
		 if ($existe == 0)
			 echo "<label>El producto '".$producto->getNombre()."' ha sido registrado satisfactoriamente.</label>";
		 else
		 	 echo "<label>El producto '".$producto->getNombre()."' existe en el sistema.</label>";
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
		 $nombre_producto = $_REQUEST['txtNombre'];
		 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
		 $productox = $admin->listarProducto($nombre_producto);
		 $num_rows = mysql_num_rows($productox);
		 
		 if($num_rows != 0)
		 {
			 $registro = mysql_fetch_assoc($productox);
			 $categoria = FabricaProducto::crearCategoriaProducto($registro['id_categoria_producto'],$registro['nombre_categoria_producto']);
			 $producto = FabricaProducto::crearProducto($registro['id_producto'],$registro['nombre_producto'],$registro['descripcion_producto'],$registro['precio_producto'],$registro['stock_real_producto']);
			 $producto->setEstado($registro['estado_producto']);
			 $producto->setStockMinimo($registro['stock_minimo_producto']);
			 require("_vista/listarProducto.php");
		 }
		 else
		 	 echo "<label>El producto '$nombre_producto' no existe en el sistema.</label>";
	 }
	 else
	 	 require("_vista/buscarProducto.php");
 }
 
 function modificar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 $nombre_producto = $_REQUEST['txtNombre'];
		 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
		 $productox = $admin->listarProducto($nombre_producto);
		 $num_rows = mysql_num_rows($productox);
		 
		 if($num_rows != 0)
		 {
			 $registro = mysql_fetch_assoc($productox);
			 $categoria = FabricaProducto::crearCategoriaProducto($registro['id_categoria_producto'],$registro['nombre_categoria_producto']);
			 $lista = $categoria->todosProductos();
			 $producto = FabricaProducto::crearProducto($registro['id_producto'],$registro['nombre_producto'],$registro['descripcion_producto'],$registro['precio_producto'],$registro['stock_real_producto']);
			 $producto->setEstado($registro['estado_producto']);
			 $producto->setStockMinimo($registro['stock_minimo_producto']);
			 require("_vista/modificarProducto.php");
		 }
		 else
		 	 echo "<label>El producto '$nombre_producto' no existe en el sistema.</label>";	 
	 }
	 elseif(isset($_REQUEST['txtCodigo']) && isset($_REQUEST['txtNombreNuevo']) && isset($_REQUEST['txtPrecioNuevo']) && isset($_REQUEST['cboCategoriaNuevo']) && isset($_REQUEST['txtaDescripcionNuevo']) && isset($_REQUEST['txtStockRNuevo']) && isset($_REQUEST['txtStockMNuevo']))
	 {
		 $categoria = FabricaProducto::crearCategoriaProducto($_REQUEST['cboCategoriaNuevo'],'N/A');
		 $producto = FabricaProducto::crearProducto($_REQUEST['txtCodigo'],addslashes(strtoupper($_REQUEST['txtNombreNuevo'])),addslashes(strtoupper($_REQUEST['txtaDescripcionNuevo'])),$_REQUEST['txtPrecioNuevo'],$_REQUEST['txtStockRNuevo']);
		 $producto->setStockMinimo($_REQUEST['txtStockMNuevo']);
		 
		 if (isset($_REQUEST['cboEstado']))
			 $producto->setEstado(addslashes(strtoupper($_REQUEST['cboEstado'])));
		 else
		 	 $producto->setEstado(addslashes('ACTIVO'));
		 
		 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
		 $productoxx = $admin->modificarProducto($producto->getCodigoProducto(),$producto->getNombre(),$producto->getPrecio(),$producto->getStockReal(),$producto->getStockMinimo(),$producto->getDescripcion(),$producto->getEstado(),$categoria->getIdCategoriaProducto());		 
		 $registro = mysql_fetch_array($productoxx);
		 $existe = $registro['v_existe'];
		 
		 if ($existe == 1)
			 echo "<label>El producto '".$producto->getNombre()."' ha sido modificado satisfactoriamente.</label>";
		 else
		 	 echo "<label>El producto '".$producto->getNombre()."' no existe en el sistema.</label>";
	 }
	 else
	 	 require("_vista/buscarProducto.php");
 }
 
 function eliminar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 $nombre_producto = $_REQUEST['txtNombre'];
		 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
	 	 $productox = $admin->eliminarProducto($nombre_producto);
		 $registro = mysql_fetch_array($productox);
		 $existe = $registro['v_existe'];
		 
		 if ($existe != 0)
			 echo "<label>El producto '$nombre_producto' ha sido eliminado satisfactoriamente.</label>";
		 else
		 	 echo "<label>El producto '$nombre_producto' no existe en el sistema.</label>";
	 }
	 else
		 require("_vista/buscarProducto.php");
 }

?>