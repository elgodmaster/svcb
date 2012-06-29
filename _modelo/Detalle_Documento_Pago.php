<?php
 class Detalle_Documento_Pago
 {
	 //Variables de la clase Detalle_Documento_Pago
	 private $id_producto;
	 private $nombre_producto;
	 private $precio_producto;
	 private $cantidad_producto;
	 
	 //Get de la clase Detalle_Documento_Pago
	 function getIdProducto()
	 {
		 return $this->id_producto;
	 }
	 
	 function getNombreProducto()
	 {
		 return $this->nombre_producto;
	 }
	 
	 function getPrecioProducto()
	 {
		 return $this->precio_producto;
	 }
	 
	 function getCantidadProducto()
	 {
		 return $this->cantidad_producto;
	 }
	 
	 //Set de la clase Detalle_Documento_Pago
	 function setIdProducto($id_producto)
	 {
		 $this->id_producto = $id_producto;
	 }
	 
	 function setNombreProducto($nombre_producto)
	 {
		 $this->nombre_producto = $nombre_producto;
	 }
	 
	 function setPrecioProducto($precio_producto)
	 {
		 $this->precio_producto = $precio_producto;
	 }
	 
	 function setCantidadProducto($cantidad_producto)
	 {
		 $this->cantidad_producto = $cantidad_producto;
	 }
 }
?>