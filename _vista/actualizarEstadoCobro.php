<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Realizar Cobro</title>
<script src="lib/js/jquery-1.7.2.min.js"></script>
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

 <div id="formulario">
  <form id="form1" name="form1" method="post">
   <table border="1" width="100%">
 	<tr align="center">
     <td>N° Factura</td>
     <td>Cliente</td>
  	 <td>Fecha Emisión</td>
     <td>Fecha Vencimiento</td>
     <td>Monto Total</td>
     <td>Estado</td>
 	</tr>
 	<tr align="center">
     <td><?php echo $documento->getIdDocumentoPago()?></td>
     <td><?php echo $cliente->getIdCliente()?></td>
  	 <td><?php echo date("d-m-Y",strtotime($documento->getFechaEmisionDocumentoPago()))?></td>
     <td><?php echo date("d-m-Y",strtotime($documento->getFechaVencimientoDocumentoPago()))?></td>
     <td>$<?php echo number_format($documento->getTotalDocumentoPago(),0, ",", ".")?></td>
     <td>
      <select name="cboEstado">
       <option value="IMPAGO" selected="selected">IMPAGO</option>
       <option value="PAGADO">PAGADO</option>
       <option value="ANULADO">ANULADO</option>
  	  </select>
     </td>
	</tr>
    <tr>
     <td colspan="6"><input type="hidden" name="txtCodigo" value="<?php echo $documento->getIdDocumentoPago()?>" /></td>
    </tr>
 	<tr>
  	 <td colspan="6" align="right"><input type="button" name="btnConsultar" value="Realizar Cobro" onClick="get2();" /></td>
 	</tr>
   </table>
  </form>
 </div>
 
 <hr />
 
 <div id="datos2">
 </div>

</body>
</html>