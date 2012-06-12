<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Eliminar Cliente</title>
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src='lib/js/jquery.autocomplete.js'></script>
<link href="lib/css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
  $().ready(function() {
	$("#txtNombre").autocomplete("lib/ajax/cliente.php", {
      width: 260,
      matchContains: true,
      selectFirst: false
    });
  });
</script>
<script type="text/javascript">
	function get(){
		$.post('indexx.php?controlador=vendedor&accion=listarclientes', { txtNombre: form.txtNombre.value },
		function(output){
			$('#datos').html(output).show();
			});
		}
</script>
</head>

<body>
 
 <div id="busqueda">
  <h2>Ventas por Cliente</h2>
  <form id="form" name="form" method="post">
   <table>
 	<tr>
  	 <td>Nombre:</td>
  	 <td><input type="text" name="txtNombre" id="txtNombre"/></td>
  	 <td><input type="button" name="btnConsultar" value="Buscar" onClick="get();" /></td>
 	</tr>
   </table>
  </form>
 </div>

 <hr />

 <div id="datos">
 </div>

</body>
</html>