<?php
	include("InterfazDocumentoPago.php");
	
	class FabricaDocumentoPago implements InterfazDocumentoPago
	{
		static public function crearDocumentoPago($id_documento_pago,$fecha_emision_documento_pago,$fecha_vencimiento_documento_pago,$total_documento_pago,$estado_documento_pago)
		{
			return new Documento_Pago($id_documento_pago,$fecha_emision_documento_pago,$fecha_vencimiento_documento_pago,$total_documento_pago,$estado_documento_pago);
		}
		
		static public function crearDetalleDocumentoPago($id_producto,$nombre_producto,$precio_producto,$cantidad_producto)
		{
			return new Detalle_Documento_Pago($id_producto,$nombre_producto,$precio_producto,$cantidad_producto);
		}
	}
?>