<?php

 function vender()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
	 }
	 else
		 require("_vista/realizarVenta.php");
 }
 
 function cobrar()
 {
	 require("_modelo/Cliente.php");
	 require("_modelo/Usuario.php");
	 require("_modelo/Documento_Pago.php");
	 
	 if (isset($_REQUEST['txtNombre']))
	 {
		 $codigo_factura = $_REQUEST['txtNombre'];
	 
	 	 $vendedor = new Vendedor();
	 	 $documentox = $vendedor->realizarCobro($codigo_factura);
		
		 $num_rows = mysql_num_rows($documentox);
		
		 if($num_rows != 0)
		 {
			 while ($registro=mysql_fetch_assoc($documentox))
			 {
				 if($registro['v_existe'] == 2)
				 {
					 $documento = new Documento_Pago();
					 $documento->setIdDocumentoPago($registro['id_documento_pago']);
					 $documento->setFechaEmisionDocumentoPago($registro['fecha_emision_documento_pago']);
					 $documento->setFechaVencimientoDocumentoPago($registro['fecha_vencimiento_documento_pago']);
					 $documento->setTotalDocumentoPago($registro['total_documento_pago']);
					 $documento->setEstadoDocumentoPago($registro['estado_documento_pago']);
					 $cliente = new Cliente();
					 $cliente->setIdCliente($registro['cliente_id_cliente']);
					 break;
				 }
				 elseif($registro['v_existe'] == 1)
				 {
					 echo("La factura N '$codigo_factura' se encuentra pagada o anulada.");
					 exit;
				 }
				 else
				 {
					 echo("La factura N '$codigo_factura' no existe en el sistema.");
					 exit;
				 }				 
			 }
			 require("_vista/actualizarEstadoCobro.php");
		 }
		 else
			 echo("La factura N° '$codigo_factura' no existe en el sistema.");
	 }
	 elseif(isset($_REQUEST['txtCodigo']) && isset($_REQUEST['cboEstado']))
	 {
		 $documento = new Documento_Pago();
		 $documento->setIdDocumentoPago($_REQUEST['txtCodigo']);
		 $documento->setEstadoDocumentoPago($_REQUEST['cboEstado']);
		 
		 $vendedor = new Vendedor();
		 $documentoxx = $vendedor->cambiarEstadoCobro($documento->getIdDocumentoPago(),$documento->getEstadoDocumentoPago());
		 
		 while ($registro = mysql_fetch_array($documentoxx))
		 {
			 $existe = $registro['v_existe'];
			 break;
		 }
		 
		 if ($existe == 1)
			 echo "La Factura '".$documento->getIdDocumentoPago()."' ha sido ".strtolower($documento->getEstadoDocumentoPago())." 
			 satisfactoriamente.";
		 else
		 	 echo "La Factura '".$documento->getIdDocumentoPago()."' no existe en el sistema.";
	 }	 
	 else
	 	 require("_vista/realizarCobro.php");		 		 
 }
 
 function listarclientes()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 require("_modelo/Usuario.php");
		 require("_modelo/Documento_Pago.php");
		 
		 $nombre_cliente = $_REQUEST['txtNombre'];
		 
		 $vendedor = new Vendedor();
		 $documentox = $vendedor->listarFactura($nombre_cliente);
	 
		 $num_rows = mysql_num_rows($documentox);
	 
		 if($num_rows != 0)
	 	 {
			 $out = array();			 
			 while ($registro = mysql_fetch_assoc($documentox))
			 {
				 $documento = new Documento_Pago();
				 $documento->setIdDocumentoPago($registro['id_documento_pago']);
				 $cliente_name=$registro['cliente_id_cliente'];
				 $documento->setFechaEmisionDocumentoPago($registro['fecha_emision_documento_pago']);
				 $documento->setFechaVencimientoDocumentoPago($registro['fecha_vencimiento_documento_pago']);
				 $documento->setTotalDocumentoPago($registro['total_documento_pago']);
				 $documento->setEstadoDocumentoPago($registro['estado_documento_pago']);
				 $out[]= $documento;
			 }
			 require("_vista/ventasxCliente2.php");
		 }
		 else
		 	 echo "El cliente '$nombre_cliente' no registra ventas en el sistema";
			 exit;
	 }
	 else
		 require("_vista/ventasxCliente.php");
 }
 
 function listarclientesmorosos()
 {
	 require("_modelo/Cliente.php");
	 require("_modelo/Usuario.php");
	 require("_modelo/Documento_Pago.php");
	 
	 $vendedor = new Vendedor();
	 $documentox = $vendedor->reporteClientesMorosos();
	 
	 $num_rows = mysql_num_rows($documentox);
	 
	if($num_rows != 0)
	{
		$out1 = array();
		$out2 = array();
		
		while ($registro = mysql_fetch_assoc($documentox))
		{
			$cliente = new Cliente();
			$cliente->setIdCliente($registro['id_cliente']);
			$cliente->setNombreCliente($registro['nombre_cliente']);
			$documento = new Documento_Pago();
			$documento->setIdDocumentoPago($registro['id_documento_pago']);
			$documento->setFechaEmisionDocumentoPago($registro['fecha_emision_documento_pago']);
			$documento->setFechaVencimientoDocumentoPago($registro['fecha_vencimiento_documento_pago']);
			$documento->setTotalDocumentoPago($registro['total_documento_pago']);
			$out1[] = $documento;
			$out2[] = $cliente;
		}
		require("_vista/clienteMoroso.php");
	}
	else
		echo "¡Felicitaciones! No existen clientes morosos en el sistema.";
		exit;
 }
 
 function alertacobros()
 {
	 require("_modelo/Cliente.php");
	 require("_modelo/Usuario.php");
	 require("_modelo/Documento_Pago.php");
	 
	 $vendedor = new Vendedor();
	 $documentox = $vendedor->alertaCobros();
	 
	 $num_rows = mysql_num_rows($documentox);
	 
	if($num_rows != 0)
	{
		$out1 = array();
		$out2 = array();
		
		while ($registro = mysql_fetch_assoc($documentox))
		{
			$cliente = new Cliente();
			$cliente->setNombreCliente($registro['nombre_cliente']);
			$documento = new Documento_Pago();
			$documento->setIdDocumentoPago($registro['id_documento_pago']);
			$documento->setFechaVencimientoDocumentoPago($registro['fecha_vencimiento_documento_pago']);
			$documento->setTotalDocumentoPago($registro['total_documento_pago']);
			$out1[] = $documento;
			$out2[] = $cliente;
		}
		$fin = $num_rows-1;
		require("_vista/alertaCobros.php");
	}
 }

?>