<?php
  include("seguridad.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>::: Arte Bismarck :::</title>
<link href="lib/css/styles.css" rel="stylesheet" type="text/css" />
<link href="lib/css/menu.css" rel="stylesheet" type="text/css" />
<script src="lib/js/jquery-1.7.2.min.js"></script>
<script src="lib/js/general.js"></script>
</head>

<body>
<div class="contenedor">
<table width="950" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
<header class="cabecera">
<table width="950" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="logo"><img src="lib/img/logo.gif" width="442" height="133" /></div></td>
        <td valign="bottom"><div class="sesion">
         <p>Bienvenido <?php echo $_SESSION['tipo_usuario']; ?>: <?php echo $_SESSION['usuario']; ?> | <a href="cerrar.php?cerrar">Cerrar Sesión</a></p></div></td>
      </tr>
    </table>
</header></td>
  </tr>
  <tr>
    <td><table width="950" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="200" background="lib/img/back_menu.gif" valign="top">
        <nav id="menu">
        <?php
		switch ($_SESSION['codigo_usuario'])
		{
			case 1001:
				include("include/m_admin.php");
				break;
			case 1002:
				include("include/m_vende.php");
				break;
			case 1003:
				include("include/m_bode.php");
				break;
		}
		?>
    	</nav>
		</td>
        <td class="back_art" valign="top">
        <article class="articulo">
        	<section class="seccion"><!-- AQUI SE CARGA EL CONTENIDO DE LA PAGINA -->
            	<?php
					switch ($_SESSION['codigo_usuario'])
					{
						case 1001:
							include("administrador/index.php");
							break;
						case 1002:
							include("vendedor/index.php");
							break;
						case 1003:
							include("bodeguero/index.php");
							break;
					}
				?>
            </section>
        </article></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><footer class="pie"><p>Arte Bismarck | todos los derechos reservados</p></footer></td>
  </tr>
</table>
</div>
</body>
</html>