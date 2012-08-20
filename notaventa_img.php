<?php
	
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

	
	/*_______________________________________________________*/
	// 				CREACION IMAGEN JPG						 //
	/*_______________________________________________________*/
	
	$image = imagecreatefromjpeg('lib/img/notaventa.jpg');
	$background = imagecolorallocate($image,0,0,0);
	$color= imagecolorallocate($image,0,0,0);
	$fuente = 'lib/font/arial.ttf';
	$fecha = "$dia-$mes-$año";
	imagettftext($image, 15,0,679,61,$color,$fuente, $fecha);
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
	
	imagejpeg($image,"facturas_imagen/notas_venta/'$fecha'-'$cliente'.jpg");
	
?>