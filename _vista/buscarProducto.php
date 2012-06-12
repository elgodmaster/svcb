<?php
 if(isset($_GET['accion']))
	 $accion = $_GET['accion'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<?php
 if($accion == 'listar')
 	 echo '<title>Listar Producto</title>';
 elseif($accion == 'modificar')
 	 echo '<title>Modificar Producto</title>';
 elseif($accion == 'eliminar')
 	 echo '<title>Eliminar Producto</title>';
?>
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src='lib/js/jquery.autocomplete.js'></script>
<link href="lib/css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
  $().ready(function() {
	$("#txtNombre").autocomplete("lib/ajax/producto.php", {
      width: 260,
      matchContains: true,
      selectFirst: false
    });
  });
</script>
<script type="text/javascript">
	function get(){
		$.post('indexx.php?controlador=producto&accion=<?php echo $accion ?>', { txtNombre: form.txtNombre.value },
		function(output){
			$('#datos').html(output).show();
			});
		}
</script>
</head>

<body>

 <div id="formulario">
  <?php
   if($accion == 'listar')
   	   echo '<h2>Listar Producto</h2>';
   elseif($accion == 'modificar')
 	   echo '<h2>Modificar Producto</h2>';
   elseif($accion == 'eliminar')
 	   echo '<h2>Eliminar Producto</h2>';
  ?>
  <form id="form" name="form" method="post">
   <table>
 	<tr>
  	 <td>Nombre:</td>
  	 <td><input type="text" name="txtNombre" id="txtNombre" /></td>
     <td>
	 <?php
	   if($accion == 'eliminar')
	   		echo '<input type="button" name="btnConsultar" value="Eliminar" onClick="get();" />';
	   else
	   		echo '<input type="button" name="btnConsultar" value="Buscar" onClick="get();" />';
	 ?>
     </td>
 	</tr>
   </table>
  </form>
 </div>
 
 <hr />
 
 <div id="datos">
 </div>

</body>
</html>