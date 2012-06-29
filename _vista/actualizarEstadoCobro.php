<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Actualizar Estado Cobro</title>
<script src="lib/js/jquery-1.7.2.min.js"></script>
<link href="lib/css/tablas.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	function get2(){
		$.post('indexx.php?controlador=vendedor&accion=cobrar', { 
		txtCodigo: form1.txtCodigo.value , cboEstado: form1.cboEstado.value },
		function(output){
			$('#datos2').html(output).show();
			});
		}
</script>
</head>

<body>

 <div id="formulariox">
  <form id="form1" name="form1" method="post">
   <table border="0" width="100%">
    <thead>
     <tr>
      <th scope="col">N° Factura</th>
      <th scope="col">RUN Cliente</th>
      <th scope="col">Fecha Emisión</th>
      <th scope="col">Fecha Vencimiento</th>
      <th scope="col">Monto Total</th>
     </tr>
    </thead>
    <tbody>
     <tr align="center">
      <td><?php echo $documento->getIdDocumentoPago()?></td>
      <td><?php echo $cliente->getIdCliente()?></td>
  	  <td><?php echo date("d-m-Y",strtotime($documento->getFechaEmisionDocumentoPago()))?></td>
      <td><?php echo date("d-m-Y",strtotime($documento->getFechaVencimientoDocumentoPago()))?></td>
      <td>$<?php echo number_format($documento->getTotalDocumentoPago(),0, ",", ".")?></td>      
     </tr>
    </tbody>
    <input type="hidden" name="txtCodigo" value="<?php echo $documento->getIdDocumentoPago()?>" />
   </table>
   <br />
    <dd>
     <label>Estado Documento</label>    
     <select name="cboEstado">
      <option value="IMPAGO" selected="selected">IMPAGO</option>
      <option value="PAGADO">PAGADO</option>
      <option value="ANULADO">ANULADO</option>
  	 </select>    
    </dd>
    <dd>
     <input type="button" class="button" name="btnConsultar" value="Realizar Cobro" onClick="get2();" />
     <input type="button" class="button" value="Restablecer" onClick="get();" />
    </dd>
   
  </form>
 </div>
 
 <hr />
 
 <div id="datos2">
 </div>

</body>
</html>