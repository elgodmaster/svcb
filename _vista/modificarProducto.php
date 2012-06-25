<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modificar Producto</title>
<script src="lib/js/jquery-1.7.2.min.js"></script>
<?php
 if($producto->getEstado() == 'INACTIVO')
 	echo '<script type="text/javascript" src="lib/js/mod_producto.js"></script>';
 else
 {
?>
<script type="text/javascript">
	function get2(){
		$.post('indexx.php?controlador=producto&accion=modificar', {
			txtCodigo: form1.txtCodigo.value, txtNombreNuevo: form1.txtNombreNuevo.value, txtPrecioNuevo: form1.txtPrecioNuevo.value,
			cboCategoriaNuevo: form1.cboCategoriaNuevo.value, txtaDescripcionNuevo: form1.txtaDescripcionNuevo.value, 
			txtStockRNuevo: form1.txtStockRNuevo.value, txtStockMNuevo: form1.txtStockMNuevo.value },
		function(output){
			$('#datos2').html(output).show();
			});
		}
</script>
<?php
 }
?>
<script type="text/javascript" src="lib/js/formulario-producto2.js"></script>
</head>

<body>

 <div id="formulario">
  <form id="form1" name="form1" method="post">
   <dl>
    <dd><label for="codigoProducto">Código Producto</label></dd>
    <dd><input type="text" name="txtCodigo" value="<?php echo $producto->getCodigoProducto()?>" readonly="readonly" /></dd>
    <dd><label for="categoriaProducto">Categoría Producto</label></dd>
    <dd>
     <select name="cboCategoriaNuevo" id="cboCategoriaNuevo">
      <option value="0">Elige una Categoría</option>
      <?php
        while ($reg = mysql_fetch_array($lista))
	    {
			$nombre_categoria_producto = ucwords(strtolower($reg['nombre_categoria_producto']));
			if($reg['id_categoria_producto'] == $categoria->getIdCategoriaProducto())
				echo "<option value=\"".$reg['id_categoria_producto']."\" selected=\"selected\">$nombre_categoria_producto</option>";
		    else
		     	echo "<option value=\"".$reg['id_categoria_producto']."\">$nombre_categoria_producto</option>";
	    }
	  ?>
     </select>
     <span id="req-categoria" class="requisites error">Seleccione una categoría producto</span>
    </dd>    
    <dd><label for="nombreProducto">Nombre Producto</label></dd>
    <dd>
     <input type="text" name="txtNombreNuevo" id="txtNombreNuevo" autocomplete="off" maxlength="250" size="50" 
     value="<?php echo $producto->getNombre()?>" />
     <span id="req-nombre" class="requisites error">A-z, mínimo 4 caracteres</span>
     </dd>
    <dd><label for="descripcionProducto">Descripción Producto</label></dd>
    <dd>
     <textarea name="txtaDescripcionNuevo" id="txtaDescripcionNuevo"><?php echo $producto->getDescripcion()?></textarea>
     <span id="req-descripcion" class="requisites error">[A-z][0-9], mínimo 5 caracteres, máximo 250 caracteres</span>
    </dd>
    <dd><label for="precioProducto">Precio Producto</label></dd>
    <dd>
     <input type="text" autocomplete="off" name="txtPrecioNuevo" id="txtPrecioNuevo" size="50" 
     value="<?php echo $producto->getPrecio()?>" />
     <span id="req-precio" class="requisites error">Un precio válido por favor</span>
     </dd>
    <dd><label for="stockRealProducto">Stock Real</label></dd>
    <dd>
     <input type="text" autocomplete="off" name="txtStockRNuevo" id="txtStockRNuevo" size="50" 
     value="<?php echo $producto->getStockReal()?>" />
     <span id="req-stockr" class="requisites error">Un stock válido por favor</span>
    </dd>
    <dd><label for="stockMinimoProducto">Stock Mínimo</label></dd>
    <dd>
     <input type="text" autocomplete="off" name="txtStockMNuevo" id="txtStockMNuevo" size="50" 
     value="<?php echo $producto->getStockMinimo()?>" />
     <span id="req-stockm" class="requisites error">Un stock válido por favor</span>
    </dd>
    <?php	   
	  if($producto->getEstado() == 'INACTIVO')
	  {
		  echo '<dd><label for="estadoProducto">Estado Producto</label></dd>';
		  echo '<dd>';
		  echo '<select name="cboEstado">';
		  echo '<option value="INACTIVO" selected="selected">No Disponible</option>';
		  echo '<option value="ACTIVO">Disponible</option>';
		  echo '</select>';
		  echo '</dd>';
	  }
  	?>
    <dd>
     <input type="button" class="button" name="botonEnviar" id="botonEnviar" value="Modificar" />
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