function get2(){
	$.post('indexx.php?controlador=usuario&accion=modificar', { 
	txtRunNuevo: form1.txtRunNuevo.value, txtNombreNuevo: form1.txtNombreNuevo.value, txtApatNuevo: form1.txtApatNuevo.value , 
	txtAmatNuevo: form1.txtAmatNuevo.value, cboUsuarioNuevo: form1.cboUsuarioNuevo.value, cboEstado: form1.cboEstado.value },
	function(output){
			$('#datos2').html(output).show();
	});
}