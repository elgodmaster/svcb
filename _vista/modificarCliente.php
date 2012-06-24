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
<script type="text/javascript" src="lib/js/formulario-cliente2.js"></script>
</head>

<body>

 <div id="formulario">
  <form id="form1" name="form1" method="post">
   <dl>
    <dd><label for="runCliente">RUN Cliente</label></dd>
    <dd><input type="text" name="txtRUN" size="15" value="<?php echo $cliente->getIdCliente()?>" readonly="readonly" /></dd>
    <dd><label for="nombreCliente">Nombre Cliente</label></dd>
    <dd>
     <input type="text" autocomplete="off" maxlength="250" name="txtNombreNuevo" id="txtNombreNuevo" size="50" value="<?php echo 
	 $cliente->getNombreCliente()?>" />
     <span id="req-nombre" class="requisites error">A-z, mínimo 4 caracteres</span>
    </dd>
    <dd><label for="direccionCliente">Dirección Cliente</label></dd>
    <dd>
     <input type="text" autocomplete="off" maxlength="250" name="txtDireccionNueva" id="txtDireccionNueva" size="50" value="<?php echo 
	 $cliente->getDireccionCliente() ?>" />
     <span id="req-direccion" class="requisites error">[A-z][0-9][,#°.], mínimo 4 caracteres</span>
    </dd>
    <dd><label for="regionCliente">Regi&oacute;n</label></dd>
    <dd>
     <select name="cboRegion" id="cboRegion">
      <option value="0">Selecciona Uno...</option>
     </select>
     <span id="req-region" class="requisites error">Seleccione una región</span>
    </dd>
    <dd><label for="provinciaCliente">Provincia</label></dd>
    <dd>
     <select name="cboProvincia" id="cboProvincia">
      <option value="0">Selecciona Uno...</option>
     </select>
     <span id="req-provincia" class="requisites error">Seleccione una provincia</span>
    </dd>
    <dd><label for="comunaCliente">Comuna</label></dd>
    <dd>
     <select name="cboComuna" id="cboComuna">
      <option value="0">Elegir Comuna</option>
     </select>
     <span id="req-comuna" class="requisites error">Seleccione una comuna</span>
    </dd>
    <dd><label for="telefonoCliente">Tel&eacute;fono Cliente</label></dd>
    <dd>
     <input type="text" maxlength="45" autocomplete="off" name="txtTelefonoNuevo" id="txtTelefonoNuevo" size="50" value="<?php echo 
	 $cliente->getTelefonoCliente()?>" />
     <span id="req-telefono" class="requisites error">[0-9][()-], mínimo 7 caracteres</span>
    </dd>
    <dd><label for="emailCliente">Email Cliente</label></dd>
    <dd>
     <input type="text" maxlength="250" autocomplete="off" name="txtEmailNuevo" id="txtEmailNuevo" size="50" value="<?php echo 
	 $cliente->getEmailCliente()?>" />
     <span id="req-email" class="requisites error">Un e-mail válido por favor</span>
    </dd>
    <dd><label for="giroCliente">Giro Cliente</label></dd>
    <dd>
     <input type="text" maxlength="100" autocomplete="off" name="txtGiroNuevo" id="txtGiroNuevo" size="50" value="<?php echo 
	 $cliente->getGiroCliente()?>" />
     <span id="req-giro" class="requisites error">[A-z][.], mínimo 4 caracteres</span>
    </dd>
  	 <?php	   
	   if($cliente->getEstadoCliente() == 'INACTIVO')
	   {
		   echo '<dd><label for="estadoCliente">Estado Cliente</label></dd>';
		   echo '<dd>';
		   echo '<select name="cboEstado" id="cboEstado">';
		   echo '<option value="INACTIVO" selected="selected">No Disponible</option>';
		   echo '<option value="ACTIVO">Disponible</option>';
		   echo '</select>';
		   echo '</dd>';
	   }
  	 ?>
    <dd>
     <input type="button" class="button" name="btnConsultar" id="btnConsultar" value="Modificar" />
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