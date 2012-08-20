<?php
	if (isset($_POST['txtNombre']) && isset($_POST['txtClave']))
	{
		include("_modelo/FabricaUsuario.php");
		include("_modelo/Usuario.php");
		
		$v_id = $_POST['txtNombre'];
		$v_tipo = $_POST['cboTipo'];
		$v_pass = $_POST['txtClave'];
		$contrasena = md5($v_pass);		
		
		$usuariox = Usuario::autentificarUsuario($v_id);		
		$row = mysql_fetch_assoc($usuariox);
		
		if(($contrasena == $row['password_usuario']) && ($v_tipo == $row['tipo_usuario_id_tipo_usuario']))
		{
			if($row['estado_usuario'] == 'ACTIVO')
			{
				$usuario_login = FabricaUsuario::autentificarUsuario($v_id,$row['nombre_usuario'],$row['apat_usuario'],$row['amat_usuario'],$v_tipo);
				session_start();
				$_SESSION['id_usuario'] = $usuario_login->getIdUsuario();
				$_SESSION['nombre_usuario'] = $usuario_login->getNombreUsuario();
				$_SESSION['apat_usuario'] = $usuario_login->getApatUsuario();
				$_SESSION['amat_usuario'] = $usuario_login->getAmatUsuario();
				$_SESSION['codigo_usuario'] = $v_tipo;
				 
				if ($v_tipo == 1001)
					$_SESSION['tipo_usuario'] = "Administrador";
				elseif ($v_tipo == 1002)
					$_SESSION['tipo_usuario'] = "Vendedor";
				elseif ($v_tipo == 1003)
					$_SESSION['tipo_usuario'] = "Bodeguero";
				header("location:index.php");
			}
			else
			{
				echo "<script language='javascript'>alert('La sesión no se encuentra disponible');this.location ='validar.php';</script>";			 
			}
		}
		else
		{
			echo "<script language='javascript'>alert('Datos Incorrectos'); this.location ='validar.php';</script>";
		}
	}
	else
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Arte Bismarck | Login</title>
<link href="lib/css/login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="lib/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="lib/js/jquery.flipclock.js"></script>
<script type="text/javascript" src="lib/js/validarut.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
	 $("#flipclock").flipclock({ampm: false, dot: true, dot2: true});
 });  
</script>
</head>
<body>
 <div id="flipclock"></div>
 <div id="contenedor">
  <!--<div id="logo"></div>-->
  <div class="container">
   <section id="content" name="content">
    <form name="form" action="validar.php" method="post">
     <div>
      <input type="text" placeholder="Usuario (RUN)" name="txtNombre" onblur="javascript:return Rut(document.form.txtNombre.value)"/>
     </div>
     <div>
      <input type="password" placeholder="Contraseña" name="txtClave" />
     </div>
     <div class="form_listbox">
      <select name="cboTipo">
       <option value="1001">Administrador</option>
       <option value="1002">Vendedor</option>
       <option value="1003">Bodeguero</option>
      </select>
     </div>
     <div id="boton">
      <input type="submit" value="Iniciar Sesión" />
     </div>
    </form>
    <div id="logo"><img src="lib/img/login/logo_index.png" width="375" height="234" /></div>  
   </section>
  </div>
 </div>
</body>
</html>
<?php
	}
?>