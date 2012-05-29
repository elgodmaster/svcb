<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Modificar Categoria Producto</title>
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
	function get(){
		$.post('indexx.php?controlador=categoriaproducto&accion=modificar', { 
		txtNombreNuevo: form1.txtNombreNuevo.value, txtCodigo: form1.txtCodigo.value , chkEstado: form1.chkEstado.value },
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
  	 <td>Codigo: </td>
  	 <td><input type="text" name="txtCodigo" value="<?php echo $categoria->getIdCategoriaProducto() ?>" readonly="readonly" /></td>
 	</tr>
 	<tr>
  	 <td>Nombre: </td>
     <td><input type="text" name="txtNombreNuevo" value="<?php echo $categoria->getNombreCategoriaProducto() ?>" /></td>
	 </tr>
 	<tr>
  	 <td>Estado</td>
  	 <td>
  	 <?php
   	 	if($categoria->getEstadoCategoriaProducto() == 'ACTIVO')
   			echo '<input type="checkbox" name="chkEstado" checked="checked" />';
   		else
   			echo '<input type="checkbox" name="chkEstado" />';
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