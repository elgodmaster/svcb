<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Listar Cliente</title>
</head>

<body>

<h2>Datos de Cliente:</h2>
<table>
 <tr>
  <td>
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
 <tr>
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
</table>
</td>
<td>

 <table>
  <tr>
   <td width="200" align="center">
     <?php 
  //Generar consulta que obtiene el indicie de confiabilidad
$indice = $cliente->getIndiceConfiabilidadCliente();
if($indice > 80){
		echo "<table width=72 border=0 cellspacing=0 cellpadding=0>
		  <tr>
			<td background=lib/img/grafico/gverdetop.png height=12></td>
		  </tr>
		  <tr>
			<td background=lib/img/grafico/gverde.png height=$indice>&nbsp;</td>
		  </tr>
		  <tr>
			<td background=lib/img/grafico/gverdebajo.png height=9></td>
		  </tr>
		</table>";
	}else if($indice >= 50 && $indice <= 80){
		echo "<table width=72 border=0 cellspacing=0 cellpadding=0>
		  <tr>
			<td background=lib/img/grafico/gamarillotop.png height=12></td>
		  </tr>
		  <tr>
			<td background=lib/img/grafico/gamarillo.png height=$indice>&nbsp;</td>
		  </tr>
		  <tr>
			<td background=lib/img/grafico/gamarillobajo.png height=9></td>
		  </tr>
		</table>";
		}else if($indice < 50){
			echo "<table width=72 border=0 cellspacing=0 cellpadding=0>
			  <tr>
				<td background=lib/img/grafico/grojotop.png height=12></td>
			  </tr>
			  <tr>
				<td background=lib/img/grafico/grojo.png height=$indice>&nbsp;</td>
			  </tr>
			  <tr>
				<td background=lib/img/grafico/grojobajo.png height=9></td>
			  </tr>
			</table>";
			}?>   
   </td>   
  </tr>
  <tr>
   <td align="center">Indice Confiabilidad: <?php echo $cliente->getIndiceConfiabilidadCliente() ?>%</td>
  </tr>
  <tr>
   <?php
    if($cliente->getIndiceConfiabilidadCliente() > 80)
		echo '<td align="center">Cliente Confiable</td>';
	elseif($cliente->getIndiceConfiabilidadCliente() >= 50 && $cliente->getIndiceConfiabilidadCliente() <= 80)
		echo '<td align="center">Cliente Medianamente Confiable</td>';
	elseif ($cliente->getIndiceConfiabilidadCliente() < 50)
		echo '<td align="center">Cliente Riesgoso</td>';
   ?>
  </tr>
 </table>
 
 </td>
 
 </tr>

</table>




</body>
</html>