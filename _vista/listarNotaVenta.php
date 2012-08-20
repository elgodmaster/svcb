<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clientes Morosos</title>
<link href="lib/css/tablas.css" rel="stylesheet" type="text/css" />
</head>

<body>
 <h2>Clientes Morosos</h2>
 <div id="formulariox">
  <table border="0" width="100%">
   <thead>
    <tr>
     <th scope="col">RUN Cliente</th>
     <th scope="col">Nombre Cliente</th>
     <th scope="col">N° Factura</th>
     <th scope="col">Fecha Emisión</th>
     <th scope="col">Fecha Vencimiento</th>
     <th scope="col">Monto Total</th>
    </tr>
   </thead>
   <tbody>
   <?php
   		//desde 2 por que el arrglo guarda . y .. en las posiciones 0 y 1
   for ($i=2;$i<count($imagenes);$i++){
   {
	    if ($i%2==0){
		   echo '<tr align="center">';
		}else{
			echo '<tr class="odd" align="center">';
		}
		
   ?>
    <td><?php echo $imagenes[$i]; ?></td>
    <td></td>
    <td></td>    
    <td></td>
    <td></td>
    <td></td>
   </tr>
   <?php
   }
   ?>
   </tbody>
  </table>
 </div>
 
</body>
</html>