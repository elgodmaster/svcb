<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modificar Cliente</title>
<link href="lib/css/formularios.css" rel="stylesheet" type="text/css" />
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="lib/js/dependencias2.js"></script>
<?php
 if($cliente->getEstadoCliente() == 'INACTIVO')
 	echo '<script type="text/javascript" src="lib/js/mod_cliente.js"></script>';
 else
 {
?>
<script type="text/javascript">
	function get2(){
		$.post('indexx.php?controlador=cliente&accion=modificar', { 
		txtRUN: form1.txtRUN.value, txtNombreNuevo: form1.txtNombreNuevo.value, txtDireccionNueva: form1.txtDireccionNueva.value, 	
		cboComuna: form1.cboComuna.value, txtTelefonoNuevo: form1.txtTelefonoNuevo.value, txtEmailNuevo: form1.txtEmailNuevo.value, 
		txtGiroNuevo: form1.txtGiroNuevo.value },
		function(output){
			$('#datos2').html(output).show();
			});
		}
</script>
<?php
 }
?>
</head>

<body>

 <div id="formulario">
  <form id="form1" name="form1" method="post">
   <dl>
    <dd><label for="runCliente">RUN Cliente</label></dd>
    <dd><input type="text" name="txtRUN" size="15" value="<?php echo $cliente->getIdCliente() ?>" readonly="readonly" /></dd>
    <dd><label for="nombreCliente">Nombre Cliente</label></dd>
    <dd><input type="text" name="txtNombreNuevo" size="50" value="<?php echo $cliente->getNombreCliente() ?>" /></dd>
    <dd><label for="direccionCliente">Dirección Cliente</label></dd>
    <dd><input type="text" name="txtDireccionNueva" size="50" value="<?php echo $cliente->getDireccionCliente() ?>" /></dd>
    <dd><label for="regionCliente">Región</label></dd>
    <dd>
     <select name="cboRegion" id="cboRegion">
      <option value="0">Selecciona Uno...</option>
     </select>
    </dd>
    <dd><label for="provinciaCliente">Provincia</label></dd>
    <dd>
     <select name="cboProvincia" id="cboProvincia">
      <option value="0">Selecciona Uno...</option>
     </select>
    </dd>
    <dd><label for="comunaCliente">Comuna</label></dd>
    <dd>
     <select name="cboComuna" id="cboComuna">
      <option value="0">Elegir Comuna</option>
     </select>
    </dd>
    <dd><label for="telefonoCliente">Teléfono Cliente</label></dd>
    <dd><input type="text" name="txtTelefonoNuevo" size="50" value="<?php echo $cliente->getTelefonoCliente() ?>" /></dd>
    <dd><label for="emailCliente">Email Cliente</label></dd>
    <dd><input type="text" name="txtEmailNuevo" size="50" value="<?php echo $cliente->getEmailCliente() ?>" /></dd>
    <dd><label for="giroCliente">Giro Cliente</label></dd>
    <dd><input type="text" name="txtGiroNuevo" size="50" value="<?php echo $cliente->getGiroCliente() ?>" /></dd>
  	 <?php	   
	   if($cliente->getEstadoCliente() == 'INACTIVO')
	   {
		   echo '<dd><label for="estadoCliente">Estado Cliente</label></dd>';
		   echo '<dd>';
		   echo '<select name="cboEstado">';
		   echo '<option value="INACTIVO" selected="selected">No Disponible</option>';
		   echo '<option value="ACTIVO">Disponible</option>';
		   echo '</select>';
		   echo '</dd>';
	   }
  	 ?>
    <dd>
     <input type="button" class="button" name="btnConsultar" value="Modificar" onClick="get2();" />
     <input type="button" class="button" value="Restablecer" onClick="get();" />
    </dd>
   </dl>
  </form>
 </div>
 
 <hr />
 
 <div id="datos2">
 </div>

</body>
</html>