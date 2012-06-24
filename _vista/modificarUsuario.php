<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Modificar Categoria Producto</title>
<script src="lib/js/jquery-1.7.2.min.js"></script>
<?php
 if($usuario->getEstadoUsuario() == 'INACTIVO')
 	echo '<script type="text/javascript" src="lib/js/mod_usuario.js"></script>';
 else
 {
?>
<script type="text/javascript">
	function get2(){
		$.post('indexx.php?controlador=usuario&accion=modificar', { 
		txtRunNuevo: form1.txtRunNuevo.value, txtNombreNuevo: form1.txtNombreNuevo.value, txtApatNuevo: form1.txtApatNuevo.value , 
		txtAmatNuevo: form1.txtAmatNuevo.value, cboUsuarioNuevo: form1.cboUsuarioNuevo.value },
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
    <dd><label for="runUsuario">RUN Usuario</label></dd>
    <dd><input type="text" size="15" name="txtRunNuevo" value="<?php echo  $usuario->getIdUsuario() ?>" readonly="readonly" /></dd>
    <dd><label for="nombreUsuario">Nombre Usuario</label></dd>
    <dd><input type="text" size="40" name="txtNombreNuevo" value="<?php echo $usuario->getNombreUsuario() ?>" /></dd>
    <dd><label for="apatUsuario">Apellido Paterno</label></dd>
    <dd><input type="text" size="40" name="txtApatNuevo" value="<?php echo $usuario->getApatUsuario() ?>" /></dd>
    <dd><label for="amatUsuario">Apellido Materno</label></dd>
    <dd><input type="text" size="40" name="txtAmatNuevo" value="<?php echo $usuario->getAmatUsuario() ?>" /></dd>
    <dd><label for="tipoUsuario">Tipo Usuario</label></dd>
    <dd>
     <select name="cboUsuarioNuevo">
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
    </dd>
    <?php	   
	   if($usuario->getEstadoUsuario() == 'INACTIVO')
	   {
		   echo '<dd><label for="estadoUsuario">Estado Usuario</label></dd>';
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