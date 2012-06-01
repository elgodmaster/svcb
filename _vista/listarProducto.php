<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Listar Producto</title>
</head>

<body>

<h2>Datos del Producto</h2>
<table>
 <tr>
  <td>Estado: </td><td><?php echo $producto->getEstado() ?></td>
 </tr>
 <tr>
  <td>Codigo: </td><td><?php echo $producto->getCodigoProducto() ?></td>
 </tr>
 <tr>
  <td>Nombre: </td><td><?php echo $producto->getNombre() ?></td>
 </tr>
 <tr>
  <td>Descripción: </td><td><?php echo $producto->getDescripcion() ?></td>
 </tr>
 <tr>
  <td>Precio: </td><td>$<?php echo $producto->getPrecio() ?></td>
 </tr>
 <tr>
  <td>Stock Real: </td><td><?php echo $producto->getStockReal() ?></td>
 </tr>
 <tr>
  <td>Stock Minimo:</td><td><?php echo $producto->getStockMinimo() ?></td>
 </tr>
 <tr>
  <td>Categoria Producto: </td><td><?php echo $categoria->getNombreCategoriaProducto() ?></td>
 </tr>
</table>

</body>
</html>