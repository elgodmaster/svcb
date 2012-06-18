<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Ventas por Cliente</title>
</head>

<body>

 <div id="formulario">
  <table border="1" width="100%">
   <tr align="center">
    <td>N° Factura</td>
    <td>Cliente</td>
  	<td>Fecha Emisión</td>
    <td>Fecha Vencimiento</td>
    <td>Monto Total</td>
    <td>Estado</td>
   </tr>
   <?php
   foreach ($out as $documento)
   {
   ?>
   <tr align="center">
    <td><?php echo $documento->getIdDocumentoPago()?></td>
    <td><?php echo $cliente_name?></td>
    <td><?php echo date("d-m-Y",strtotime($documento->getFechaEmisionDocumentoPago()))?></td>
    <td><?php echo date("d-m-Y",strtotime($documento->getFechaVencimientoDocumentoPago()))?></td>
    <td>$<?php echo number_format($documento->getTotalDocumentoPago(),0, ",", ".")?></td>
    <td><?php echo $documento->getEstadoDocumentoPago()?></td>
   </tr>
   <?php
   }
   ?>
  </table>
 </div>
 
</body>
</html>