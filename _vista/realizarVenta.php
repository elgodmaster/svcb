<?php
 date_default_timezone_set("Chile/Continental");
 setlocale(LC_TIME, 'spanish');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Realizar Venta</title>
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src='lib/js/jquery.autocomplete.js'></script>
<script type="text/javascript" src='lib/js/realizar_venta.js'></script>
<script type="text/javascript" src="lib/js/jquery.form.js"></script>
<link href="lib/css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<link href="lib/css/formularios.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	$(document).ready(function() {
		var opciones= {
			beforeSubmit: mostrarLoader,
			success: mostrarRespuesta,
							   
		};
		$('#form1').ajaxForm(opciones);
		function mostrarLoader(){
			$("#loader_gif").fadeIn("slow");
		};
		function mostrarRespuesta (responseText){
			$("#form1").remove();
			$("#loader_gif").fadeOut("slow");
			$("#ajax_loader").append(responseText);
		};
   
	});
</script>

</head>

<body>

<div id="formulario">
<form id="form1" name="form1" method="post" action="indexx.php?controlador=vendedor&accion=vender">
<table width="675" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="675" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="nada" width="350" align="center"><h2>Rodolfo Guillermo Vargas Araya</h2>
        <h3>Fabrica de galvanos, insignias, trofeos, llaveros, cu&ntilde;os en seco, matriceria</h3>
        <p>Bismarck 1261 - FonoFax 4572063</p>
        <p>Fonos 4572063 - 7739424</p>
        <p>Quinta Normal Santiago</p>
        </td>
        <td align="right" width="350"><h1>RUT: 4.754.432-7</h1>
        <h1>FACTURA</h1>
        <h1>N&deg;
          <label for="txtFactura" class="linea"></label>
  <input name="txtFactura" value="<?php echo $id_documento?>" readonly="readonly" type="text" dir="rtl" id="txtFactura" />
        </h1></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="675" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="4" align="right"><p>Santiago
          <label for="txtDia" class="linea"></label>
          <input size="2" type="text" name="txtDia" dir="rtl" id="txtDia" readonly="readonly" value="<?php print strftime("%d")?>" />
          de 
          <label for="txtMes" class="linea"></label>
          <input type="text" name="txtMes" id="txtMes" dir="rtl" readonly="readonly" value="<?php print ucwords(strftime("%B"))?>" />
        del 
        <label for="txtAno" class="linea"></label>
        <input size="4" type="text" name="txtAno" dir="rtl" id="txtAno" readonly="readonly" value="<?php print strftime("%Y")?>" />
        </p>
        </td>
        </tr>
      <tr>
        <td width="80"><p>Se&ntilde;or(es) 
          <label for="txtCliente"></label>
        </p></td>
        <td colspan="3" width="260"><input name="txtCliente" type="text" size="40" id="txtCliente" /></td>
        </tr>
      <tr>
        <td><p>Direcci&oacute;n 
          <label for="txtDireccion"></label>
        </p></td>
        <td><input name="txtDireccion" type="text" size="40" id="txtDireccion" readonly="readonly" /></td>
        <td width="100"><p style="margin-left:20px">Provincia
          <label for="txtProvincia"></label>
        </p></td>
        <td width="255"><input name="txtProvincia" size="30" type="text" id="txtProvincia" readonly="readonly"/></td>
      </tr>
      <tr>
        <td><p>RUT 
          <label for="txtRut"></label>
        </p></td>
        <td><input name="txtRut" size="12" type="text" id="txtRut" readonly="readonly" /></td>
        <td><p style="margin-left:20px">Comuna 
          <label for="txtComuna"></label>
        </p></td>
        <td><input name="txtComuna" size="30" type="text" id="txtComuna" readonly="readonly" /></td>
      </tr>
      <tr>
        <td><p>Giro 
          <label for="txtGiro"></label>
        </p></td>
        <td><input name="txtGiro" type="text" id="txtGiro" size="40" readonly="readonly" /></td>
        <td><p style="margin-left:20px">Fono 
          <label for="txtTelefono"></label>
        </p></td>
        <td><input name="txtTelefono" size="30" type="text" id="txtTelefono" readonly="readonly" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="675" style="margin-top:10px" border="0" cellspacing="0" cellpadding="0">
      <tr>        
        <td width="168" align="center">Orden de Compra N&deg;</td>
        <td width="168" align="center">Guia de Despacho N&deg;</td>
        <td width="168" align="center">Condiciones de Venta</td>
        <td width="171" align="center">Vencimiento</td>
      </tr>
      <tr>
        <td align="center"><label for="txtOrden"></label>
          <input size="5" type="text" onkeyUp="return ValNumero(this);" name="txtOrden" id="txtOrden" autocomplete="off" /></td>
        <td align="center"><label for="txtGuia"></label>
          <input size="5" type="text" onkeyUp="return ValNumero(this);" name="txtGuia" id="txtGuia" autocomplete="off" /></td>
        <td align="center"><label for="txtCondiciones"></label>
          <input type="text" name="txtCondiciones" id="txtCondiciones" autocomplete="off" /></td>
        <td align="center"><label for="txtVencimiento"></label>
          <input type="text" name="txtVencimiento" id="txtVencimiento" autocomplete="off" />
        </td>
        <tr align="center"><td colspan="3"></td>
        <td><span id="req-fecha" class="requisites error">[dd-mm-YYYY]</span></td></tr>
      </tr>
    </table></td>
  </tr>
  
  <tr>
    <td><table width="675" style="margin-top:10px" border="0" cellspacing="0" cellpadding="0">
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
          <input size="5" type="text" onkeyUp="return ValNumero(this);" name="txtCantidad[]" id="txtCantidad0" dir="rtl" value="1"
          onChange="calcular(0);" /></td>
        <td align="center" id="detalle"><label for="txtDetalle"></label>
          <input name="txtDetalle[]" type="text" id="txtDetalle0" size="35" /></td>
        <td align="center" id="unitario"><label for="txtUnitario"></label>
          <input name="txtUnitario[]" value="0" onkeyUp="return ValNumero(this);" type="text" id="txtUnitario0" 
          onChange="calcular(0);" dir="rtl" size="5" /></td>
        <td align="center" id="descuento"><label for="txtDescuento"></label>
          <input size="5" type="text"  name="txtDescuento[]" id="txtDescuento0" onChange="calcular(0);" dir="rtl" value="0" 
          onkeyUp="return ValNumero(this);" /></td>
        <td align="center" id="total"><label for="txtTotal"></label>
          <input name="txtTotal[]" type="text" id="txtTotal0" readonly="readonly" value="0" dir="rtl" size="15" /><a href=
          "javascript:agregar();"><img src="lib/img/agregar.png" width="16" height="16" /></a></td>
      </tr>
      </table></td>
  </tr>
  <tr>
    <td><table width="675" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="504" align="right">Neto $</td>
        <td width="171" align="center"><label for="txtNeto"></label>
          <input name="txtNeto" type="text" value="0" id="txtNeto" dir="rtl" size="15" readonly="readonly" /></td>
      </tr>
      <tr>
        <td align="right">IVA $</td>
        <td align="center"><label for="txtIva"></label>
          <input name="txtIva" type="text" value="0" id="txtIva" dir="rtl" size="15" readonly="readonly" /></td>
      </tr>
      <tr>
        <td align="right">Total $</td>
        <td align="center"><label for="txtTotal"></label>
          <input name="txtTotal2" type="text" value="0" id="txtTotal" dir="rtl" size="15" readonly="readonly" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center">
     <br />
     <input type="submit" class="button" name="btnEnviar" id="btnEnviar" value="Realizar Venta" />
     <input type="reset" class="button" />
    </td>
  </tr>
</table>
</form>
</div>
<div id="ajax_loader" align="center"><img id="loader_gif" src="lib/img/loader.gif" style=" display:none;"/></div>
</body>
</html>