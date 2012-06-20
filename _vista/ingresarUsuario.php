<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ingresar Usuario</title>
<link href="lib/css/formularios.css" rel="stylesheet" type="text/css" />
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="lib/js/validarut2.js"></script>
<script type="text/javascript">
	function get(){
		$.post('indexx.php?controlador=usuario&accion=ingresar', {
			txtRUN: form.txtRun.value, txtPassword: form.txtPassword.value, txtNombre: form.txtNombre.value, 
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
    <dd><input type="text" size="15" name="txtRUN" id="txtRUN" onblur="javascript:return Rut(document.form.txtRUN.value)" /></dd>
    <dd><label for="passwordUsuario">Password Usuario</label></dd>
    <dd><input type="password" size="40" name="txtPassword" id="txtPassword" /></dd>
    <dd><label for="nombreUsuario">Nombre Usuario</label></dd>
    <dd><input type="text" name="txtNombre" size="40" id="txtNombre" /></dd>
    <dd><label for="apatUsuario">Apellido Paterno</label></dd>
    <dd><input type="text" name="txtApat" size="40" id="txtApat" /></dd>
    <dd><label for="amatUsuario">Apellido Materno</label></dd>
    <dd><input type="text" name="txtAmat" size="40" id="txtAmat" /></dd>
    <dd><label for="tipoUsuario">Tipo Usuario</label></dd>
    <dd>
     <select name="cboUsuario" id="cboUsuario">
      <option>Elegir Tipo Usuario</option>
      <option value="1001">Administrador</option>
      <option value="1002">Vendedor</option>
      <option value="1003">Bodeguero</option>
     </select>
    </dd>
    <dd><input type="button" class="button" value="Ingresar" onClick="get();" /><input class="button" type="reset" /></dd>
   </dl>
  </form>
 </div>
 
 <hr />
 
 <div id="datos">
 </div>
 
</body>
</html>