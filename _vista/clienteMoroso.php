<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clientes Morosos</title>
<link href="lib/css/tablas.css" rel="stylesheet" type="text/css" />
</head>

<body>
 <h2>Clientes Morosos</h2>
 <div id="formulariox">
  <table border="0" width="100%">
   <thead>
    <tr>
     <th scope="col">RUN Cliente</th>
     <th scope="col">Nombre Cliente</th>
     <th scope="col">N° Factura</th>
     <th scope="col">Fecha Emisión</th>
     <th scope="col">Fecha Vencimiento</th>
     <th scope="col">Monto Total</th>
    </tr>
   </thead>
   <tbody>
   <?php
   for($i=0;$i<count($out1);$i++)
   {
	    if ($i%2==0){
		   echo '<tr align="center">';
		}else{
			echo '<tr class="odd" align="center">';
		}
   ?>
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
   </tbody>
  </table>
 </div>
 
</body>
</html>