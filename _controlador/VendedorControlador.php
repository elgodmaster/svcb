<?php
 require("_modelo/Cliente.php");
 require("_modelo/FabricaCliente.php");
 require("_modelo/Documento_Pago.php");
 require("_modelo/FabricaDocumentoPago.php");
 require("_modelo/Usuario.php");
 require("_modelo/FabricaUsuario.php");

 function vender()
 {	 	 
	 if (isset($_REQUEST['txtCliente']) && isset($_REQUEST['txtFactura']))
	 {
		 require("_modelo/Provincia.php");
		 require("_modelo/Comuna.php");
		 require("_controlador/Fecha.php");
		 
		 $dia = $_REQUEST['txtDia'];
		 $mes = strtolower($_REQUEST['txtMes']);
		 $ano = $_REQUEST['txtAno'];		
		 $mes2 = nombreMes($mes);		 
		 $fecha = "$ano-$mes2-$dia";
		 
		 $id_cliente = addslashes($_REQUEST['txtRut']);
		 $nombre_cliente = addslashes(strtoupper($_REQUEST['txtCliente']));
		 $direccion_cliente = addslashes(strtoupper($_REQUEST['txtDireccion']));
		 $telefono_cliente = addslashes($_REQUEST['txtTelefono']);
		 $email_cliente = 'N/A';
		 $giro_cliente = addslashes(strtoupper($_REQUEST['txtGiro']));
		 
		 $cliente = FabricaCliente::crearCliente($id_cliente,$nombre_cliente,$direccion_cliente,$telefono_cliente,$email_cliente,$giro_cliente);
		 
		 $provincia = new Provincia();
		 $provincia->setNombreProvincia(addslashes(strtoupper($_REQUEST['txtProvincia'])));
		 $comuna = new Comuna();
		 $comuna->setNombreComuna(addslashes(strtoupper($_REQUEST['txtComuna'])));
		 
		 $documento = FabricaDocumentoPago::crearDocumentoPago($_REQUEST['txtFactura'],addslashes($fecha),date("Y-m-d",strtotime(addslashes($_REQUEST['txtVencimiento']))),$_REQUEST['txtTotal2'],'N/A');
		 $documento->setCondicionesVentaDocumentoPago(addslashes(strtoupper($_REQUEST['txtCondiciones'])));
		 $documento->setOrdenCompraDocumentoPago($_REQUEST['txtOrden']);
		 $documento->setGuiaDespachoDocumentoPago($_REQUEST['txtGuia']);
		 $documento->setNetoDocumentoPago($_REQUEST['txtNeto']);
		 $documento->setIvaDocumentoPago($_REQUEST['txtIva']);
		 
		 //Obtenemos el contenido de la factura en arrays
		  /*$cantidad = $_POST['txtCantidad'];
		  $detalle = $_POST['txtDetalle'];
		  $preunitario = $_POST['txtUnitario'];
		  $descuento = $_POST['txtDescuento'];
		  $total = $_POST['txtTotal'];*/
		 
		 $vendedor = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
		 $documentox = $vendedor->realizarVenta($documento->getIdDocumentoPago(),$documento->getFechaEmisionDocumentoPago(),$documento->getFechaVencimientoDocumentoPago(),$documento->getTotalDocumentoPago(),$_SESSION['id_usuario'],$cliente->getIdCliente());
		 $registro = mysql_fetch_array($documentox);
		 $existe = $registro['v_existe'];
		 
		 if ($existe == 0)
		 {
			 require("test_pdf.php");
			 require("_vista/imprimirFactura.php");
		 }
		 else
		 	 echo "<label>Ha ocurrido un error al realizar la venta. Favor de realizarla nuevamente.</label>";
	 }
	 else
	 {
		 $documento = FabricaDocumentoPago::crearDocumentoPago('N/A','N/A','N/A','N/A','N/A');
		 $consulta = $documento->codigoSiguiente();
		 $id_documento = 0;
		 $reg = mysql_fetch_array($consulta);
		 $id_documento = $reg['codigo'];
		 require("_vista/realizarVenta.php");
	 }
 }
 
 function cobrar()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 $codigo_factura = $_REQUEST['txtNombre'];
	 	 $vendedor = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
	 	 $documentox = $vendedor->realizarCobro($codigo_factura);
		
		 $num_rows = mysql_num_rows($documentox);
		
		 if($num_rows != 0)
		 {
			 $registro=mysql_fetch_assoc($documentox);
			 
			 if($registro['v_existe'] == 2)
			 {
				 $documento = FabricaDocumentoPago::crearDocumentoPago($registro['id_documento_pago'],$registro['fecha_emision_documento_pago'],$registro['fecha_vencimiento_documento_pago'],$registro['total_documento_pago'],$registro['estado_documento_pago']);
				 $id_cliente = $registro['cliente_id_cliente'];
			 }
			 elseif($registro['v_existe'] == 1)
			 {
				 echo "<label>La factura N '$codigo_factura' se encuentra pagada o anulada.</label>";
				 exit;
			 }
			 else
			 {
				 echo "<label>La factura N '$codigo_factura' no existe en el sistema.</label>";
				 exit;
			 }
			
			 require("_vista/actualizarEstadoCobro.php");
		 }
		 else
			 echo "<label>La factura N° '$codigo_factura' no existe en el sistema.</label>";
	 }
	 elseif(isset($_REQUEST['txtCodigo']) && isset($_REQUEST['cboEstado']))
	 {
		 $documento = FabricaDocumentoPago::crearDocumentoPago($_REQUEST['txtCodigo'],'N/A','N/A','N/A',$_REQUEST['cboEstado']);
		 $vendedor = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
		 $documentoxx = $vendedor->cambiarEstadoCobro($documento->getIdDocumentoPago(),$documento->getEstadoDocumentoPago());
		 $registro = mysql_fetch_array($documentoxx);
		 $existe = $registro['v_existe'];
		 
		 if ($existe == 1)
			 echo "<label>La Factura '".$documento->getIdDocumentoPago()."' ha sido ".strtolower($documento->getEstadoDocumentoPago())." satisfactoriamente.</label>";
		 else
		 	 echo "<label>La Factura '".$documento->getIdDocumentoPago()."' no existe en el sistema.</label>";
	 }	 
	 else
	 	 require("_vista/realizarCobro.php");
 }
 
 function listarclientes()
 {
	 if (isset($_REQUEST['txtNombre']))
	 {
		 require("_modelo/Documento_Pago_PDF.php");
		 
		 $nombre_cliente = $_REQUEST['txtNombre'];
		 $vendedor = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
		 $documentox = $vendedor->listarFactura($nombre_cliente);
		 $num_rows = mysql_num_rows($documentox);
	 
		 if($num_rows != 0)
	 	 {
			 $out = array();
			 $out2 = array();
			 
			 while ($registro = mysql_fetch_assoc($documentox))
			 {
				 $documento = FabricaDocumentoPago::crearDocumentoPago($registro['id_documento_pago'],$registro['fecha_emision_documento_pago'],$registro['fecha_vencimiento_documento_pago'],$registro['total_documento_pago'],$registro['estado_documento_pago']);
				 $cliente_name=$registro['cliente_id_cliente'];
				 $out[]= $documento;
			 }
			 
			 $pdf = new Documento_Pago_PDF();
			 $doc_pdfx = $pdf->listarFacturaPDF($cliente_name);			 
			 
			 while ($registro2 = mysql_fetch_assoc($doc_pdfx))
			 {
				 $doc_pdf = new Documento_Pago_PDF();
				 $doc_pdf->setIdDocumentoPagoPDF($registro2['id_documento_pago']);	
				 $out2[]= $doc_pdf;
			 }
			 
			 require("_vista/ventasxCliente2.php");
		 }
		 else
		 {
		 	 echo "<label>El cliente '$nombre_cliente' no registra ventas en el sistema.</label>";
			 exit;
		 }
	 }
	 else
		 require("_vista/ventasxCliente.php");
 }
 
 function listarclientesmorosos()
 {
	 $vendedor = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
	 $documentox = $vendedor->reporteClientesMorosos();
	 $num_rows = mysql_num_rows($documentox);
	 
	if($num_rows != 0)
	{
		$out1 = array();
		$out2 = array();
		
		while ($registro = mysql_fetch_assoc($documentox))
		{
			$cliente = FabricaCliente::crearCliente($registro['id_cliente'],$registro['nombre_cliente'],'N/A','N/A','N/A','N/A');
			$documento = FabricaDocumentoPago::crearDocumentoPago($registro['id_documento_pago'],$registro['fecha_emision_documento_pago'],$registro['fecha_vencimiento_documento_pago'],$registro['total_documento_pago'],'N/A');
			$out1[] = $documento;
			$out2[] = $cliente;
		}
		
		require("_vista/clienteMoroso.php");
	}
	else
	{
		echo "<label>¡Felicitaciones! No existen clientes morosos en el sistema.</label>";
		exit;
	}
 }
 
 function alertacobros()
 {
	 $vendedor = FabricaUsuario::crearUsuario($_SESSION['id_usuario'],$_SESSION['nombre_usuario'],$_SESSION['apat_usuario'],$_SESSION['amat_usuario'],$_SESSION['estado_usuario'],$_SESSION['codigo_usuario']);
	 $documentox = $vendedor->alertaCobros();
	 
	 $num_rows = mysql_num_rows($documentox);
	 
	if($num_rows != 0)
	{
		$out1 = array();
		$out2 = array();
		
		while ($registro = mysql_fetch_assoc($documentox))
		{
			$cliente = FabricaCliente::crearCliente('N/A',$registro['nombre_cliente'],'N/A','N/A','N/A','N/A');
			$documento = FabricaDocumentoPago::crearDocumentoPago($registro['id_documento_pago'],'N/A',$registro['fecha_vencimiento_documento_pago'],$registro['total_documento_pago'],'N/A');
			$out1[] = $documento;
			$out2[] = $cliente;
		}
		$fin = $num_rows-1;
		require("_vista/alertaCobros.php");
	}
 }
 
 function listarnotasdeventa()
 {
	$ruta = "facturas_imagen/notas_venta";
	if (is_dir($ruta))
    {
        // Abrimos el directorio y comprobamos que 
        if ($aux = opendir($ruta))
        {
            while (($archivo = readdir($aux)) !== false)
            {
			$imagenes[] = $archivo;
            }
             
            closedir($aux);
        }
		require("_vista/listarNotaVenta.php");
    }
    else
    {
        echo "<br /><label>No es ruta v&aacute;lida.</label>";
    }
 }

?>