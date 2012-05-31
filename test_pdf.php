<?php
	require('lib/fpdf/fpdf.php');
	$pdf = new FPDF();
	//Obtenemos los datos que identifican a la factura
	$numfactura = strtoupper($_REQUEST['txtFactura']);
	$dia = strtoupper($_REQUEST['txtDia']);
	$mes = strtoupper($_REQUEST['txtMes']);
	$año = strtoupper($_REQUEST['txtAno']);
	$cliente = strtoupper($_REQUEST['txtCliente']);
	$direccion = strtoupper($_REQUEST['txtDireccion']);
	$rut = strtoupper($_REQUEST['txtRut']);
	$giro = strtoupper($_REQUEST['txtGiro']);
	//$ciudad = strtoupper($_REQUEST['cboCiudad']);
	//$comuna = strtoupper($_REQUEST['cboComuna']);
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
	$pdf->Cell(20,10,"Comuna: Cerrillos",0,0,'L');
	$pdf->Ln();
	//Rut
	$pdf->Cell(20,10,"RUT: $rut",0,0,'L');
	//Ciudad
	$pdf->Cell(80);
	$pdf->Cell(20,10,"Ciudad: Santiago",0,0,'L');
	$pdf->Ln();
	//Giro
	$pdf->Cell(20,10,"Giro: $giro",0,0,'L');
	//Fono
	$pdf->Cell(80);
	$pdf->Cell(20,10,"Fono: $fono",0,0,'L');
	$pdf->Ln();
	//Texto orden de compra, guia de despacho, condiciones de venta y vencimiento
	$pdf->Cell(45,7,"Orden de Compra n°",1,0,'C');
	$pdf->Cell(45,7,"Guia de despacho n°",1,0,'C');
	$pdf->Cell(45,7,"Condiciones de Venta",1,0,'C');
	$pdf->Cell(45,7,"Vencimiento",1,0,'C');
	$pdf->Ln();
	//Datos de orden de compra, guia de despacho, condiciones de venta y vencimiento
	$pdf->Cell(45,7,$orden,1,0,'C');
	$pdf->Cell(45,7,$guia,1,0,'C');
	$pdf->Cell(45,7,$condiciones,1,0,'C');
	$pdf->Cell(45,7,$vencimiento,1,0,'C');
	$pdf->Ln();
	//Texto cantidad, detalle, precio unitario, total
	$pdf->Cell(45,7,'Cantidad',1,0,'C');
	$pdf->Cell(45,7,'Detalle',1,0,'C');
	$pdf->Cell(45,7,'Precio Unitario',1,0,'C');
	$pdf->Cell(45,7,'Total',1,0,'C');
	$pdf->Ln();
	//Detalle de los productos adquiridos
	for($i=0;$i<count($cantidad);$i++){
		$pdf->Cell(45,7,$cantidad[$i],1,0,'C');
		$pdf->Cell(45,7,$detalle[$i],1,0,'C');
		$pdf->Cell(45,7,$preunitario[$i],1,0,'C');
		$pdf->Cell(45,7,$total[$i],1,0,'C');
		$pdf->Ln();
	}
	//Datos de neto,iva,total
	$pdf->Cell(135,7,'Neto $',1,0,'R');
	$pdf->Cell(45,7,$neto,1,0,'C');
	$pdf->Ln();
	$pdf->Cell(135,7,'IVA $',1,0,'R');
	$pdf->Cell(45,7,$iva,1,0,'C');
	$pdf->Ln();
	$pdf->Cell(135,7,'Total $',1,0,'R');
	$pdf->Cell(45,7,$total2,1,0,'C');
	$pdf->Ln();
	//Guardamos la factura
	$pdf->Output('facturas_pdf/' . $numfactura.'.pdf', 'F'); 
?>