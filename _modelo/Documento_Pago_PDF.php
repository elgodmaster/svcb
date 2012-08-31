<?php
 class Documento_Pago_PDF
 {
	 //Variables de la clase Documento_Pago_PDF
	 private $id_documento_pago_pdf;
	 private $cliente_id_cliente;
	 
	 //Constructor de la clase Documento_Pago_PDF
	 public function __construct($id_documento_pago_pdf,$cliente_id_cliente)
	 {
		 $this->id_documento_pago_pdf = $id_documento_pago_pdf;
		 $this->cliente_id_cliente = $cliente_id_cliente;
	 }
	 
	 function listarFacturaPDF($id_cliente)
	 {
		 $link = conexion();
		 $sp = "call listarFacturaPDF('$id_cliente')";
		 $consulta = mysql_query($sp,$link);
		 close($link);
		 return $consulta;
	 }
	 
	 //Get de la clase Documento_Pago_PDF
	 function getIdDocumentoPagoPDF()
	 {
		 return $this->id_documento_pago_pdf;
	 }
	 
	 function getClienteDocumentoPagoPDF()
	 {
		 return $this->cliente_id_cliente;
	 }
	 
	 //Set de la clase Documento_Pago_PDF
	 function setIdDocumentoPagoPDF($id_documento_pago_pdf)
	 {
		 $this->id_documento_pago_pdf = $id_documento_pago_pdf;
	 }
	 
	 function setClienteDocumentoPagoPDF($cliente_id_cliente)
	 {
		 $this->cliente_id_cliente = $cliente_id_cliente;
	 }
 }
?>