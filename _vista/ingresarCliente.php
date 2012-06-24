<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ingresar Cliente</title>
</head>
<link href="lib/css/formularios.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="lib/js/dependencias.js"></script>
<script type="text/javascript" src="lib/js/validarut2.js"></script>
<script type="text/javascript">
	function get(){
		$.post('indexx.php?controlador=cliente&accion=ingresar', {
			txtRUN: form.txtRUN.value, txtNombre: form.txtNombre.value, txtDireccion: form.txtDireccion.value, 
			cboComuna: form.cboComuna.value, txtTelefono: form.txtTelefono.value, txtEmail: form.txtEmail.value, 
			txtGiro: form.txtGiro.value },
		function(output){
			$('#datos').html(output).show();
			});
		}
</script>
<body>

<div id="formulario">
 <form id="form" name="form" method="post">
  <dl>
   <dt><h2>Ingresar Cliente:</h2></dt>
   <dd><label for="runCliente">RUN Cliente:</label></dd>
   <dd>
    <input type="text" size="15" name="txtRUN" onblur="javascript:return Rut(document.form.txtRUN.value)"/>
    
   </dd>
   <dd><label for="nombreCliente">Nombre Cliente:</label></dd>
   <dd>
    <input class="inputNormal text" type="text" size="40" name="txtNombre" />
    <span id="req-username" class="requisites error">A-z, mínimo 4 caracteres</span>
   </dd>
   <dd><label for="direccionCliente">Dirección Cliente:</label></dd>
   <dd>
    <input type="text" size="40" name="txtDireccion"/>
    <span id="req-direccion" class="requisites error">A-z, mínimo 4 caracteres</span>
   </dd>
   <dd><label for="regionCliente">Región:</label></dd>
   <dd>
    <select name="cboRegion" id="cboRegion">
     <option value="0">Selecciona Uno...</option>
    </select>
   </dd>
   <dd><label for="provinciaCliente">Provincia:</label></dd>
   <dd>
    <select name="cboProvincia" id="cboProvincia">
     <option value="0">Selecciona Uno...</option>
    </select>
   </dd>
   <dd><label for="comunaCliente">Comuna:</label></dd>
   <dd>
    <select name="cboComuna" id="cboComuna">
     <option value="0">Selecciona Uno...</option>
    </select>
   </dd>
   <dd><label for="telefonoCliente">Teléfono Cliente:</label></dd>
   <dd>
    <input type="text" size="40" name="txtTelefono"/>
    <span id="req-telefono" class="requisites error">A-z, mínimo 4 caracteres</span>
   </dd>
   <dd><label for="emailCliente">Email Cliente:</label></dd>
   <dd>
    <input type="text" size="40" name="txtEmail"/>
    <span id="req-email" class="requisites error">Un e-mail válido por favor</span>
   </dd>
   <dd><label for="giroCliente">Giro Cliente:</label></dd>
   <dd>
    <input type="text" size="40" name="txtGiro"/>
    <span id="req-giro" class="requisites error">A-z, mínimo 4 caracteres</span>
   </dd>
   <dd>
    <input type="button" class="button fit" id="botonEnviar" value="Ingresar" onClick="get();" />
    <input type="reset" class="button fit" />
   </dd>
  </dl>
 </form>
</div>

<hr />

<div id="datos">
</div>

</body>
</html>