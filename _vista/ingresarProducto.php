<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ingresar Producto</title>
<link href="lib/css/formularios.css" rel="stylesheet" type="text/css" />
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

 <div id="formulario">
  <form id="form" name="form" method="post">
   <dl>
    <dt><h2>Ingresar Producto</h2></dt>
    <dd><label for="categoriaProducto">Categoría Producto</label></dd>
    <dd>
     <select name="cboCategoria">
      <option>Elige una Categoría</option>
      <?php
       while ($reg = mysql_fetch_array($productos))
	   {
		   $nombre_categoria_producto = ucwords(strtolower($reg['nombre_categoria_producto']));
		   echo "<option value=\"".$reg['id_categoria_producto']."\">$nombre_categoria_producto</option>";
	   }
	  ?>
     </select>
    </dd>
    <dd><label for="nombreProducto">Nombre Producto</label></dd>
    <dd><input type="text" name="txtNombre" size="50" id="txtNombre" /></dd>    
    <dd><label for="descripcionProducto">Descripción Producto</label></dd>
    <dd><textarea name="txtaDescripcion"></textarea></dd>
    <dd><label for="precioProducto">Precio Producto</label></dd>
    <dd><input type="text" name="txtPrecio" size="50" /></dd>
    <dd><label for="stockRealProducto">Stock Real</label></dd>
    <dd><input type="text" name="txtStockR" size="50" /></dd>
    <dd><label for="stockMinimoProducto">Stock Mínimo</label></dd>
    <dd><input type="text" name="txtStockM" size="50" /></dd>
    <dd><input type="button" class="button" value="Ingresar" onClick="get();" /><input class="button" type="reset" /></dd>
   </dl>
  </form>
 </div>
 
 <hr />
 
 <div id="datos">
 </div>
 
</body>
</html>