<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modificar Categoría Producto</title>
<script type="text/javascript" src="lib/js/jquery-1.7.2.min.js"></script>
<?php
 if($categoria->getEstadoCategoriaProducto() == 'INACTIVO')
 	echo '<script type="text/javascript" src="lib/js/mod_caproducto.js"></script>';
 else
 {
?>
<script type="text/javascript">
	function get2(){
		$.post('indexx.php?controlador=categoriaproducto&accion=modificar', { 
		txtNombreNuevo: form1.txtNombreNuevo.value, txtCodigo: form1.txtCodigo.value },
		function(output){
			$('#datos2').html(output).show();
			});
		}
</script>
<?php
 }
?>
<script type="text/javascript" src="lib/js/formulario-categoria2.js"></script>
</head>

<body>

 <div id="formulario">
  <form id="form1" name="form1" method="post">
   <dl>
    <dd><label for="codigoCategoriaProducto">Código Categoría Producto</label></dd>
    <dd><input type="text" name="txtCodigo" value="<?php echo $categoria->getIdCategoriaProducto() ?>" readonly="readonly" /></dd>
    <dd><label for="nombreCategoriaProducto">Nombre Categoría Producto</label></dd>
    <dd>
     <input type="text" maxlength="200" autocomplete="off" name="txtNombreNuevo" id="txtNombreNuevo" size="50" 
     value="<?php echo $categoria->getNombreCategoriaProducto()?>" />
     <span id="req-nombre" class="requisites error">A-z, mínimo 4 caracteres</span>
    </dd>    
    <?php	   
	  if($categoria->getEstadoCategoriaProducto() == 'INACTIVO')
	  {
		  echo '<dd><label for="estadoCategoriaProducto">Estado Categoría Producto</label></dd>';
		  echo '<dd>';
		  echo '<select name="cboEstado">';
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