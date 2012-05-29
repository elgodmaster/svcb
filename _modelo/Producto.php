<?php 
 class Producto
 {
	 //Variables de la clase Producto
	 private $id_producto;
	 private $nombre_producto;
	 private $descripcion_producto;
	 private $precio_producto;
	 private $estado_producto;
	 private $stock_minimo_producto;
	 private $stock_real_producto;
	 
	//Metodo utilizado para obtener el codigo siguiente del producto
	function codigoSiguiente()
	{
	}
	
	//Metodo utilizado para insertar un producto a la base de datos
	function insertarProducto()
	{
	}
	
	//Metodo utilizado para actualizar un producto
	function actualizarProducto()
	{
	}
	
	//Metodo utilizado para buscar un producto
	function buscarProducto()
	{
	}
	
	//Metodo utilizado para obtener todos los productos
	function buscarProductoTodos()
	{
	}
	
	//Get de la clase Producto
	function getCodigoProducto()
	{
		return $this->id_producto;
	}
	
	function getNombre()
	{
		return $this->nombre_producto;
	}
	
	function getDescripcion()
	{
		return $this->descripcion_producto;
	}
	
	function getPrecio()
	{
		return $this->precio_producto;
	}
	
	function getEstado()
	{
		return $this->estado_producto;
	}
	
	function getStockMinimo()
	{
		return $this->stock_minimo_producto;
	}
	
	function getStockReal()
	{
		return $this->stock_real_producto;
	}
	
	//Set de la clase Producto
	function setCodigoProducto($id_producto)
	{
		$this->id_producto = $id_producto;
	}
	
	function setNombre($nombre_producto)
	{
		$this->nombre_producto = $nombre_producto;
	}
	
	function setDescripcion($descripcion_producto)
	{
		$this->descripcion_producto = $descripcion_producto;
		
	}
	
	function setPrecio($precio_producto)
	{
		$this->precio_producto = $precio_producto;
	}
	
	function setEstado($estado_producto)
	{
		$this->estado_producto = $estado_producto;
	}
	
	function setStockMinimo($stock_minimo_producto)
	{
		$this->stock_minimo_producto = $stock_minimo_producto;
	}
	
	function setStockReal($stock_real_producto)
	{
		$this->stock_real_producto = $stock_real_producto;
		
	}		
 }
?>