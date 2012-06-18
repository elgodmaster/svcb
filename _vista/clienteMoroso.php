<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Clientes Morosos</title>
</head>

<body>
 <h2>Clientes Morosos</h2>
 <div id="formulario">
  <table border="1" width="100%">
   <tr align="center">    
    <td>RUN Cliente</td>
    <td>Nombre Cliente</td>
    <td>N° Factura</td>
  	<td>Fecha Emisión</td>
    <td>Fecha Vencimiento</td>
    <td>Monto Total</td>
   </tr>
   <?php
   for($i=0;$i<count($out1);$i++)
   {
   ?>
   <tr align="center">
    <td><?php echo $out2[$i]->getIdCliente()?></td>
    <td><?php echo $out2[$i]->getNombreCliente()?></td>
    <td><?php echo $out1[$i]->getIdDocumentoPago()?></td>    
    <td><?php echo date("d-m-Y",strtotime($out1[$i]->getFechaEmisionDocumentoPago()))?></td>
    <td><?php echo date("d-m-Y",strtotime($out1[$i]->getFechaVencimientoDocumentoPago()))?></td>
    <td>$<?php echo number_format($out1[$i]->getTotalDocumentoPago(),0, ",", ".")?></td>
   </tr>
   <?php
   }
   ?>
  </table>
 </div>
 
</body>
</html>