<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Modificar Producto</title>
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
	function get2(){
		$.post('indexx.php?controlador=producto&accion=modificar', {
			txtCodigo: form1.txtCodigo.value, txtNombreNuevo: form1.txtNombreNuevo.value, txtPrecioNuevo: form1.txtPrecioNuevo.value,
			cboCategoriaNuevo: form1.cboCategoriaNuevo.value, txtaDescripcionNuevo: form1.txtaDescripcionNuevo.value, 
			txtStockRNuevo: form1.txtStockRNuevo.value, txtStockMNuevo: form1.txtStockMNuevo.value, cboEstado: form1.cboEstado.value },
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
  	 <td>Codigo:</td>
  	 <td><input type="text" name="txtCodigo" value="<?php echo $producto->getCodigoProducto() ?>" readonly="readonly" /></td>
 	</tr>
    <tr>
     <td>Categoría:</td>
     <td>
      <select style="width:305px;margin-left:2px" name="cboCategoriaNuevo">
       <option>Elige una Categoría</option>
       <?php
       while ($reg = mysql_fetch_array($lista))
	   {
		   if($reg['id_categoria_producto'] == $categoria->getIdCategoriaProducto())
		   	  echo "<option value=\"".$reg['id_categoria_producto']."\" selected=\"selected\">".$reg['nombre_categoria_producto']."
			  </option>";
		   else
		      echo "<option value=\"".$reg['id_categoria_producto']."\">".$reg['nombre_categoria_producto']."</option>";
	   }
	  ?>
      </select>
     </td>
    </tr>
 	<tr>
  	 <td>Nombre:</td>
     <td><input type="text" name="txtNombreNuevo" size="45" value="<?php echo $producto->getNombre() ?>" /></td>
	</tr>
    <tr>
  	 <td>Descripción:</td>
     <td>
     <textarea name="txtaDescripcionNuevo" style="width:298px;min-height:100px;margin-left:2px"><?php echo $producto->getDescripcion() 
	 ?></textarea>
     </td>
    </tr>
    <tr>
  	 <td>Precio</td>
     <td><input type="text" name="txtPrecioNuevo" size="45" value="<?php echo $producto->getPrecio() ?>" /></td>
    </tr>
    <tr>
  	 <td>Stock Real:</td>
     <td><input type="text" name="txtStockRNuevo" size="45" value="<?php echo $producto->getStockReal() ?>" /></td>
    </tr>
    <tr>
  	 <td>Stock Minimo:</td>
     <td><input type="text" name="txtStockMNuevo" size="45" value="<?php echo $producto->getStockMinimo() ?>" /></td>
    </tr>
 	<tr>
  	 <td>Estado:</td>
  	 <td>
     <select name="cboEstado">
  	 <?php
   	 	if($producto->getEstado() == 'ACTIVO')
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