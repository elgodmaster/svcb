<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
/*id=0;
function agregar() {
	id=id+1;
	$("#cantidad").append('<div id="area'+id+'"><input type="text" name="txtCantidad'+id+'" size="5" /></div>');
	$("#detalle").append('<div id="area'+id+'"><input type="text" name="txtDetalle'+id+'" size="20" /></div>');
	$("#unitario").append('<div id="area'+id+'"><input type="text" name="txtUnitario'+id+'" size="5" /></div>');
	$("#descuento").append('<div id="area'+id+'"><input type="text" name="txtDescuento'+id+'" size="5" /></div>');
	$("#total").append('<div id="area'+id+'"><input type="text" name="txtTotal'+id+'" size="20" /><a style="cursor:pointer" onclick="javascript:borrar('+id+');"><img src="lib/img/quitar.png" width="16" height="16" /></a></div>');
}
function borrar(cual) {
	$("#area"+cual).remove();
	$("#area"+cual).remove();
	$("#area"+cual).remove();
	$("#area"+cual).remove();
	$("#area"+cual).remove();
	return false;
}*/
id=0;
function agregar() {
	id=id+1;
	$("#cantidad").append('<div id="area'+id+'"><input type="text" name="txtCantidad[]" size="5" /></div>');
	$("#detalle").append('<div id="area'+id+'"><input type="text" name="txtDetalle[]" size="20" /></div>');
	$("#unitario").append('<div id="area'+id+'"><input type="text" name="txtUnitario[]" size="5" /></div>');
	$("#descuento").append('<div id="area'+id+'"><input type="text" name="txtDescuento[]" size="5" /></div>');
	$("#total").append('<div id="area'+id+'"><input type="text" name="txtTotal[]" size="20" /><a style="cursor:pointer" onclick="javascript:borrar('+id+');"><img src="lib/img/quitar.png" width="16" height="16" /></a></div>');
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
  <input type="text" name="txtFactura" id="txtFactura" />
        </h1></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="675" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="2" align="right"><p>Santiago
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
        <td colspan="2"><p>Se&ntilde;or(es) 
          <label for="txtCliente"></label>
          <input type="text" name="txtCliente" id="txtCliente" />
        </p></td>
        </tr>
      <tr>
        <td><p>Direcci&oacute;n 
          <label for="txtDireccion"></label>
          <input type="text" name="txtDireccion" id="txtDireccion" />
        </p></td>
        <td><p>Ciudad 
            <label for="cboComuna"></label>
          <select name="cboCiudad" id="cboCiudad">
          </select>
        </p></td>
      </tr>
      <tr>
        <td><p>RUT 
          <label for="txtRut"></label>
          <input type="text" name="txtRut" id="txtRut" />
        </p></td>
        <td><p>Comuna 
            <label for="cboCiudad"></label>
          <select name="cboComuna" id="cboComuna">
          </select>
        </p></td>
      </tr>
      <tr>
        <td><p>Giro 
          <label for="txtGiro"></label>
          <input type="text" name="txtGiro" id="txtGiro" />
        </p></td>
        <td><p>Fono 
          <label for="txtTelefono"></label>
          <input type="text" name="txtTelefono" id="txtTelefono" />
        </p></td>
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
        <td width="70" align="center"><p>Cantidad</p></td>
        <td width="189" align="center"><p>Detalle</p></td>
        <td width="122" align="center"><p>Precio Unitario</p></td>
        <td width="111" align="center"><p>Descuento</p></td>
        <td width="183" align="center"><p>Total</p></td>
        </tr>
      <tr>
        <td align="center" id="cantidad"><label for="txtCantidad"></label>
          <input size="5" type="text" name="txtCantidad[]" id="txtCantidad" /></td>
        <td align="center" id="detalle"><label for="txtDetalle"></label>
          <input type="text" name="txtDetalle[]" id="txtDetalle" /></td>
        <td align="center" id="unitario"><label for="txtUnitario"></label>
          <input size="5" type="text" name="txtUnitario[]" id="txtUnitario" /></td>
        <td align="center" id="descuento"><label for="txtDescuento"></label>
          <input size="5" type="text" name="txtDescuento[]" id="txtDescuento" /></td>
        <td align="center" id="total"><label for="txtTotal"></label>
          <input type="text" name="txtTotal[]" id="txtTotal" /><a href="javascript:agregar();"><img src="lib/img/agregar.png" width="16" height="16" /></a></td>
      </tr>
      </table></td>
  </tr>
  <tr>
    <td><table width="675" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="476" align="right">Neto $</td>
        <td width="199" align="center"><label for="txtNeto"></label>
          <input type="text" name="txtNeto" id="txtNeto" /></td>
      </tr>
      <tr>
        <td align="right">IVA $</td>
        <td align="center"><label for="txtIva"></label>
          <input type="text" name="txtIva" id="txtIva" /></td>
      </tr>
      <tr>
        <td align="right">Total $</td>
        <td align="center"><label for="txtTotal"></label>
          <input type="text" name="txtTotal2" id="txtTotal" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="right"><input type="submit" name="btnEnviar" id="btnEnviar" value="Enviar" /></td>
  </tr>
</table>
</form>
</body>
</html>