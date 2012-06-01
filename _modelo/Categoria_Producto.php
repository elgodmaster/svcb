<?php
 class Categoria_Producto
 {
	 //Variables de la clase
	 private $id_categoria_producto;
	 private $nombre_categoria_producto;
	 private $estado_categoria_producto;
	 
	 //Metodo utilizado para obtener el codigo siguiente de la categoria producto
	 function codigoSiguiente()
	 {
		 $link = conexion();
		 $sp = "SELECT IFNULL(MAX(id_categoria_producto),0)+1 as codigo FROM categoria_producto";
		 $consulta = mysql_query($sp,$link);
		 close($link);
		 return $consulta;
	 }
	 
	 function todosProductos()
	 {
		 $link = conexion();
		 $sp = "SELECT id_categoria_producto, nombre_categoria_producto FROM categoria_producto";
		 $sp.= " WHERE estado_categoria_producto = 'ACTIVO' ORDER BY nombre_categoria_producto";
		 $consulta = mysql_query($sp,$link);
		 close($link);
		 return $consulta;
	 }
	 
	 //Get de la clase Categoria_Producto
	 function getIdCategoriaProducto()
	 {
		 return $this->id_categoria_producto;
	 }
	 
	 function getNombreCategoriaProducto()
	 {
		 return $this->nombre_categoria_producto;
	 }
	 
	 function getEstadoCategoriaProducto()
	 {
		 return $this->estado_categoria_producto;
	 }
	 
	 //Set de la clase Categoria_Producto
	 function setIdCategoriaProducto($id_categoria_producto)
	 {
		 $this->id_categoria_producto = $id_categoria_producto;
	 }
	 
	 function setNombreCategoriaProducto($nombre_categoria_producto)
	 {
		 $this->nombre_categoria_producto = $nombre_categoria_producto;
	 }
	 
	 function setEstadoCategoriaProducto($estado_categoria_producto)
	 {
		 $this->estado_categoria_producto = $estado_categoria_producto;
	 }
 }
?>