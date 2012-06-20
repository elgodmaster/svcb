<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ingresar Categoria Producto</title>
<link href="lib/css/formularios.css" rel="stylesheet" type="text/css" />
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
	function get(){
		$.post('indexx.php?controlador=categoriaproducto&accion=ingresar', { txtNombre: form.txtNombre.value },
		function(output){
			$('#datos').html(output).show();
			});
		}
</script>
</head>

<body>

 <div id="formulario">
  <form id="form" name="form" method="post">
   <dl>
    <dt><h2>Ingresar Categoría Producto</h2></dt>
    <dd><label for="nombreCategoriaProducto">Nombre Categoría Producto</label></dd>
    <dd><input type="text" size="40" name="txtNombre" id="txtNombre" /></dd>
    <dd><input type="button" class="button" value="Ingresar" onClick="get();" /><input class="button" type="reset" /></dd>
   </dl>
  </form>
 </div>
 
 <hr />
 
 <div id="datos">
 </div>
 
</body>
</html>