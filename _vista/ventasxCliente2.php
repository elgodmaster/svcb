<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ventas por Cliente</title>
<script type="text/javascript" src="lib/js/popup.js"></script>
<link href="lib/css/tablas.css" rel="stylesheet" type="text/css" />
</head>

<body>

 <div id="formulariox">
  <table border="0" width="100%">
   <thead>
    <tr>
     <th scope="col">N° Factura</th>
     <th scope="col">RUN Cliente</th>
     <th scope="col">Fecha Emisión</th>
     <th scope="col">Fecha Vencimiento</th>
     <th scope="col">Monto Total</th>
     <th scope="col">Estado</th>
    </tr>
   </thead>
   <tbody>
   <?php
   for($i=0;$i<count($out);$i++)
   {
	   if ($i%2==0){
		   echo '<tr align="center">';
		}else{
			echo '<tr class="odd" align="center">';
		}
   ?>
     <th scope="row" id="<?php echo $out2[$i]->getIdDocumentoPagoPDF()?>">
      <a href="javascript:CargarFoto('facturas_imagen/<?php echo $out2[$i]->getIdDocumentoPagoPDF()?>.jpg','533','690')"><?php echo 
	  $out[$i]->getIdDocumentoPago()?></a>
     </th>
     <td><?php echo $cliente_name?></td>
     <td><?php echo date("d-m-Y",strtotime($out[$i]->getFechaEmisionDocumentoPago()))?></td>
     <td><?php echo date("d-m-Y",strtotime($out[$i]->getFechaVencimientoDocumentoPago()))?></td>
     <td>$<?php echo number_format($out[$i]->getTotalDocumentoPago(),0, ",", ".")?></td>
     <td><?php echo $out[$i]->getEstadoDocumentoPago()?></td>
    </tr>
   <?php
   }
   ?>
   </tbody>
  </table>
 </div>
 
</body>
</html>