<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Listar Producto</title>
</head>

<body>

 <div id="formulario">
  <h2>Datos del Producto</h2>
  <dl>
   <dd><label>Categoría Producto: <?php echo $categoria->getNombreCategoriaProducto()?></label></dd>
   <dd><label>Código Producto: <?php echo $producto->getCodigoProducto()?></label></dd>
   <dd><label>Nombre Producto: <?php echo $producto->getNombre()?></label></dd>
   <dd><label>Descripción Producto: <?php echo $producto->getDescripcion()?></label></dd>
   <dd><label>Stock Real: <?php echo $producto->getStockReal()?></label></dd>
  </dl>
 </div>

</body>
</html>