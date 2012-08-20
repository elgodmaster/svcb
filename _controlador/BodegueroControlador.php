<?php
 
 require("_modelo/Categoria_Producto.php");
 require("_modelo/Producto.php");
 require("_modelo/Usuario.php");
 require("_modelo/FabricaUsuario.php");

 function ingresarstock()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 $nombre_producto = $_REQUEST['txtNombre'];
	 
		 $bodeguero = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['codigo_usuario']);
		 $productox = $bodeguero->consultarProducto($nombre_producto);
		 
		 $num_rows = mysql_num_rows($productox);
		 
		 if($num_rows != 0)
		 {
			 while ($registro=mysql_fetch_assoc($productox))
			 {				 
				 $producto = new Producto();
				 $producto->setCodigoProducto($registro['id_producto']);
				 $producto->setNombre($registro['nombre_producto']);
				 $producto->setDescripcion($registro['descripcion_producto']);
				 $producto->setStockReal($registro['stock_real_producto']);
				 $categoria = new Categoria_Producto();
				 $categoria->setIdCategoriaProducto($registro['id_categoria_producto']);
				 $categoria->setNombreCategoriaProducto(ucwords(strtolower($registro['nombre_categoria_producto'])));
				 break;
			 }
			 require("_vista/ingresarStockProducto.php");
		 }
		 else
		 	 echo "<label>El producto '$nombre_producto' no existe en el sistema.</label>";
	 }
	 elseif(isset($_REQUEST['txtCodigo']) && isset($_REQUEST['txtNombreNuevo']) && isset($_REQUEST['txtStockRNuevo']))
	 {
	 	 $producto = new Producto();
		 $producto->setCodigoProducto($_REQUEST['txtCodigo']);
		 $producto->setNombre($_REQUEST['txtNombreNuevo']);
		 $producto->setStockReal($_REQUEST['txtStockRNuevo']);
		 		 
		 $bodeguero = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['codigo_usuario']);
		 $productoxx = $bodeguero->ingresarStockProducto($producto->getCodigoProducto(),$producto->getStockReal());
		 
		 while ($registro = mysql_fetch_array($productoxx))
		 {
			 $existe = $registro['v_existe'];	
			 break;
		 }
		 
		 if ($existe == 1)
			 echo "<label>El stock del producto '".$producto->getNombre()."' ha sido actualizado satisfactoriamente.</label>";
		 else
		 	 echo "<label>El producto '".$producto->getNombre()."' no existe en el sistema.</label>";
	 }	 
	 else
	 	 require("_vista/buscarProductoBodeguero.php");
 }
 
 function consultarProducto()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 $nombre_producto = $_REQUEST['txtNombre'];
	 
		 $bodeguero = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['codigo_usuario']);
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
				 $producto->setStockReal($registro['stock_real_producto']);
				 $categoria->setIdCategoriaProducto($registro['id_categoria_producto']);
				 $categoria->setNombreCategoriaProducto($registro['nombre_categoria_producto']);
				 break;
			 }
			 require("_vista/listarProductoBodeguero.php");
		 }
		 else
		 	 echo"<label>El producto '$nombre_producto' no existe en el sistema.</label>";
	 }
	 else
	 	 require("_vista/buscarProductoBodeguero.php");
 }
 
?>