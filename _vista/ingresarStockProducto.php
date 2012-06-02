<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Ingresar Stock Producto</title>
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
	function get2(){
		$.post('indexx.php?controlador=bodeguero&accion=ingresarstock', {
			txtCodigo: form1.txtCodigo.value, txtNombreNuevo: form1.txtNombreNuevo.value, txtStockRNuevo: form1.txtStockRNuevo.value },
		function(output){
			$('#datos2').html(output).show();
			});
		}
</script>
</head>

<body>

 <div id="formulario">
  <form id="form1" name="form1" method="post">
   <table> 	
    <tr>
     <td>Categoría:</td>
     <td>
      <select disabled="disabled" style="width:305px;margin-left:2px" name="cboCategoriaNuevo">
       <option value="<?php echo $categoria->getIdCategoriaProducto() ?>"><?php echo $categoria->getNombreCategoriaProducto() ?></option>
      </select>
     </td>
    </tr>
    <tr>
  	 <td>Codigo:</td>
  	 <td><input type="text" name="txtCodigo" value="<?php echo $producto->getCodigoProducto() ?>" disabled="disabled" /></td>
 	</tr>
 	<tr>
  	 <td>Nombre:</td>
     <td><input type="text" name="txtNombreNuevo" size="45" value="<?php echo $producto->getNombre() ?>" disabled="disabled" /></td>
	</tr>
    <tr>
  	 <td>Descripción:</td>
     <td>
     <textarea disabled="disabled" name="txtaDescripcionNuevo" style="width:298px;min-height:100px;margin-left:2px"><?php echo $producto->getDescripcion() ?></textarea>
     </td>
    </tr>
    <tr>
  	 <td>Stock Real:</td>
     <td><input type="text" name="txtStockRNuevo" size="45" value="<?php echo $producto->getStockReal() ?>" /></td>
    </tr>    
 	<tr>
  	 <td></td>
  	 <td colspan="2"><input type="button" name="btnConsultar" value="Modificar" onClick="get2();" /></td>
 	</tr>
   </table>
  </form>
 </div>
 
 <hr />
 
 <div id="datos2">
 </div>

</body>
</html>