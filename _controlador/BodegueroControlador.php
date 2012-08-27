<?php
 
 require("_modelo/Categoria_Producto.php"); 
 require("_modelo/Producto.php");
 require("_modelo/FabricaProducto.php");
 require("_modelo/Usuario.php");
 require("_modelo/FabricaUsuario.php");

 function ingresarstock()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 $nombre_producto = $_REQUEST['txtNombre'];
		 $bodeguero = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
		 $productox = $bodeguero->consultarProducto($nombre_producto);
		 $num_rows = mysql_num_rows($productox);
		 
		 if($num_rows != 0)
		 {
			 $registro=mysql_fetch_assoc($productox);
			 $producto = FabricaProducto::crearProducto($registro['id_producto'],$registro['nombre_producto'],$registro['descripcion_producto'],$registro['precio_producto'],$registro['stock_real_producto']);
			 $categoria = FabricaProducto::crearCategoriaProducto($registro['id_categoria_producto'],ucwords(strtolower($registro['nombre_categoria_producto'])));
			 require("_vista/ingresarStockProducto.php");
		 }
		 else
		 	 echo "<label>El producto '$nombre_producto' no existe en el sistema.</label>";
	 }
	 elseif(isset($_REQUEST['txtCodigo']) && isset($_REQUEST['txtNombreNuevo']) && isset($_REQUEST['txtStockRNuevo']))
	 {
		 $producto = FabricaProducto::crearProducto($_REQUEST['txtCodigo'],$_REQUEST['txtNombreNuevo'],'N/A',0,$_REQUEST['txtStockRNuevo']);
		 $bodeguero = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
		 $productoxx = $bodeguero->ingresarStockProducto($producto->getCodigoProducto(),$producto->getStockReal());
		 $registro = mysql_fetch_array($productoxx);
		 $existe = $registro['v_existe'];
		 
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
		 $bodeguero = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
		 $productox = $bodeguero->consultarProducto($nombre_producto);
		 $num_rows = mysql_num_rows($productox);
		 
		 if($num_rows != 0)
		 {
			 $registro=mysql_fetch_assoc($productox);
			 $categoria = FabricaProducto::crearCategoriaProducto($registro['id_categoria_producto'],$registro['nombre_categoria_producto']);
			 $producto = FabricaProducto::crearProducto($registro['id_producto'],$registro['nombre_producto'],$registro['descripcion_producto'],$registro['precio_producto'],$registro['stock_real_producto']);
			 require("_vista/listarProductoBodeguero.php");
		 }
		 else
		 	 echo"<label>El producto '$nombre_producto' no existe en el sistema.</label>";
	 }
	 else
	 	 require("_vista/buscarProductoBodeguero.php");
 }
 
?>