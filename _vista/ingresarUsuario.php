<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ingresar Usuario</title>
<link href="lib/css/formularios.css" rel="stylesheet" type="text/css" />
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="lib/js/validarut2.js"></script>
<script type="text/javascript" src="lib/js/formulario-usuario1.js"></script>
<script type="text/javascript">
	function get(){		
		$.post('indexx.php?controlador=usuario&accion=ingresar', {
			txtRUN: form.txtRUN.value, txtPassword: form.txtPassword.value, txtNombre: form.txtNombre.value, 
			txtApat: form.txtApat.value, txtAmat: form.txtAmat.value, cboUsuario: form.cboUsuario.value },
		function(output){
			$('#datos').html(output).show();
			});
		}
</script>
</head>

<body>

 <div id="formulario">
  <form id="form" name="form" method="post">
   <dl>
    <dt><h2>Ingresar Usuario</h2></dt>
    <dd><label for="runUsuario">RUN Usuario</label></dd>
    <dd>
     <input type="text" size="15" name="txtRUN" id="txtRUN" onblur="javascript:return Rut(document.form.txtRUN.value)" />
     <span id="req-run" class="requisites error">Un RUN válido por favor</span>
    </dd>
    <dd><label for="passwordUsuario">Password Usuario</label></dd>
    <dd>
     <input type="password" autocomplete="off" maxlength="30" size="40" name="txtPassword" id="txtPassword" />
     <span id="req-pass1" class="requisites error">Mínimo 5 caracteres</span>
    </dd>
    <dd><label for="passwordUsuario">Repetir Contraseña</label></dd>
    <dd>
     <input type="password" autocomplete="off" maxlength="30" size="40" name="txtPassword2" id="txtPassword2" />
     <span id="req-pass2" class="requisites error">Debe ser igual a la anterior</span>
    </dd>
    <dd><label for="nombreUsuario">Nombre Usuario</label></dd>
    <dd>
     <input type="text" autocomplete="off" maxlength="100" name="txtNombre" size="40" id="txtNombre" />
     <span id="req-nombre" class="requisites error">A-z, mínimo 4 caracteres</span>
    </dd>
    <dd><label for="apatUsuario">Apellido Paterno</label></dd>
    <dd>
     <input type="text" autocomplete="off" maxlength="50" name="txtApat" size="40" id="txtApat" />
     <span id="req-apat" class="requisites error">A-z, mínimo 4 caracteres</span>
    </dd>
    <dd><label for="amatUsuario">Apellido Materno</label></dd>
    <dd>
     <input type="text" autocomplete="off" maxlength="50" name="txtAmat" size="40" id="txtAmat" />
     <span id="req-amat" class="requisites error">A-z, mínimo 4 caracteres</span>
    </dd>
    <dd><label for="tipoUsuario">Tipo Usuario</label></dd>
    <dd>
     <select name="cboUsuario" id="cboUsuario">
      <option value="0">Elegir Tipo Usuario</option>
      <option value="1001">Administrador</option>
      <option value="1002">Vendedor</option>
      <option value="1003">Bodeguero</option>
     </select>
     <span id="req-tipo" class="requisites error">Seleccione un tipo usuario</span>
    </dd>
    <dd><input type="button" class="button" id="btnConsultar" value="Ingresar" /><input class="button" type="reset" /></dd>
   </dl>
  </form>
 </div>
 
 <hr />
 
 <div id="datos">
 </div>
 
</body>
</html>