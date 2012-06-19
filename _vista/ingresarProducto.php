<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ingresar Producto</title>
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
	function get(){
		$.post('indexx.php?controlador=producto&accion=ingresar', {
			cboCategoria: form.cboCategoria.value, txtNombre: form.txtNombre.value, txtaDescripcion: form.txtaDescripcion.value,
			txtPrecio: form.txtPrecio.value, txtStockR: form.txtStockR.value, txtStockM: form.txtStockM.value
			 },
		function(output){
			$('#datos').html(output).show();
			});
		}
</script>
</head>

<body>

 <div>
  <h2>Ingresar Producto</h2>
  <form id="form" name="form" method="post">
   <table>
    <tr>
     <td>Categoría:</td>
     <td>
     <select style="width:305px;margin-left:2px" name="cboCategoria">
      <option>Elige una Categoría</option>
      <?php
       while ($reg = mysql_fetch_array($productos))
	   {
		   echo "<option value=\"".$reg['id_categoria_producto']."\">".$reg['nombre_categoria_producto']."</option>";
	   }
	  ?>
     </select>
     </td>
    </tr>
    <tr>
     <td>Nombre:</td>
     <td><input type="text" name="txtNombre" size="45" id="txtNombre" /></td>
    </tr>
    <tr>
     <td>Descripción:</td>
     <td><textarea name="txtaDescripcion" style="width:298px;min-height:100px;margin-left:2px"></textarea></td>
    </tr>
    <tr>
     <td>Precio:</td>
     <td><input type="text" name="txtPrecio" size="45" /></td>
    </tr>
    <tr>
     <td>Stock Real:</td>
     <td><input type="text" name="txtStockR" size="45" /></td>
    </tr>
    <tr>
     <td>Stock Minimo:</td>
     <td><input type="text" name="txtStockM" size="45" /></td>
    </tr>
    <tr>
     <td></td>
     <td><input type="button" name="btnConsultar" value="Ingresar" onClick="get();" /><input type="reset" /></td>
    </tr>
   </table>
  </form>
 </div>
 
 <hr />
 
 <div id="datos">
 </div>
 
</body>
</html>