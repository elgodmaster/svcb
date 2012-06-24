function get2(){
	$.post('indexx.php?controlador=producto&accion=modificar', {
		txtCodigo: form1.txtCodigo.value, txtNombreNuevo: form1.txtNombreNuevo.value, txtPrecioNuevo: form1.txtPrecioNuevo.value,
		cboCategoriaNuevo: form1.cboCategoriaNuevo.value, txtaDescripcionNuevo: form1.txtaDescripcionNuevo.value, 
		txtStockRNuevo: form1.txtStockRNuevo.value, txtStockMNuevo: form1.txtStockMNuevo.value, cboEstado: form1.cboEstado.value },
	function(output){
			$('#datos2').html(output).show();
	});
}