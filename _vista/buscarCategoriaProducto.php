<?php
 if(isset($_GET['accion']))
	 $accion = $_GET['accion'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
 if($accion == 'listar')
 	 echo '<title>Listar Categoría Producto</title>';
 elseif($accion == 'modificar')
 	 echo '<title>Modificar Categoría Producto</title>';
 elseif($accion == 'eliminar')
 	 echo '<title>Eliminar Categoría Producto</title>';
?>
<link href="lib/css/formularios.css" rel="stylesheet" type="text/css" />
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src='lib/js/jquery.autocomplete.js'></script>
<link href="lib/css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
  $().ready(function() {
	$("#txtNombre").autocomplete("lib/ajax/categoria_producto.php", {
      width: 273,
      matchContains: true,
      selectFirst: false
    });
  });
</script>
<script type="text/javascript">
	function get(){
		$.post('indexx.php?controlador=categoriaproducto&accion=<?php echo $accion ?>', { txtNombre: form.txtNombre.value },
		function(output){
			$('#datos').html(output).show();
			});
		}
</script>
</head>

<body>

 <div id="busqueda">
  <?php
   if($accion == 'listar')
   	  echo '<h2>Listar Categoría Producto</h2>';
   elseif($accion == 'modificar')
 	  echo '<h2>Modificar Categoría Producto</h2>';
   elseif($accion == 'eliminar')
 	  echo '<h2>Eliminar Categoría Producto</h2>';
  ?>
  <form id="form" name="form" method="post">
   <label for="nombreCliente">Nombre:</label>
   <input type="text" maxlength="200" size="40" name="txtNombre" id="txtNombre" />
   <?php
	if($accion == 'eliminar')
		echo '<input type="button" class="button" name="btnConsultar" value="Eliminar" onClick="get();" />';
	else
		echo '<input type="button" class="button" name="btnConsultar" value="Buscar" onClick="get();" />';
   ?>
  </form>
 </div>

 <hr />

 <div id="datos">
 </div>

</body>
</html>