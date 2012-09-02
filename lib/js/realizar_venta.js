jQuery(document).ready(function(){
	var formBoxes= jQuery(".text");
	var txtVencimiento = jQuery("#txtVencimiento");
	var reqFecha = jQuery("#req-fecha"); 
	
	//Validar Fecha Vencimiento
  function validarFecha(){
    if(txtVencimiento.val().length < 10){
	  reqFecha.fadeIn('fast');
      reqFecha.removeClass("requisites");
      return false;
    }
    else if(!txtVencimiento.val().match(/^\d{1,2}\-\d{1,2}\-\d{2,4}$/)){
	  reqFecha.fadeIn('fast');
      reqFecha.removeClass("requisites");
      return false;
    }
    else{
		reqFecha.fadeOut('fast');
        reqFecha.addClass("requisites");
		return true;
    }
  }
  
  //controlamos la validacion en los distintos eventos
  // Perdida de foco
  txtVencimiento.blur(validarFecha);
  // En cuanto el usuario esta pulsando teclas (escribiendo)
  txtVencimiento.keyup(validarFecha);
  
  // Envio de formulario
  jQuery("#btnEnviar").submit(function(){
	  /*if(validarFecha() == true)
	  {
		  alert('siiiiiiiiiiiiiiiiiiiiii');
	  }*/
  });
  
});

var id=0;
var del=0;

function agregar(){
	
	if (parseInt($("#txtCantidad"+id).val()) > 0 && $("#txtDetalle"+id).val().length > 0 && parseInt($("#txtUnitario"+id).val()) > 0 
		&& parseInt($("#txtDescuento"+id).val()) >= 0 && id<11)
	{
		id=id+1;
		$("#codigo").append('<div id="area'+id+'"><input type="hidden" name="txtCodigo[]" id="txtCodigo'+id+'" size="3" /></div>');
		$("#stock").append('<div id="area'+id+'"><input type="hidden" name="txtStock[]" id="txtStock'+id+'" size="3" /></div>');
		$("#cantidad").append('<div id="area'+id+'"><input type="text" name="txtCantidad[]" id="txtCantidad'+id+'" onChange="calcular('+id+');" dir="rtl" size="5" value="1" /></div>');
		$("#detalle").append('<div id="area'+id+'"><input type="text" name="txtDetalle[]" id="txtDetalle'+id+'" size="35" /></div>');
		$("#unitario").append('<div id="area'+id+'"><input type="text" value="0" name="txtUnitario[]" id="txtUnitario'+id+'" dir="rtl" size="5" onChange="calcular('+id+');" /></div>');
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
					$("#txtCodigo"+id).val(data.id_producto);
					$("#txtUnitario"+id).val(data.precio_producto);
					$("#txtStock"+id).val(data.stock_real_producto);
					calcular(id);
				}
			});
		
		});
	}
	else if (parseInt($("#txtCantidad"+id).val()) <= 0)
		alert("Debe ingresar una cantidad de producto válida.");
	else if ($("#txtDetalle"+id).val().length <= 0)
		alert("Debe ingresar un detalle de producto válido.");	
	else if (parseInt($("#txtUnitario"+id).val()) <= 0 )
		alert("Debe ingresar un precio unitario válido.");
	
	
}
		
function borrar(cual) {
	$("#area"+cual).remove();
	$("#area"+cual).remove();
	$("#area"+cual).remove();
	$("#area"+cual).remove();
	$("#area"+cual).remove();
	id=id-1;
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
					$("#txtCodigo"+id).val(data.id_producto);
					$("#txtUnitario"+id).val(data.precio_producto);
					$("#txtStock"+id).val(data.stock_real_producto);
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
	
	//** INICIO OPERACIONES DE CALCULO DEL DOCUMENTO DE PAGO
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
	//** FIN OPERACIONES DE CALCULO DEL DOCUMENTO DE PAGO
	
	// Redondea el número 'num' a 'ndec' decimales. 
	function redond(num, ndec) {
		var fact = Math.pow(10, ndec); // 10 elevado a ndec
		//Se desplaza el punto decimal ndec posiciones, se redondea el número y se vuelve a colocar el punto decimal en su sitio.
		return Math.round(num * fact) / fact; 
	}	

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
	
	
  $().ready(function() {
	$("#txtCliente").autocomplete("lib/ajax/cliente_venta.php", {
      width: 273,
      matchContains: true,
      selectFirst: false
    });
  });


  $().ready(function() {
	$("#txtDetalle"+id).autocomplete("lib/ajax/producto.php", {
      width: 243,
      matchContains: true,
      selectFirst: false
    });
  });