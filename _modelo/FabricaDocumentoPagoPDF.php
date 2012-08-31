<?php
	include("InterfazDocumentoPagoPDF.php");
	
	class FabricaDocumentoPagoPDF implements InterfazDocumentoPagoPDF
	{
		static public function crearDocumentoPagoPDF($id_documento_pago_pdf,$cliente_id_cliente)
		{
			return new Documento_Pago_PDF($id_documento_pago_pdf,$cliente_id_cliente);
		}
	}
?>