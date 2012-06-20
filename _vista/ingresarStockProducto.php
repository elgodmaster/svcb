<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ingresar Stock Producto</title>
<link href="lib/css/formularios.css" rel="stylesheet" type="text/css" />
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
	function get2(){
		$.post('indexx.php?controlador=bodeguero&accion=ingresarstock', {
			txtCodigo: form1.txtCodigo.value, txtNombreNuevo: form1.txtNombreNuevo.value, txtStockRNuevo: form1.txtStockRNuevo.value },
		function(output){
			$('#datos2').html(output).show();
			});
		}
</script>
</head>

<body>

 <div id="formulario">
  <form id="form1" name="form1" method="post">
   <dl>
    <dd><label for="categoriaProducto">Categoría Producto</label></dd>
    <dd>
     <select disabled="disabled" style="width:305px;margin-left:2px" name="cboCategoriaNuevo">
      <option value="<?php echo $categoria->getIdCategoriaProducto()?>"><?php echo $categoria->getNombreCategoriaProducto()?></option>
     </select>
    </dd>
    <dd><label for="codigoProducto">Código Producto</label></dd>
    <dd><input type="text" name="txtCodigo" value="<?php echo $producto->getCodigoProducto() ?>" disabled="disabled" /></dd>
    <dd><label for="nombreProducto">Nombre Producto</label></dd>
    <dd><input type="text" name="txtNombreNuevo" size="45" value="<?php echo $producto->getNombre() ?>" disabled="disabled" /></dd>
    <dd><label for="descripcionProducto">Descripción Producto</label></dd>
    <dd>
     <textarea disabled="disabled" name="txtaDescripcionNuevo" style="width:298px;min-height:100px;margin-left:2px"><?php echo $producto->getDescripcion() ?></textarea>
    </dd>
    <dd><label for="stockRealProducto">Stock Real Producto</label></dd>
    <dd><input type="text" name="txtStockRNuevo" size="45" value="<?php echo $producto->getStockReal() ?>" /></dd>
    <dd><input type="button" class="button" value="Modificar" onClick="get2();" /></dd>
   </dl>
  </form>
 </div>
 
 <hr />
 
 <div id="datos2">
 </div>

</body>
</html>