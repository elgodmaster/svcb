<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<script src="jquery-1.7.2.min.js"></script>
<script type="text/javascript" src='lib/js/jquery.autocomplete.js'></script>
<link href="lib/css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
id=0;
function agregar() {
	id=id+1;
	$("#cantidad").append('<div id="area'+id+'"><input type="text" name="txtCantidad[]" size="5" /></div>');
	$("#detalle").append('<div id="area'+id+'"><input type="text" name="txtDetalle[]" size="35" /></div>');
	$("#unitario").append('<div id="area'+id+'"><input type="text" name="txtUnitario[]" size="5" /></div>');
	$("#descuento").append('<div id="area'+id+'"><input type="text" name="txtDescuento[]" size="5" /></div>');
	$("#total").append('<div id="area'+id+'"><input type="text" name="txtTotal[]" size="15" onBlur="javascript:sumar();"/><a style="cursor:pointer" onclick="javascript:borrar('+id+'); javascript:sumar();"><img src="lib/img/quitar.png" width="16" height="16" /></a></div>');
}
function borrar(cual) {
	$("#area"+cual).remove();
	$("#area"+cual).remove();
	$("#area"+cual).remove();
	$("#area"+cual).remove();
	$("#area"+cual).remove();
	return false;
}
</script>
<script language="javascript">
function sumar(){
var total = 0;
var elem = document.getElementsByName('txtTotal[]');
for (i=0;i<elem.length;i++){
  total += parseInt(elem[i].value);
}
document.form1.txtTotal2.value = total;
}
</script>
<script type="text/javascript">
  $().ready(function() {
	$("#txtCliente").autocomplete("lib/ajax/cliente.php", {
      width: 153,
      matchContains: true,
      selectFirst: false
    });
  });
</script>
<script type="text/javascript">
  $().ready(function() {
	$("#txtDetalle").autocomplete("lib/ajax/producto.php", {
      width: 243,
      matchContains: true,
      selectFirst: false
    });
  });
</script>
<script type="text/javascript">
function restults(data) {
	$("#txtDireccion").val(data.direccion_cliente);
	$("#txtRut").val(data.id_cliente);
	$("#txtComuna").val(data.comuna_id_comuna);
	$("#txtGiro").val(data.giro_cliente);
	$("#txtTelefono").val(data.telefono_cliente);
	}
	$(document).ready(function(){
		$("#btnCargar").click(function(){
			var search_term = $("#txtCliente").val();
			$.ajax({
				data: "id="+search_term,
				type: "POST",
				dataType: "json",
				url: "lib/ajax/cliente_factura.php",
				success: function(data){
					restults(data);
				}
			});
		});
	});
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="test_pdf.php">
<table width="675" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="675" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="350" align="center"><h2>Rodolfo Guillermo Vargas Araya</h2>
        <h3>Fabrica de galvanos, insignias, trofeos, llaveros, cu&ntilde;os en seco, matriceria</h3>
        <p>Bismarck 1261 - FonoFax 4572063</p>
        <p>Fonos 4572063 - 7739424</p>
        <p>Quinta Normal Santiago</p>
        </td>
        <td align="right" width="350"><h1>RUT: 4.754.432-7</h1>
        <h1>FACTURA</h1>
        <h1>N&deg;
          <label for="txtFactura"></label>
  <input name="txtFactura" type="text" id="txtFactura" />
        </h1></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="675" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="4" align="right"><p>Santiago
          <label for="txtDia"></label>
          <input size="5" type="text" name="txtDia" id="txtDia" />
          de 
          <label for="txtMes"></label>
          <input type="text" name="txtMes" id="txtMes" />
        del 
        <label for="txtAno"></label>
        <input size="5" type="text" name="txtAno" id="txtAno" />
        </p>
        </td>
        </tr>
      <tr>
        <td width="80"><p>Se&ntilde;or(es) 
          <label for="txtCliente"></label>
        </p></td>
        <td width="260"><input name="txtCliente" type="text" id="txtCliente" />  <input type="button" name="btnCargar" id="btnCargar" value="Cargar Datos" /></td>
        <td colspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td><p>Direcci&oacute;n 
          <label for="txtDireccion"></label>
        </p></td>
        <td><input name="txtDireccion" type="text" id="txtDireccion" readonly="readonly" /></td>
        <td width="80"><p>Ciudad 
          <label for="cboComuna"></label>
          <label for="txtCiudad"></label>
        </p></td>
        <td width="255"><input name="txtCiudad" type="text" id="txtCiudad" /></td>
      </tr>
      <tr>
        <td><p>RUT 
          <label for="txtRut"></label>
        </p></td>
        <td><input name="txtRut" type="text" id="txtRut" readonly="readonly" /></td>
        <td><p>Comuna 
          <label for="cboCiudad"></label>
          <label for="txtComuna"></label>
        </p></td>
        <td><input name="txtComuna" type="text" id="txtComuna" readonly="readonly" /></td>
      </tr>
      <tr>
        <td><p>Giro 
          <label for="txtGiro"></label>
        </p></td>
        <td><input name="txtGiro" type="text" id="txtGiro" readonly="readonly" /></td>
        <td><p>Fono 
          <label for="txtTelefono"></label>
        </p></td>
        <td><input name="txtTelefono" type="text" id="txtTelefono" readonly="readonly" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="675" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="168" align="center">Orden de Compra n&deg;</td>
        <td width="168" align="center">Guia de Despacho n&deg;</td>
        <td width="168" align="center">Condiciones de Venta</td>
        <td width="171" align="center">Vencimiento</td>
      </tr>
      <tr>
        <td align="center"><label for="txtOrden"></label>
          <input size="5" type="text" name="txtOrden" id="txtOrden" /></td>
        <td align="center"><label for="txtGuia"></label>
          <input size="5" type="text" name="txtGuia" id="txtGuia" /></td>
        <td align="center"><label for="txtCondiciones"></label>
          <input type="text" name="txtCondiciones" id="txtCondiciones" /></td>
        <td align="center"><label for="txtVencimiento"></label>
          <input type="text" name="txtVencimiento" id="txtVencimiento" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="675" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="5"><table width="675" border="0" cellspacing="0" cellpadding="0">
          <tr>
              <td>Por lo siguiente:</td>
              </tr>
        </table></td>
        </tr>
      <tr>
        <td width="97" align="center"><p>Cantidad</p></td>
        <td width="224" align="center"><p>Detalle</p></td>
        <td width="104" align="center"><p>Precio Unitario</p></td>
        <td width="83" align="center"><p>Descuento</p></td>
        <td width="167" align="center"><p>Total</p></td>
        </tr>
      <tr>
        <td align="center" id="cantidad"><label for="txtCantidad"></label>
          <input size="5" type="text" name="txtCantidad[]" id="txtCantidad" /></td>
        <td align="center" id="detalle"><label for="txtDetalle"></label>
          <input name="txtDetalle[]" type="text" id="txtDetalle" size="35" /></td>
        <td align="center" id="unitario"><label for="txtUnitario"></label>
          <input name="txtUnitario[]" type="text" id="txtUnitario" size="5" /></td>
        <td align="center" id="descuento"><label for="txtDescuento"></label>
          <input size="5" type="text" name="txtDescuento[]" id="txtDescuento" /></td>
        <td align="center" id="total"><label for="txtTotal"></label>
          <input name="txtTotal[]" type="text" id="txtTotal" onChange="javascript:sumar();" size="15" /><a href="javascript:agregar();"><img src="lib/img/agregar.png" width="16" height="16" /></a></td>
      </tr>
      </table></td>
  </tr>
  <tr>
    <td><table width="675" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="504" align="right">Neto $</td>
        <td width="171" align="center"><label for="txtNeto"></label>
          <input name="txtNeto" type="text" id="txtNeto" size="15" /></td>
      </tr>
      <tr>
        <td align="right">IVA $</td>
        <td align="center"><label for="txtIva"></label>
          <input name="txtIva" type="text" id="txtIva" size="15" /></td>
      </tr>
      <tr>
        <td align="right">Total $</td>
        <td align="center"><label for="txtTotal"></label>
          <input name="txtTotal2" type="text" id="txtTotal" size="15" readonly="readonly" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="right"><label for="txtArea"></label>      <input type="submit" name="btnEnviar" id="btnEnviar" value="Enviar" /></td>
  </tr>
</table>
</form>
</body>
</html>