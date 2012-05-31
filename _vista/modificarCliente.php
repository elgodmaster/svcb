<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Modificar Cliente</title>
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
	function get2(){
		$.post('indexx.php?controlador=cliente&accion=modificar', { 
		txtRUN: form1.txtRUN.value, txtNombreNuevo: form1.txtNombreNuevo.value, txtDireccionNueva: form1.txtDireccionNueva.value, 	
		cboComunaNueva: form1.cboComunaNueva.value, txtTelefonoNuevo: form1.txtTelefonoNuevo.value, cboEstado: form1.cboEstado.value,
		txtEmailNuevo: form1.txtEmailNuevo.value, txtGiroNuevo: form1.txtGiroNuevo.value },
		function(output){
			$('#datos2').html(output).show();
			});
		}
</script>
</head>

<body>

 <div id="formulario">
  <form id="form1" name="form1" method="post">
   <table>
 	<tr>
  	 <td>RUN:</td>
  	 <td><input type="text" name="txtRUN" value="<?php echo $cliente->getIdCliente() ?>" readonly="readonly" /></td>
 	</tr>
 	<tr>
  	 <td>Nombre:</td>
     <td><input type="text" name="txtNombreNuevo" size="50" value="<?php echo $cliente->getNombreCliente() ?>" /></td>
	 </tr>
    <tr>
     <td>Dirección:</td>
     <td><input type="text" name="txtDireccionNueva" size="50" value="<?php echo $cliente->getDireccionCliente() ?>" /></td>
    </tr>
    <tr>
     <td>Comuna:</td>
     <td>
     <select name="cboComunaNueva">
      <option value="0">Elegir Comuna</option>
      <option value="1001" selected="selected"><?php echo $comuna->getNombreComuna() ?></option>
     </select>
     </td>
    </tr>
    <tr>
     <td>Telefono:</td>
     <td><input type="text" name="txtTelefonoNuevo" size="50" value="<?php echo $cliente->getTelefonoCliente() ?>" /></td>
    </tr>
    <tr>
     <td>Email:</td>
     <td><input type="text" name="txtEmailNuevo" size="50" value="<?php echo $cliente->getEmailCliente() ?>" /></td>
    </tr>
    <tr>
     <td>Giro:</td>
     <td><input type="text" name="txtGiroNuevo" size="50" value="<?php echo $cliente->getGiroCliente() ?>" /></td>
    </tr>
 	<tr>
  	 <td>Estado:</td>
  	 <td>
     <select name="cboEstado">
  	 <?php
	    if($cliente->getEstadoCliente() == 'ACTIVO')
		{
			echo '<option value="INACTIVO">No Disponible</option>';
			echo '<option value="ACTIVO" selected="selected">Disponible</option>';
		}
		else
		{
			echo '<option value="INACTIVO" selected="selected">No Disponible</option>';
			echo '<option value="ACTIVO">Disponible</option>';
		}
  	 ?>
     </select>
  	 </td>
 	</tr>
 	<tr>
  	 <td></td>
  	 <td colspan="2"><input type="button" name="btnConsultar" value="Modificar" onClick="get2();" /></td>
 	</tr>
   </table>
  </form>
 </div>
 
 <hr />
 
 <div id="datos2">
 </div>

</body>
</html>