<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ventas por Cliente</title>
<script type="text/javascript" src="lib/js/popup.js"></script>
</head>

<body>

 <div id="formulario">
  <table border="1" width="100%">
   <tr align="center">
    <td>N° Factura</td>
    <td>RUN Cliente</td>
  	<td>Fecha Emisión</td>
    <td>Fecha Vencimiento</td>
    <td>Monto Total</td>
    <td>Estado</td>
   </tr>
   <?php
   for($i=0;$i<count($out);$i++)
   {
   ?>
   <tr align="center">
    <td><a href="javascript:CargarFoto('facturas_imagen/<?php echo $out2[$i]->getIdDocumentoPagoPDF()?>.jpg','533','690')"><?php echo $out[$i]->getIdDocumentoPago()?></a></td>
    <td><?php echo $cliente_name?></td>
    <td><?php echo date("d-m-Y",strtotime($out[$i]->getFechaEmisionDocumentoPago()))?></td>
    <td><?php echo date("d-m-Y",strtotime($out[$i]->getFechaVencimientoDocumentoPago()))?></td>
    <td>$<?php echo number_format($out[$i]->getTotalDocumentoPago(),0, ",", ".")?></td>
    <td><?php echo $out[$i]->getEstadoDocumentoPago()?></td>
   </tr>
   <?php
   }
   ?>
  </table>
 </div>
 
</body>
</html>