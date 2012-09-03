<?php
	require('lib/fpdf/fpdf.php');
	
	//Obtenemos los datos que identifican a la factura
	//$documento->getIdDocumentoPago() = strtoupper($_REQUEST['txtFactura']);
	$dia = strtoupper($_REQUEST['txtDia']);
	$mes = strtolower($_REQUEST['txtMes']);
	$mes = ucwords($mes);
	$año = strtoupper($_REQUEST['txtAno']);
	$cliente = strtoupper($_REQUEST['txtCliente']);
	$direccion = strtoupper($_REQUEST['txtDireccion']);
	$rut = strtoupper($_REQUEST['txtRut']);
	$giro = strtoupper($_REQUEST['txtGiro']);
	$ciudad = strtoupper($_REQUEST['txtProvincia']);
	$comuna = strtoupper($_REQUEST['txtComuna']);
	$fono = strtoupper($_REQUEST['txtTelefono']);
	$orden = strtoupper($_REQUEST['txtOrden']);
	$guia = strtoupper($_REQUEST['txtGuia']);
	$condiciones = strtoupper($_REQUEST['txtCondiciones']);
	$vencimiento = strtoupper($_REQUEST['txtVencimiento']);
	
	//Obtenemos el contenido de la factura en arrays
	$codigo = $_POST['txtCodigo'];
	$stock = $_POST['txtStock'];
	$cantidad = $_POST['txtCantidad'];
	$detalle = $_POST['txtDetalle'];
	$preunitario = $_POST['txtUnitario'];
	$descuento = $_POST['txtDescuento'];
	$total = $_POST['txtTotal'];
	
	//Obtenemos el neto, iva y total de la factura
	$neto = strtoupper($_REQUEST['txtNeto']);
	$iva = strtoupper($_REQUEST['txtIva']);
	$total2 = strtoupper($_REQUEST['txtTotal2']);

	$pdf = new FPDF();
	$pdf->AddPage();
	
	//Espacio para bajar numero de factura
	$pdf->Cell(20,10,'',0,0,'R');	
	$pdf->Ln();
	$pdf->Cell(20,10,'',0,0,'R');	
	$pdf->Ln();
	$pdf->Cell(20,10,'',0,0,'R');	
	$pdf->Ln();
	//Numero de Factura
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(130);
	$pdf->Cell(20,10,'N°: '.$documento->getIdDocumentoPago(),0,0,'R');	
	$pdf->Ln();
	//Fecha Factura
	$pdf->Cell(20,14,'',0,0,'R');	
	$pdf->Ln();
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(170);
	$pdf->Cell(20,8,"$dia                          $mes                                                 $año",0,0,'R');
	$pdf->Ln();
	//Cliente
	$pdf->Cell(30,5,'',0,0,'R');
	$pdf->Cell(20,7,"$cliente",0,0,'L');
	$pdf->Ln();
	//Direccion
	$pdf->Cell(30,5,'',0,0,'R');
	$pdf->Cell(20,7,"$direccion",0,0,'L');
	//Comuna
	$pdf->Cell(80);
	$pdf->Cell(30,5,'',0,0,'R');
	$pdf->Cell(20,7,"$comuna",0,0,'L');
	$pdf->Ln();
	//Rut
	$pdf->Cell(30,5,'',0,0,'R');
	$pdf->Cell(20,7,"$rut",0,0,'L');
	//Ciudad
	$pdf->Cell(80);
	$pdf->Cell(30,5,'',0,0,'R');
	$pdf->Cell(20,7,"$ciudad",0,0,'L');
	$pdf->Ln();
	//Giro
	$pdf->Cell(30,5,'',0,0,'R');
	$pdf->Cell(20,7,"$giro",0,0,'L');
	//Fono
	$pdf->Cell(80);
	$pdf->Cell(30,5,'',0,0,'R');
	$pdf->Cell(20,7,"$fono",0,0,'L');
	$pdf->Ln();
	//Texto orden de compra, guia de despacho, condiciones de venta y vencimiento
	// $pdf->Cell(45,5,"Orden de Compra n°",0,0,'C');
	// $pdf->Cell(45,5,"Guia de despacho n°",0,0,'C');
	// $pdf->Cell(45,5,"Condiciones de Venta",0,0,'C');
	// $pdf->Cell(45,5,"Vencimiento",0,0,'C');
	// $pdf->Ln();
	//Datos de orden de compra, guia de despacho, condiciones de venta y vencimiento
	$pdf->Cell(20,15,'',0,0,'R');	
	$pdf->Ln();
	$pdf->Cell(45,5,$orden,0,0,'C');
	$pdf->Cell(45,5,$guia,0,0,'C');
	$pdf->Cell(45,5,$condiciones,0,0,'C');
	$pdf->Cell(45,5,$vencimiento,0,0,'C');
	$pdf->Ln();
	//Texto cantidad, detalle, precio unitario, total
	// $pdf->Cell(45,5,'Cantidad',0,0,'C');
	// $pdf->Cell(45,5,'Detalle',0,0,'C');
	// $pdf->Cell(45,5,'Precio Unitario',0,0,'C');
	// $pdf->Cell(45,5,'Total',0,0,'C');
	// $pdf->Ln();
	//Detalle de los productos adquiridos
		$pdf->Cell(20,17,'',0,0,'R');	
	$pdf->Ln();
	for($i=0;$i<count($cantidad);$i++){
		$pdf->Cell(35,7,$cantidad[$i],0,0,'C');
		$pdf->Cell(100,7,$detalle[$i],0,0,'L');
		$pdf->Cell(20,7,$preunitario[$i],0,0,'C');
		$pdf->Cell(25,7,$total[$i],0,0,'C');
		$pdf->Ln();
	}
	//Datos de neto,iva,total
	$pdf->Cell(150,8,'',0,0,'R');
	$pdf->Cell(45,8,$neto,0,0,'C');
	$pdf->Ln();
	$pdf->Cell(150,8,'',0,0,'R');
	$pdf->Cell(45,8,$iva,0,0,'C');
	$pdf->Ln();
	$pdf->Cell(150,8,'',0,0,'R');
	$pdf->Cell(45,8,$total2,0,0,'C');
	$pdf->Ln();
	//Guardamos la factura
	$pdf->Output('facturas/impresion/'.$documento->getIdDocumentoPago().'.pdf', 'F');
	
	/*_______________________________________________________*/
	// 				CREACION IMAGEN JPG						 //
	/*_______________________________________________________*/
	
	$image = imagecreatefromjpeg('lib/img/notaventa.jpg');
	$background = imagecolorallocate($image,0,0,0);
	$color= imagecolorallocate($image,0,0,0);
	$fuente = 'lib/font/arial.ttf';
	
	imagettftext($image, 15,0,659,67,$color,$fuente, $documento->getIdDocumentoPago());
	imagettftext($image, 10,0,166,189,$color,$fuente, $cliente);
	imagettftext($image, 10,0,546,189,$color,$fuente, $rut);
	//imagettftext($image, 15,0,208,192,$color,$fuente, $atte);
	$fecha = "$dia de $mes del $año";
	imagettftext($image, 10,0,555,205,$color,$fuente, $fono);
	imagettftext($image, 10,0,108,220,$color,$fuente, $fecha);
	imagettftext($image, 10,0,568,220,$color,$fuente, $ciudad);
	imagettftext($image, 10,0,585,235,$color,$fuente, $_SESSION['id_usuario']);
	//imagettftext($image, 10,0,585,235,$color,$fuente, $vendedor);
	
	$lugar = 330;
	for($i=0;$i<count($detalle);$i++){
		if ($codigo[$i] != '')
			imagettftext($image, 10,0,75,$lugar,$color,$fuente,$codigo[$i]);
		else
			imagettftext($image, 10,0,75,$lugar,$color,$fuente,'PERS.');
		
		imagettftext($image, 10,0,140,$lugar,$color,$fuente, $cantidad[$i]);
		imagettftext($image, 10,0,220,$lugar,$color,$fuente, $detalle[$i]);
		imagettftext($image, 10,0,550,$lugar,$color,$fuente, $preunitario[$i]);
		imagettftext($image, 10,0,646,$lugar,$color,$fuente, $total[$i]);
		$lugar = $lugar + 22;
	}
	
	imagettftext($image, 10,0,646,810,$color,$fuente, $neto);
	imagettftext($image, 10,0,646,830,$color,$fuente, $iva);
	imagettftext($image, 10,0,646,851,$color,$fuente, $total2);
	
	imagettftext($image, 10,0,243,870,$color,$fuente,$condiciones);
	imagettftext($image, 10,0,219,892,$color,$fuente,$vencimiento);
	
	imagejpeg($image,'facturas/imagen/'.$documento->getIdDocumentoPago().'.jpg');
	
	
	/* PASAR A PDF LA NOTA DE VENTA*/
	
	$pdfx = new FPDF('P','mm','Letter');
	$pdfx->AddPage();
	$pdfx->SetFont('Arial','',15);
	$pdfx->Cell(40,20);
	$pdfx->Image('facturas/imagen/'.$documento->getIdDocumentoPago().'.jpg' , 0 ,3, 216 , 279,'JPG');
	$pdfx->Output('facturas/pdf/'.$documento->getIdDocumentoPago().'.pdf', 'F');
	
?>