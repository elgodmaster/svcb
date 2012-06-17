<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Ingresar Cliente</title>
</head>
<script src="lib/js/jquery-1.7.2.min.js"></script>
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

<div id="busqueda">
 <h2>Ingresar Cliente:</h2>
 <form id="form" name="form" method="post">
  <table>
   <tr>
	<td>RUT Cliente:</td><td><input type="text" size="50" name="txtRUN"/></td>
   </tr>
   <tr>
	<td>Nombre Cliente:</td><td><input type="text" size="50" name="txtNombre" /></td>
   </tr>
   <tr>
	<td>Direccion Cliente:</td><td><input type="text" size="50" name="txtDireccion"/></td>
   </tr>
   <tr>
  	<td>Region:</td>
  	<td>
   	 <select name="cboRegion">
      <option value="0">Elegir Región</option>
   	 </select>
  	</td>
   </tr>
   <tr>
  	<td>Provincia:</td>
  	<td>
   	 <select name="cboProvincia">
      <option value="0">Elegir Ciudad</option>
     </select>
  	</td>
   </tr>
   </tr>
  	<td>Comuna:</td>
    <td>
     <select name="cboComuna">
      <option value="0">Elegir Comuna</option>
      <option value="1001">San Bernardo</option>
     </select>
  	</td>
   </tr>
   <tr>
  	<td>Telefono Cliente:</td><td><input type="text" size="50" name="txtTelefono"/></td>
   </tr>
   <tr>
  	<td>Email Cliente:</td><td><input type="text" size="50" name="txtEmail"/></td>
   </tr>
   <tr>
  	<td>Giro Cliente: </td><td><input type="text" size="50" name="txtGiro"/></td>
   </tr>
   <tr>
  	<td></td>
  	<td colspan="2"><input type="button" name="btnConsultar" value="Ingresar" onClick="get();" /><input type="reset" /></td>
   </tr>
  </table>
 </form>
</div>

<hr />

<div id="datos">
</div>

</body>
</html>