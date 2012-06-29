<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Imprimir Factura</title>
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="lib/js/popup.js"></script>
<link href="lib/css/formularios.css" rel="stylesheet" type="text/css" />
</head>

<body>

 <div id="imprimir">
  <table border="0" width="100%">
   <tr>
    <td align="center">
     <a href="javascript:CargarFoto('facturas_imagen/<?php echo $documento->getIdDocumentoPago()?>.jpg','533','690')"><img 
     src="facturas_imagen/<?php echo $documento->getIdDocumentoPago()?>.jpg" width="300" height="388" /></a>
    </td>
   </tr>
   <tr>
    <td align="center">
     <label>La venta N°'<?php echo $documento->getIdDocumentoPago()?>' ha sido realizada satisfactoriamente.</label>
     <input type="button" class="button" value="Imprimir Nota Venta" />
     <input type="button" class="button" value="Imprimir Factura" />
    </td>
   </tr>
  </table>
 </div>
 

</body>
</html>