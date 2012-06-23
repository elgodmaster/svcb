function get2(){
	$.post('indexx.php?controlador=cliente&accion=modificar', { 
	txtRUN: form1.txtRUN.value, txtNombreNuevo: form1.txtNombreNuevo.value, txtDireccionNueva: form1.txtDireccionNueva.value, 	
	cboComuna: form1.cboComuna.value, txtTelefonoNuevo: form1.txtTelefonoNuevo.value, cboEstado: form1.cboEstado.value,
	txtEmailNuevo: form1.txtEmailNuevo.value, txtGiroNuevo: form1.txtGiroNuevo.value },
	function(output){
		$('#datos2').html(output).show();
	});
}