<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<META HTTP-EQUIV="Refresh" CONTENT="3; URL=index.php">
<title>Validando Usuarios en PHP</title>
</head>
<body>
 <?php
  include("seguridad.php");
  session_unset();
  session_destroy();
 ?>
 <h1>Sesion cerrada</h1>
 <p>Se redireccionará automáticamente en 3 segundos. En caso contrario, pulsa <a href="index.php">aquí</a></p>
</body>
</html>