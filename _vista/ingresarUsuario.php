<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Ingresar Usuario</title>
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
	function get(){
		$.post('indexx.php?controlador=usuario&accion=ingresar', { 
		txtRun: form.txtRun.value, txtPassword: form.txtPassword.value, txtNombre: form.txtNombre.value, 
		txtApat: form.txtApat.value, txtAmat: form.txtAmat.value, cboUsuario: form.cboUsuario.value },
		function(output){
			$('#datos').html(output).show();
			});
		}
</script>
</head>

<body>

 <div id="formulario">
  <h2>Ingresar Usuario</h2>
  <form id="form" name="form" method="post">
   <table>
    <tr>
     <td>RUN:</td>
     <td><input type="text" name="txtRun" id="txtRun" /></td>
    </tr>
     <td>Password:</td>
     <td><input type="password" name="txtPassword" id="txtPassword" /></td>
    </tr>
     <td>Nombre:</td>
     <td><input type="text" name="txtNombre" id="txtNombre" /></td>
    </tr>
    <tr>
     <td>Apellido Paterno:</td>
     <td><input type="text" name="txtApat" id="txtApat" /></td>
    </tr>
     <td>Apellido Materno:</td>
     <td><input type="text" name="txtAmat" id="txtAmat" /></td>
    </tr>
     <td>Tipo Usuario:</td>
     <td>
      <select name="cboUsuario" id="cboUsuario">
       <option>Elegir Tipo Usuario</option>
       <option value="1001">Administrador</option>
       <option value="1002">Vendedor</option>
       <option value="1003">Bodeguero</option>
      </select>
     </td>
    </tr>
    <tr>
     <td></td>
     <td colspan="2"><input type="button" name="btnConsultar" id="btnConsultar" value="Ingresar" onClick="get();" /></td>
    </tr>
   </table>
  </form>
 </div>
 
 <hr />
 
 <div id="datos">
 </div>
 
</body>
</html>