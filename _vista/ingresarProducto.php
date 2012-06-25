<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ingresar Producto</title>
<link href="lib/css/formularios.css" rel="stylesheet" type="text/css" />
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="lib/js/formulario-producto1.js"></script>
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
     <select name="cboCategoria" id="cboCategoria">
      <option value="0">Elige una Categoría</option>
      <?php
       while ($reg = mysql_fetch_array($productos))
	   {
		   $nombre_categoria_producto = ucwords(strtolower($reg['nombre_categoria_producto']));
		   echo "<option value=\"".$reg['id_categoria_producto']."\">$nombre_categoria_producto</option>";
	   }
	  ?>
     </select>
     <span id="req-categoria" class="requisites error">Seleccione una categoría producto</span>
    </dd>
    <dd><label for="nombreProducto">Nombre Producto</label></dd>
    <dd>
     <input type="text" autocomplete="off" maxlength="250" name="txtNombre" size="50" id="txtNombre" />
     <span id="req-nombre" class="requisites error">A-z, mínimo 4 caracteres</span>
    </dd>
    <dd><label for="descripcionProducto">Descripción Producto</label></dd>
    <dd>
     <textarea name="txtaDescripcion" id="txtaDescripcion"></textarea>
     <span id="req-descripcion" class="requisites error">[A-z][0-9], mínimo 5 caracteres, máximo 250 caracteres</span>
    </dd>
    <dd><label for="precioProducto">Precio Producto</label></dd>
    <dd>
     <input type="text" autocomplete="off" name="txtPrecio" id="txtPrecio" size="50" />
     <span id="req-precio" class="requisites error">Un precio válido por favor</span>
    </dd>
    <dd><label for="stockRealProducto">Stock Real</label></dd>
    <dd>
     <input type="text" autocomplete="off" name="txtStockR" id="txtStockR" size="50" />
     <span id="req-stockr" class="requisites error">Un stock válido por favor</span>
    </dd>
    <dd><label for="stockMinimoProducto">Stock Mínimo</label></dd>
    <dd>
     <input type="text" autocomplete="off" name="txtStockM" id="txtStockM" size="50" />
     <span id="req-stockm" class="requisites error">Un stock válido por favor</span>
    </dd>
    <dd>
     <input type="button" class="button" value="Ingresar" name="botonEnviar" id="botonEnviar" />
     <input class="button" type="reset" />
    </dd>
   </dl>
  </form>
 </div>
 
 <hr />
 
 <div id="datos">
 </div>
 
</body>
</html>