<?php
 include_once("Detalle_Documento_Pago.php");
 class Documento_Pago
 {
	 //Variables de la clase Documento_Pago
	 private $id_documento_pago;
	 private $condiciones_venta_documento_pago;
	 private $descuento_documento_pago;
	 private $estado_documento_pago;
	 private $fecha_emision_documento_pago;
	 private $fecha_vencimiento_documento_pago;
	 private $guia_despacho_documento_pago;
	 private $iva_documento_pago;
	 private $neto_documento_pago;
	 private $orden_compra_documento_pago;
	 private $total_documento_pago;
	 
	 //Get de la clase Documento_Pago
	 function getIdDocumentoPago()
	 {
		 return $this->id_documento_pago;
	 }
	 
	 function getCondicionesVentaDocumentoPago()
	 {
		 return $this->condiciones_venta_documento_pago;
	 }
	 
	 function getDescuentoDocumentoPago()
	 {
		 return $this->descuento_documento_pago;
	 }
	 
	 function getEstadoDocumentoPago()
	 {
		 return $this->estado_documento_pago;
	 }
	 
	 function getFechaEmisionDocumentoPago()
	 {
		 return $this->fecha_emision_documento_pago;
	 }
	 
	 function getFechaVencimientoDocumentoPago()
	 {
		 return $this->fecha_vencimiento_documento_pago;
	 }
	 
	 function getGuiaDespachoDocumentoPago()
	 {
		 return $this->guia_despacho_documento_pago;
	 }
	 
	 function getIvaDocumentoPago()
	 {
		 return $this->iva_documento_pago;
	 }
	 
	 function getNetoDocumentoPago()
	 {
		 return $this->neto_documento_pago;
	 }
	 
	 function getOrdenCompraDocumentoPago()
	 {
		 return $this->orden_compra_documento_pago;
	 }
	 
	 function getTotalDocumentoPago()
	 {
		 return $this->total_documento_pago;
	 }	 	 
	 
	 //Set de la clase Documento_Pago
	 function setIdDocumentoPago($id_documento_pago)
	 {
		 $this->id_documento_pago = $id_documento_pago;
	 }
	 
	 function setCondicionesVentaDocumentoPago($condiciones_venta_documento_pago)
	 {
		 $this->condiciones_venta_documento_pago = $condiciones_venta_documento_pago;
	 }
	 
	 function setDescuentoDocumentoPago($descuento_documento_pago)
	 {
		 $this->descuento_documento_pago = $descuento_documento_pago;
	 }
	 
	 function setEstadoDocumentoPago($estado_documento_pago)
	 {
		 $this->estado_documento_pago = $estado_documento_pago;
	 }
	 
	 function setFechaEmisionDocumentoPago($fecha_emision_documento_pago)
	 {
		 $this->fecha_emision_documento_pago = $fecha_emision_documento_pago;
	 }
	 
	 function setFechaVencimientoDocumentoPago($fecha_vencimiento_documento_pago)
	 {
		 $this->fecha_vencimiento_documento_pago = $fecha_vencimiento_documento_pago;
	 }
	 
	 function setGuiaDespachoDocumentoPago($guia_despacho_documento_pago)
	 {
		 $this->guia_despacho_documento_pago = $guia_despacho_documento_pago;
	 }
	 
	 function setIvaDocumentoPago($iva_documento_pago)
	 {
		 $this->iva_documento_pago = $iva_documento_pago;
	 }
	 
	 function setNetoDocumentoPago($neto_documento_pago)
	 {
		 $this->neto_documento_pago = $neto_documento_pago;
	 }
	 
	 function setOrdenCompraDocumentoPago($orden_compra_documento_pago)
	 {
		 $this->orden_compra_documento_pago = $orden_compra_documento_pago;
	 }
	 
	 function setTotalDocumentoPago($total_documento_pago)
	 {
		 $this->total_documento_pago = $total_documento_pago;
	 }
 }
?>