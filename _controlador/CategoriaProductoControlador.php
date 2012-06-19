<?php

 function ingresar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 require("_modelo/Categoria_Producto.php");
		 require("_modelo/Usuario.php");
		 
		 $nombre_categoria = strtoupper($_REQUEST['txtNombre']);
		 
		 $categoria = new Categoria_Producto();
		 $codigo = $categoria->codigoSiguiente();
		 
		 while ($reg = mysql_fetch_array($codigo))
		 {
			 $categoria->setIdCategoriaProducto($reg['codigo']);
			 $categoria->setNombreCategoriaProducto(addslashes($nombre_categoria));
             break;
		 }
		 
		 $admin = new Administrador();
	 	 $categoriax = $admin->ingresarCategoriaProducto($categoria->getIdCategoriaProducto(),
		 												 $categoria->getNombreCategoriaProducto());
														 
		 while ($registro = mysql_fetch_array($categoriax))
		 {
			 $existe = $registro['v_existe'];
			 break;		 
		 }
		 
		 if ($existe == 0)
			 echo "La categoria producto '$nombre_categoria' ha sido registrado satisfactoriamente";
		 else
		 	 echo "La categoria producto '$nombre_categoria' existe en el sistema";
	 }
	 else
		 require("_vista/ingresarCategoriaProducto.php");
 }
 
 function listar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {		 
		 require("_modelo/Categoria_Producto.php");
		 require("_modelo/Usuario.php");
	 	 
		 $nombre_categoria = $_REQUEST['txtNombre'];
	 
	 	 $admin = new Administrador();
	 	 $categoriax = $admin->listarCategoriaProducto($nombre_categoria);
		
		 $num_rows = mysql_num_rows($categoriax);
		
		 if($num_rows != 0)
		 {
			 while ($registro=mysql_fetch_assoc($categoriax))
			 {
				 $categoria = new Categoria_Producto();
		 		 $categoria->setIdCategoriaProducto($registro['id_categoria_producto']);
		 		 $categoria->setNombreCategoriaProducto($registro['nombre_categoria_producto']);
		 		 $categoria->setEstadoCategoriaProducto($registro['estado_categoria_producto']);
				 break;
			 }
			 require("_vista/listarCategoriaProducto.php");
		 }
		 else
			 echo("La categoria de producto '$nombre_categoria' no existe en el sistema");
	 }
	 else
		 require("_vista/buscarCategoriaProducto.php");
 }
 
 function modificar()
 {
	 require("_modelo/Categoria_Producto.php");
	 require("_modelo/Usuario.php");
	 
	 if (isset($_REQUEST['txtNombre']))
	 {
		 $nombre_categoria = $_REQUEST['txtNombre'];
	 
	 	 $admin = new Administrador();
	 	 $categoriax = $admin->listarCategoriaProducto($nombre_categoria);
		
		 $num_rows = mysql_num_rows($categoriax);
		
		 if($num_rows != 0)
		 {
			 while ($registro=mysql_fetch_assoc($categoriax))
			 {
				 $categoria = new Categoria_Producto();
		 		 $categoria->setIdCategoriaProducto($registro['id_categoria_producto']);
		 		 $categoria->setNombreCategoriaProducto($registro['nombre_categoria_producto']);
		 		 $categoria->setEstadoCategoriaProducto($registro['estado_categoria_producto']);
				 break;
			 }
			 require("_vista/modificarCategoriaProducto.php");
		 }
		 else
			 echo("La categoria de producto '$nombre_categoria' no existe en el sistema");		 
	 }
	 elseif(isset($_REQUEST['txtCodigo']) && isset($_REQUEST['txtNombreNuevo']) && isset($_REQUEST['cboEstado']))
	 {
		 $categoria = new Categoria_Producto();
		 $categoria->setIdCategoriaProducto($_REQUEST['txtCodigo']);
		 $categoria->setNombreCategoriaProducto(strtoupper($_REQUEST['txtNombreNuevo']));
		 $categoria->setEstadoCategoriaProducto($_REQUEST['cboEstado']);
		 
		 $admin = new Administrador();
		 $categoriaxx = $admin->modificarCategoriaProducto($categoria->getIdCategoriaProducto(), $categoria->getNombreCategoriaProducto
		 													(),$categoria->getEstadoCategoriaProducto());
		 
		 while ($registro = mysql_fetch_array($categoriaxx))
		 {
			 $existe = $registro['v_existe'];	
			 break;
		 }
		 
		 if ($existe == 1)
			 echo "La categoria producto '".$categoria->getNombreCategoriaProducto()."' ha sido modificada satisfactoriamente";
		 else
		 	 echo "La categoria producto '".$categoria->getNombreCategoriaProducto()."' no existe en el sistema";
	 }	 
	 else
	 	 require("_vista/buscarCategoriaProducto.php");
 }
 
 function eliminar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 require("_modelo/Usuario.php");
		 
		 $nombre_categoria = $_REQUEST['txtNombre'];
		 		 
		 $admin = new Administrador();
	 	 $categoriax = $admin->eliminarCategoriaProducto($nombre_categoria);
		 
		 while ($registro = mysql_fetch_array($categoriax))
		 {
			 $existe = $registro['v_existe'];
			 break;		 
		 }
		 
		 if ($existe != 0)
			 echo "La categoria producto '$nombre_categoria' ha sido eliminada satisfactoriamente";
		 else
		 	 echo "La categoria producto '$nombre_categoria' no existe en el sistema";
	 }
	 else
		 require("_vista/buscarCategoriaProducto.php");
 }