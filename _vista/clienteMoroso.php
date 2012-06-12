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
   foreach ($out as $documento)
   {
   ?>
   <tr align="center">
    <!--<td><?php //echo $cliente->getIdCliente()?></td>
    <td><?php //echo $cliente->getNombreCliente()?></td>-->
    <td><?php echo $id_cliente?></td>
    <td><?php echo $name_cliente?></td>
    <td><?php echo $documento->getIdDocumentoPago()?></td>    
    <td><?php echo $documento->getFechaEmisionDocumentoPago()?></td>
    <td><?php echo $documento->getFechaVencimientoDocumentoPago()?></td>
    <td><?php echo $documento->getTotalDocumentoPago()?></td>
   </tr>
   <?php
   }
   ?>
  </table>
 </div>
 
</body>
</html>