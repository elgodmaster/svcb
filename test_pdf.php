<?php
	require('lib/fpdf/fpdf.php');
	$pdf = new FPDF();
	
	//Obtenemos los datos que identifican a la factura
	$numfactura = strtoupper($_REQUEST['txtFactura']);
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
	$cantidad = $_POST['txtCantidad'];
	$detalle = $_POST['txtDetalle'];
	$preunitario = $_POST['txtUnitario'];
	$descuento = $_POST['txtDescuento'];
	$total = $_POST['txtTotal'];
	
	//Obtenemos el neto, iva y total de la factura
	$neto = strtoupper($_REQUEST['txtNeto']);
	$iva = strtoupper($_REQUEST['txtIva']);
	$total2 = strtoupper($_REQUEST['txtTotal2']);
	$pdf->AddPage();
	
	//Numero de Factura
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(160);
	$pdf->Cell(20,10,"N°: $numfactura",0,0,'R');	
	$pdf->Ln();
	//Fecha Factura
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(160);
	$pdf->Cell(20,10,"Santiago: $dia de $mes del $año",0,0,'R');
	$pdf->Ln();
	//Cliente
	$pdf->Cell(20,10,"Señor(es): $cliente",0,0,'L');
	$pdf->Ln();
	//Direccion
	$pdf->Cell(20,10,"Dirección: $direccion",0,0,'L');
	//Comuna
	$pdf->Cell(80);
	$pdf->Cell(20,10,"Comuna: $comuna",0,0,'L');
	$pdf->Ln();
	//Rut
	$pdf->Cell(20,10,"RUT: $rut",0,0,'L');
	//Ciudad
	$pdf->Cell(80);
	$pdf->Cell(20,10,"Provincia: $ciudad",0,0,'L');
	$pdf->Ln();
	//Giro
	$pdf->Cell(20,10,"Giro: $giro",0,0,'L');
	//Fono
	$pdf->Cell(80);
	$pdf->Cell(20,10,"Fono: $fono",0,0,'L');
	$pdf->Ln();
	//Texto orden de compra, guia de despacho, condiciones de venta y vencimiento
	$pdf->Cell(45,7,"Orden de Compra n°",0,0,'C');
	$pdf->Cell(45,7,"Guia de despacho n°",0,0,'C');
	$pdf->Cell(45,7,"Condiciones de Venta",0,0,'C');
	$pdf->Cell(45,7,"Vencimiento",0,0,'C');
	$pdf->Ln();
	//Datos de orden de compra, guia de despacho, condiciones de venta y vencimiento
	$pdf->Cell(45,7,$orden,0,0,'C');
	$pdf->Cell(45,7,$guia,0,0,'C');
	$pdf->Cell(45,7,$condiciones,0,0,'C');
	$pdf->Cell(45,7,$vencimiento,0,0,'C');
	$pdf->Ln();
	//Texto cantidad, detalle, precio unitario, total
	$pdf->Cell(45,7,'Cantidad',0,0,'C');
	$pdf->Cell(45,7,'Detalle',0,0,'C');
	$pdf->Cell(45,7,'Precio Unitario',0,0,'C');
	$pdf->Cell(45,7,'Total',0,0,'C');
	$pdf->Ln();
	//Detalle de los productos adquiridos
	for($i=0;$i<count($cantidad);$i++){
		$pdf->Cell(45,7,$cantidad[$i],0,0,'C');
		$pdf->Cell(45,7,$detalle[$i],0,0,'C');
		$pdf->Cell(45,7,$preunitario[$i],0,0,'C');
		$pdf->Cell(45,7,$total[$i],0,0,'C');
		$pdf->Ln();
	}
	//Datos de neto,iva,total
	$pdf->Cell(135,7,'Neto $',0,0,'R');
	$pdf->Cell(45,7,$neto,0,0,'C');
	$pdf->Ln();
	$pdf->Cell(135,7,'IVA $',0,0,'R');
	$pdf->Cell(45,7,$iva,0,0,'C');
	$pdf->Ln();
	$pdf->Cell(135,7,'Total $',0,0,'R');
	$pdf->Cell(45,7,$total2,0,0,'C');
	$pdf->Ln();
	//Guardamos la factura
	$pdf->Output('facturas_pdf/' . $numfactura.'.pdf', 'F');
	
	/*_______________________________________________________*/
	// 				CREACION IMAGEN JPG						 //
	/*_______________________________________________________*/
	
	$image = imagecreatefromjpeg('notaventa.jpg');
	$background = imagecolorallocate($image,0,0,0);
	$color= imagecolorallocate($image,0,0,0);
	$fuente = 'arial.ttf';
	
	imagettftext($image, 15,0,679,61,$color,$fuente, $numfactura);
	imagettftext($image, 10,0,166,189,$color,$fuente, $cliente);
	imagettftext($image, 10,0,544,189,$color,$fuente, $rut);
	//imagettftext($image, 15,0,208,192,$color,$fuente, $atte);
	$fecha = "$dia de $mes del $año";
	imagettftext($image, 10,0,555,205,$color,$fuente, $fono);
	imagettftext($image, 10,0,106,220,$color,$fuente, $fecha);
	imagettftext($image, 10,0,568,220,$color,$fuente, $ciudad);
	imagettftext($image, 10,0,585,235,$color,$fuente, $_SESSION['usuario']);
	//imagettftext($image, 10,0,585,235,$color,$fuente, $vendedor);
	
	$lugar = 330;
	for($i=0;$i<count($detalle);$i++){
		imagettftext($image, 10,0,140,$lugar,$color,$fuente, $cantidad[$i]);
		imagettftext($image, 10,0,220,$lugar,$color,$fuente, $detalle[$i]);
		imagettftext($image, 10,0,570,$lugar,$color,$fuente, $preunitario[$i]);
		imagettftext($image, 10,0,646,$lugar,$color,$fuente, $total[$i]);
		$lugar = $lugar + 21;
	}
	
	imagettftext($image, 10,0,646,813,$color,$fuente, $neto);
	imagettftext($image, 10,0,646,834,$color,$fuente, $iva);
	imagettftext($image, 10,0,646,855,$color,$fuente, $total2);
	
	//header('Location: index.php');
	imagejpeg($image,'facturas_imagen/'.$numfactura.'.jpg');
	
?>