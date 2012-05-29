<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Listar Cliente</title>
</head>

<body>

<h2>Datos de Cliente:</h2>
<table>
 <tr>
  <td>Estado: </td><td><?php echo $cliente->getEstadoCliente() ?></td>
 </tr>
 <tr>
  <td>RUT Cliente: </td><td><?php echo $cliente->getIdCliente() ?></td>
 </tr>
 <tr>
  <td>Nombre Cliente: </td><td><?php echo $cliente->getNombreCliente() ?></td>
 </tr>
 <tr>
  <td>Direccion Cliente: </td><td><?php echo $cliente->getDireccionCliente() ?></td>
 </tr>
 </tr>
  <td>Comuna: </td><td><?php echo $comuna->getNombreComuna() ?></td>
 </tr>
 <tr>
  <td>Telefono Cliente: </td><td><?php echo $cliente->getTelefonoCliente() ?></td>
 </tr>
 <tr>
  <td>Email Cliente: </td><td><?php echo $cliente->getEmailCliente() ?></td>
 </tr>
 <tr>
  <td>Giro Cliente: </td><td><?php echo $cliente->getGiroCliente() ?></td>
 </tr>
 <tr>
  <td>Indice Confiabilidad: </td><td><?php echo $cliente->getIndiceConfiabilidadCliente() ?>%</td>
</table>

</body>
</html>