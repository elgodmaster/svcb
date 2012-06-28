<?php
 date_default_timezone_set("Chile/Continental");
 setlocale(LC_TIME, 'spanish');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Realizar Venta</title>
<script src="lib/js/jquery-1.7.2.min.js"></script><!-- -->
<script type="text/javascript" src='lib/js/jquery.autocomplete.js'></script><!-- -->
<link href="lib/css/jquery.autocomplete.css" rel="stylesheet" type="text/css" /><!-- -->
<script type="text/javascript">
id=0;
function agregar() {
	id=id+1;
	$("#cantidad").append('<div id="area'+id+'"><input type="text" name="txtCantidad[]" id="txtCantidad'+id+'" onChange="calcular('+id+');" dir="rtl" size="5" value="1" /></div>');
	$("#detalle").append('<div id="area'+id+'"><input type="text" name="txtDetalle[]" id="txtDetalle'+id+'" size="35" /></div>');
	$("#unitario").append('<div id="area'+id+'"><input type="text" name="txtUnitario[]" id="txtUnitario'+id+'" dir="rtl" size="5" onChange="calcular('+id+');" /></div>');
	$("#descuento").append('<div id="area'+id+'"><input type="text" name="txtDescuento[]" id="txtDescuento'+id+'" onChange="calcular('+id+');" dir="rtl" size="5" value="0" /></div>');
	$("#total").append('<div id="area'+id+'"><input type="text" name="txtTotal[]" value="0" id="txtTotal'+id+'" dir="rtl" size="15" readonly="readonly" /><a style="cursor:pointer" onclick="javascript:borrar('+id+'); javascript:sumar();"><img src="lib/img/quitar.png" width="16" height="16" /></a></div>');
	
	$('input[name^="txtDetalle"]').autocomplete("lib/ajax/producto.php", {
                 width: 243,
                 matchContains: true,
                 selectFirst: false
         });
	
		$('input[name^="txtDetalle"]').blur(function(){
			var search_term = $("#txtDetalle"+id).val();
			$.ajax({
				data: "id="+search_term,
				type: "POST",
				dataType: "json",
				url: "lib/ajax/producto_factura.php",
				success: function(data){
					$("#txtUnitario"+id).val(data.precio_producto);
					calcular(id);
				}
		});
		
	});
	}
		
function borrar(cual) {
	$("#area"+cual).remove();
	$("#area"+cual).remove();
	$("#area"+cual).remove();
	$("#area"+cual).remove();
	$("#area"+cual).remove();
	return false;
}

function restults(data) {
	$("#txtDireccion").val(data.direccion_cliente);
	$("#txtRut").val(data.id_cliente);
	$("#txtProvincia").val(data.nombre_provincia);
	$("#txtComuna").val(data.nombre_comuna);
	$("#txtGiro").val(data.giro_cliente);
	$("#txtTelefono").val(data.telefono_cliente);
	}
	
	$(document).ready(function(){
		$("#txtDetalle"+id).blur(function(){
			var search_term = $("#txtDetalle"+id).val();
			$.ajax({
				data: "id="+search_term,
				type: "POST",
				dataType: "json",
				url: "lib/ajax/producto_factura.php",
				success: function(data){
					$("#txtUnitario"+id).val(data.precio_producto);
					calcular(id);
				}
			});
		});
	});
	
	$(document).ready(function(){
		$("#txtCliente").blur(function(){
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

<script language="javascript">	
	function totalFactura(){
		var neto, iva, total = 0;
		neto = parseInt(document.getElementById("txtNeto").value);
		iva = parseInt(document.getElementById("txtIva").value);
		total = neto + iva;
		document.getElementById("txtTotal").value = total;
	}

	function sumar(){
		var suma = 0;
		var elem = document.getElementsByName('txtTotal[]');
		for (i=0;i<elem.length;i++){
		  suma += parseInt(elem[i].value);
		}
		document.getElementById("txtNeto").value = suma;
		iva(suma);
	}
	
	function iva(neto){
		var iva,iva2 = 0;
		var netox = neto;
		iva = netox*0.19;
		iva2 = redond(iva,0);
		document.getElementById("txtIva").value = iva2;
		totalFactura();
	}
	
	//multiplicar
	function calcular(id){ 
		cantidad = document.getElementById("txtCantidad"+id).value;
		precio = document.getElementById("txtUnitario"+id).value;
		multiplicacion = cantidad*precio;	
		document.getElementById("txtTotal"+id).value = multiplicacion;	
		descuento(id);
	}
	
	function descuento(id){	
		total = document.getElementById("txtTotal"+id).value;
		desc = document.getElementById("txtDescuento"+id).value;
		descuentox = total-desc;
		document.getElementById("txtTotal"+id).value = descuentox;
		sumar();
	}
	
	// Redondea el número 'num' a 'ndec' decimales. 
	function redond(num, ndec) {
		var fact = Math.pow(10, ndec); // 10 elevado a ndec
		//Se desplaza el punto decimal ndec posiciones, se redondea el número y se vuelve a colocar el punto decimal en su sitio.
		return Math.round(num * fact) / fact; 
	}
</script>

<script language="javascript" type="text/javascript">
    //*** Este Codigo permite Validar que sea un campo Numerico
    function Solo_Numerico(variable){
        Numer=parseInt(variable);
        if (isNaN(Numer)){
            return "";
        }
        return Numer;
    }
    function ValNumero(Control){
        Control.value=Solo_Numerico(Control.value);
    }
    //*** Fin del Codigo para Validar que sea un campo Numerico
</script>


<script type="text/javascript">
  $().ready(function() {
	$("#txtCliente").autocomplete("lib/ajax/cliente_venta.php", {
      width: 273,
      matchContains: true,
      selectFirst: false
    });
  });
</script>

<script type="text/javascript">
  $().ready(function() {
	$("#txtDetalle"+id).autocomplete("lib/ajax/producto.php", {
      width: 243,
      matchContains: true,
      selectFirst: false
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
  <input name="txtFactura" value="<?php echo $id_documento?>" readonly="readonly" type="text" dir="rtl" id="txtFactura" />
        </h1></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="675" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="4" align="right"><p>Santiago
          <label for="txtDia"></label>
          <input size="2" type="text" name="txtDia" dir="rtl" id="txtDia" readonly="readonly" value="<?php print strftime("%d")?>" />
          de 
          <label for="txtMes"></label>
          <input type="text" name="txtMes" id="txtMes" dir="rtl" readonly="readonly" value="<?php print ucwords(strftime("%B"))?>" />
        del 
        <label for="txtAno"></label>
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
     <input type="submit" name="btnEnviar" o id="btnEnviar" value="Realizar Venta" />
     <input type="reset" />
    </td>
  </tr>
</table>
</form>
</body>
</html>