<h3>Datos del Usuario</h3>
<table>
 <tr>
  <td>Estado: </td><td><?php echo $usuario->getEstadoUsuario() ?></td>
 </tr>
 <tr>
  <td>RUT: </td><td><?php echo $usuario->getIdUsuario() ?></td>
 </tr>
 <tr>
  <td>Nombre: </td><td><?php echo $usuario->getNombreUsuario() ?></td>
 </tr>
 <tr>
  <td>Apellido Paterno: </td><td><?php echo $usuario->getApatUsuario() ?></td>
 </tr>
 <tr>
  <td>Apellido Materno: </td><td><?php echo $usuario->getAmatUsuario() ?></td>
 </tr>
 <tr>
  <td>Tipo Usuario: </td><td><?php echo $tipo_usuario ?></td>
 </tr>
</table>