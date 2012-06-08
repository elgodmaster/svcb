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
   while ($registro = mysql_fetch_assoc($documentox))
   {
   ?>
   <tr align="center">
    <td><?php echo $registro['id_documento_pago']?></td>
    <td><?php echo $registro['cliente_id_cliente']?></td>
    <td><?php echo $registro['fecha_emision_documento_pago']?></td>
  	<td><?php echo $registro['fecha_vencimiento_documento_pago']?></td>
    <td><?php echo $registro['total_documento_pago']?></td>
    <td><?php echo $registro['estado_documento_pago']?></td>
   </tr>
   <?php
   }
   ?>
  </table>
 </div>
 
</body>
</html>