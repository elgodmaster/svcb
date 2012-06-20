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
 	 echo '<title>Listar Usuario</title>';
 elseif($accion == 'modificar')
 	 echo '<title>Modificar Usuario</title>';
 elseif($accion == 'eliminar')
 	 echo '<title>Eliminar Usuario</title>';
 elseif($accion == 'modificarpassword')
 	 echo '<title>Modificar Password</title>';
?>
<link href="lib/css/formularios.css" rel="stylesheet" type="text/css" />
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src='lib/js/jquery.autocomplete.js'></script>
<link href="lib/css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
  $().ready(function() {
	$("#txtNombre").autocomplete("lib/ajax/usuario.php", {
      width: 105,
      matchContains: true,
      selectFirst: false
    });
  });
</script>
<script type="text/javascript">
	function get(){
		$.post('indexx.php?controlador=usuario&accion=<?php echo $accion ?>', { txtNombre: form.txtNombre.value },
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
   	   echo '<h2>Listar Usuario</h2>';
   elseif($accion == 'modificar')
 	   echo '<h2>Modificar Usuario</h2>';
   elseif($accion == 'eliminar')
 	   echo '<h2>Eliminar Usuario</h2>';
   elseif($accion == 'modificarpassword')
   	   echo '<h2>Modificar Password Usuario</h2>';
  ?>
  <form id="form" name="form" method="post">
   <label for="runCliente">RUN:</label>
   <input type="text" size="12" name="txtNombre" id="txtNombre" />
   <?php
	if($accion == 'eliminar')
		echo '<input type="button" class="button" name="btnConsultar" value="Eliminar" onClick="get();" />';
	elseif($accion == 'modificarpassword')
	   	echo '<input type="button" class="button" name="btnConsultar" value="Modificar Password" onClick="get();" />';
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