<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Ingresar Cliente</title>
</head>

<body>

<h2>Datos de Cliente:</h2>
<form action="indexx.php?controlador=cliente&accion=ingresar" method="post">
<table>
 <tr>
  <td>RUT Cliente: </td><td><input type="text" name="txtRut"/></td>
 </tr>
 <tr>
  <td>Nombre Cliente: </td><td><input type="text" name="txtNombre" /></td>
 </tr>
 <tr>
  <td>Direccion Cliente: </td><td><input type="text" name="txtDireccion"/></td>
 </tr>
 <tr>
  <td>Region: </td>
  <td>
   <select name="cboRegion">
    <option value="0">Elegir Región</option>
   </select>
  </td>
 </tr>
 <tr>
  <td>Ciudad</td>
  <td>
   <select name="cboCiudad">
    <option value="0">Elegir Ciudad</option>
   </select>
  </td>
 </tr>
 </tr>
  <td>Comuna: </td>
  <td>
   <select name="cboComuna">
    <option value="0">Elegir Comuna</option>
    <option value="1001">San Bernardo</option>
   </select>
  </td>
 </tr>
 <tr>
  <td>Telefono Cliente: </td><td><input type="text" name="txtTelefono"/></td>
 </tr>
 <tr>
  <td>Email Cliente: </td><td><input type="text" name="txtEmail"/></td>
 </tr>
 <tr>
  <td>Giro Cliente: </td><td><input type="text" name="txtGiro"/></td>
 </tr>
 <tr>
  <td></td>
  <td colspan="2"><input type="submit" value="Registrar" /></td>
 </tr>
</table>
</form>

</body>
</html>