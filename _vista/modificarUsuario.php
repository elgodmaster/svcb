<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Modificar Categoria Producto</title>
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
	function get2(){
		$.post('indexx.php?controlador=usuario&accion=modificar', { 
		txtRunNuevo: form1.txtRunNuevo.value, txtPassNuevo: form1.txtPassNuevo.value, rdoPassword: form1.rdoPassword.value,
		txtNombreNuevo: form1.txtNombreNuevo.value, txtApatNuevo: form1.txtApatNuevo.value , txtAmatNuevo: form1.txtAmatNuevo.value,
		cboUsuarioNuevo: form1.cboUsuarioNuevo.value, cboEstado: form1.cboEstado.value },
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
  	 <td><input type="text" size="25" name="txtRunNuevo" value="<?php echo  $usuario->getIdUsuario() ?>" readonly="readonly" /></td>
 	</tr>
    <tr>
     <td>Password:</td>
     <td><input type="password" size="25" name="txtPassNuevo" /></td>
    </tr>
    <tr>
     <td></td>
     <td colspan="2">
      <input type="radio" name="rdoPassword" checked="checked" />No Modificar
      <input type="radio" name="rdoPassword"/>Modificar
     </td>
    </tr>
 	<tr>
  	 <td>Nombre:</td>
     <td><input type="text" size="25" name="txtNombreNuevo" value="<?php echo $usuario->getNombreUsuario() ?>" /></td>
	</tr>
    <tr>
     <td>Apellido Paterno</td>
     <td><input type="text" size="25" name="txtApatNuevo" value="<?php echo $usuario->getApatUsuario() ?>" /></td>
    </tr>
    <tr>
     <td>Apellido Materno</td>
     <td><input type="text" size="25" name="txtAmatNuevo" value="<?php echo $usuario->getAmatUsuario() ?>" /></td>
    </tr>
    <tr>
     <td>Tipo Usuario:</td>
     <td>
      <select name="cboUsuarioNuevo">
       <option>Elegir Tipo Usuario</option>
       <?php
	      if($usuario->getTipoUsuario()==1001)
		  {
			  echo '<option value="1001" selected="selected">Administrador</option>';
			  echo '<option value="1002">Vendedor</option>';
			  echo '<option value="1003">Bodeguero</option>';			  
		  }
		  elseif($usuario->getTipoUsuario()==1002)
		  {
			  echo '<option value="1001">Administrador</option>';
			  echo '<option value="1002" selected="selected">Vendedor</option>';
			  echo '<option value="1003">Bodeguero</option>';			  
		  }
		  elseif($usuario->getTipoUsuario()==1003)
		  {
			  echo '<option value="1001">Administrador</option>';
			  echo '<option value="1002">Vendedor</option>';
			  echo '<option value="1003" selected="selected">Bodeguero</option>';			  
		  }
	   ?>
      </select>
     </td>
    </tr>
 	<tr>
  	 <td>Estado:</td>
  	 <td>
     <select name="cboEstado">
  	 <?php
	    if($usuario->getEstadoUsuario() == 'ACTIVO')
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