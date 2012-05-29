<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Modificar Categoria Producto</title>
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
	function get(){
		$.post('indexx.php?controlador=usuario&accion=modificar', { 
		txtRunNuevo: form1.txtRunNuevo.value, txtPassNuevo: form1.txtPassNuevo.value, rdoPassword: form1.rdoPassword.value,
		txtNombreNuevo: form1.txtNombreNuevo.value, txtApatNuevo: form1.txtApatNuevo.value , txtAmatNuevo: form1.txtAmatNuevo.value,
		cboUsuarioNuevo: form1.cboUsuarioNuevo.value, chkEstadox: form1.chkEstadox.value },
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
  	 <td><input type="text" name="txtRunNuevo" value="<?php echo  $usuario->getIdUsuario() ?>" readonly="readonly" /></td>
 	</tr>
    <tr>
     <td>Password:</td>
     <td><input type="password" name="txtPassNuevo" /></td>
     <td><input type="radio" name="rdoPassword" checked="checked" />No Modificar</td>
     <td><input type="radio" name="rdoPassword"/>Modificar</td>
    </tr>
 	<tr>
  	 <td>Nombre:</td>
     <td><input type="text" name="txtNombreNuevo" value="<?php echo $usuario->getNombreUsuario() ?>" /></td>
	</tr>
    <tr>
     <td>Apellido Paterno</td>
     <td><input type="text" name="txtApatNuevo" value="<?php echo $usuario->getApatUsuario() ?>" /></td>
    </tr>
    <tr>
     <td>Apellido Materno</td>
     <td><input type="text" name="txtAmatNuevo" value="<?php echo $usuario->getAmatUsuario() ?>" /></td>
    </tr>
    <tr>
     <td>Tipo Usuario:</td>
     <td>
      <select name="cboUsuarioNuevo" id="cboUsuarioNuevo">
       <option>Elegir Tipo Usuario</option>
       <option value="1001">Administrador</option>
       <option value="1002">Vendedor</option>
       <option value="1003">Bodeguero</option>
      </select>
     </td>
    </tr>
 	<tr>
  	 <td>Estado</td>
  	 <td>
  	 <?php
   	 	if($usuario->getEstadoUsuario() == 'ACTIVO')
   			echo '<input type="checkbox" name="chkEstadox" checked="checked" />';
   		else
   			echo '<input type="checkbox" name="chkEstadox" />';
  	 ?>
  	 Disponible
  	 </td>
 	</tr>
 	<tr>
  	 <td></td>
  	 <td colspan="2"><input type="button" name="btnConsultar" id="btnConsultar" value="Modificar" onClick="get();" /></td>
 	</tr>
   </table>
  </form>
 </div>
 
 <hr />
 
 <div id="datos2">
 </div>

</body>
</html>