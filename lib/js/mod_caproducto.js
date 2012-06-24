function get2(){
	$.post('indexx.php?controlador=categoriaproducto&accion=modificar', { 
	txtNombreNuevo: form1.txtNombreNuevo.value, txtCodigo: form1.txtCodigo.value , cboEstado: form1.cboEstado.value },
	function(output){
			$('#datos2').html(output).show();
		});
}