<?php
 
 require("_modelo/Categoria_Producto.php");
 require("_modelo/FabricaProducto.php");
 require("_modelo/Usuario.php");
 require("_modelo/FabricaUsuario.php");

 function ingresar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 $nombre_categoria = strtoupper($_REQUEST['txtNombre']);
		 $categoria = FabricaProducto::crearCategoriaProducto('N/A','N/A');
		 $codigo = $categoria->codigoSiguiente();
		 $reg = mysql_fetch_array($codigo);
		 $categoria->setIdCategoriaProducto($reg['codigo']);
		 $categoria->setNombreCategoriaProducto(addslashes($nombre_categoria));
		 
		 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
	 	 $categoriax = $admin->ingresarCategoriaProducto($categoria->getIdCategoriaProducto(),$categoria->getNombreCategoriaProducto());														 
		 $registro = mysql_fetch_array($categoriax);
		 $existe = $registro['v_existe'];
		 
		 if ($existe == 0)
			 echo "<label>La categoria producto '$nombre_categoria' ha sido registrado satisfactoriamente.</label>";
		 else
		 	 echo "<label>La categoria producto '$nombre_categoria' existe en el sistema.</label>";
	 }
	 else
		 require("_vista/ingresarCategoriaProducto.php");
 }
 
 function listar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {		 
		 $nombre_categoria = $_REQUEST['txtNombre'];
	 	 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
	 	 $categoriax = $admin->listarCategoriaProducto($nombre_categoria);
		 $num_rows = mysql_num_rows($categoriax);
		
		 if($num_rows != 0)
		 {
			 $registro = mysql_fetch_assoc($categoriax);
			 $categoria = FabricaProducto::crearCategoriaProducto($registro['id_categoria_producto'],$registro['nombre_categoria_producto']);
			 $categoria->setEstadoCategoriaProducto($registro['estado_categoria_producto']);
			 require("_vista/listarCategoriaProducto.php");
		 }
		 else
			 echo "<label>La categoria de producto '$nombre_categoria' no existe en el sistema.</label>";
	 }
	 else
		 require("_vista/buscarCategoriaProducto.php");
 }
 
 function modificar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 $nombre_categoria = $_REQUEST['txtNombre'];
	 	 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
	 	 $categoriax = $admin->listarCategoriaProducto($nombre_categoria);
		 $num_rows = mysql_num_rows($categoriax);
		
		 if($num_rows != 0)
		 {
			 $registro=mysql_fetch_assoc($categoriax);
			 $categoria = FabricaProducto::crearCategoriaProducto($registro['id_categoria_producto'],$registro['nombre_categoria_producto']);
			 $categoria->setEstadoCategoriaProducto($registro['estado_categoria_producto']);
			 require("_vista/modificarCategoriaProducto.php");
		 }
		 else
			 echo "<label>La categoria de producto '$nombre_categoria' no existe en el sistema.</label>";		 
	 }
	 elseif(isset($_REQUEST['txtCodigo']) && isset($_REQUEST['txtNombreNuevo']))
	 {
		 $categoria = FabricaProducto::crearCategoriaProducto($_REQUEST['txtCodigo'],strtoupper($_REQUEST['txtNombreNuevo']));
		 
		 if (isset($_REQUEST['cboEstado']))
			 $categoria->setEstadoCategoriaProducto(addslashes(strtoupper($_REQUEST['cboEstado'])));
		 else
		 	 $categoria->setEstadoCategoriaProducto(addslashes('ACTIVO'));
			 		 
		 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
		 $categoriaxx = $admin->modificarCategoriaProducto($categoria->getIdCategoriaProducto(),$categoria->getNombreCategoriaProducto(),$categoria->getEstadoCategoriaProducto());		 
		 $registro = mysql_fetch_array($categoriaxx);
		 $existe = $registro['v_existe'];
		 
		 if ($existe == 1)
			 echo "<label>La categoria producto '".$categoria->getNombreCategoriaProducto()."' ha sido modificada satisfactoriamente.
			 </label>";
		 else
		 	 echo "<label>La categoria producto '".$categoria->getNombreCategoriaProducto()."' no existe en el sistema.</label>";
	 }	 
	 else
	 	 require("_vista/buscarCategoriaProducto.php");
 }
 
 function eliminar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 $nombre_categoria = $_REQUEST['txtNombre'];
		 $admin = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
	 	 $categoriax = $admin->eliminarCategoriaProducto($nombre_categoria);
		 $registro = mysql_fetch_array($categoriax);
		 $existe = $registro['v_existe'];
		 
		 if ($existe != 0)
			 echo "<label>La categoria producto '$nombre_categoria' ha sido eliminada satisfactoriamente.</label>";
		 else
		 	 echo "<label>La categoria producto '$nombre_categoria' no existe en el sistema.</label>";
	 }
	 else
		 require("_vista/buscarCategoriaProducto.php");
 }