<?php
 include("Conexion.php");
 class Usuario
 {
	 //Variables de la clase Usuario
	 private $id_usuario;
	 private $password_usuario;
	 private $nombre_usuario;
	 private $apat_usuario;
	 private $amat_usuario;
	 private $estado_usuario;
	 
	 //Metodos de la clase Usuario
	 function autentificarUsuario()
	 {
		 
	 }	 
	 
	 //Get de la clase Usuario
	 function getIdUsuario()
	 {
		 return $this->id_usuario;
	 }
	 
	 function getPasswordUsuario()
	 {
		 return $this->password_usuario;
	 }
	
	 function getNombreUsuario()
	 {
		 return $this->nombre_usuario;
	 }
		 
	 function getApatUsuario()
	 {
		 return $this->apat_usuario;
	 }
	 
	 function getAmatUsuario()
	 {
		 return $this->amat_usuario;
	 }
	 
	 function getEstadoUsuario()
	 {
		 return $this->estado_usuario;
	 }
	
	 //Set de la clase Usuario
	 function setIdUsuario($id_usuario)
	 {
		 $this->id_usuario = $id_usuario;
	 }
	 
	 function setPasswordUsuario($password_usuario)
	 {
		 $this->password_usuario = $password_usuario;
	 }
	
	 function setNombreUsuario($nombre_usuario)
	 {
		 $this->nombre_usuario = $nombre_usuario;
	 }
	
	 function setApatUsuario($apat_usuario)
	 {
		 $this->apat_usuario = $apat_usuario;
	 }
	 
	 function setAmatUsuario($amat_usuario)
	 {
		 $this->amat_usuario = $amat_usuario;
	 }
	 
	 function setEstadoUsuario($estado_usuario)
	 {
		 $this->estado_usuario = $estado_usuario;
	 }
 }
 
 class Administrador extends Usuario
 {
	 //Variable de la clase Administrador
	 private $tipo_usuario = 1001;
	 
	 //Metodos de la clase Administrador
	 function ingresarCliente($id_cliente,$nombre_cliente,$direccion_cliente,$telefono_cliente,$email_cliente,$giro_cliente,$id_comuna)
	 {
		 $link = conexion();
		 $sp = "call ingresarCliente('$id_cliente','$nombre_cliente','$direccion_cliente','$telefono_cliente','$email_cliente',"; 	
		 $sp .= "'$giro_cliente',$id_comuna)";
		 $consulta = mysql_query($sp,$link);
		 close($link);
		 return $consulta;
	 }
	 
	 function listarCliente($nombre_cliente)
	 {
		 $link = conexion();
		 $sp = "call listarCliente('%$nombre_cliente%')";
		 $consulta = mysql_query($sp,$link);
		 close($link);
		 return $consulta;
	 }
	 
	 function modificarCliente($nombre_cliente,$direccion_cliente,$telefono_cliente,$email_cliente,$giro_cliente,$id_comuna)
	 {
		 $link = conexion();
		 $sp = "call modificarCliente('$nombre_cliente','$direccion_cliente','$telefono_cliente','$email_cliente',";
		 $sp .= "$'giro_cliente',$id_comuna)";
		 $consulta = mysql_query($sp,$link);
		 close($link);
		 return $consulta;
	 }
	 
	 function eliminarCliente($nombre_cliente)
	 {
		 $link = conexion();
		 $sp = "call eliminarCliente('$nombre_cliente')";
		 $consulta = mysql_query($sp,$link);
		 close($link);
		 return $consulta;
	 }
	 
	 function ingresarCategoriaProducto($id_categoria,$nombre_categoria)
	 {
		 $link = conexion();
		 $sp = "call ingresarCategoriaProducto($id_categoria,'$nombre_categoria')";
		 $consulta = mysql_query($sp,$link);
		 close($link);
		 return $consulta;
	 }
	 
	 function listarCategoriaProducto($nombre_categoria)
	 {
		 $link = conexion();
		 $sp = "call listarCategoriaProducto('$nombre_categoria')";
		 $consulta = mysql_query($sp,$link);
		 close($link);
		 return $consulta;
	 }
	 
	 function modificarCategoriaProducto($id_categoria,$nombre_categoria,$estado_categoria)
	 {
		 $link = conexion();
		 $sp = "call modificarCategoriaProducto($id_categoria,'$nombre_categoria','$estado_categoria')";
		 $consulta = mysql_query($sp,$link);
		 close($link);
		 return $consulta;
	 }
	 
	 function eliminarCategoriaProducto($nombre_categoria) 
	 {
		 $link = conexion();
		 $sp = "call eliminarCategoriaProducto('$nombre_categoria')";
		 $consulta = mysql_query($sp,$link);
		 close($link);
		 return $consulta;
	 }
	 
	 function ingresarProducto($v_codigo,$v_nombre,$v_precio,$v_stock_r,$v_stock_m,$v_descripcion,$v_categoria)
	 {
		 $link = conexion();
		 $sp = "call ingresarProducto($v_codigo,'$v_nombre',$v_precio,$v_stock_r,$v_stock_m,'$v_descripcion',$v_categoria)";
		 $consulta = mysql_query($sp,$link);
		 close($link);
		 return $consulta;
	 }
	 
	 function listarProducto($nombre_producto)
	 {
		 $link = conexion();
		 $sp = "call listarProducto('$nombre_producto')";
		 $consulta = mysql_query($sp,$link);
		 close($link);
		 return $consulta;
	 }
	 
	 function modificarProducto()
	 {
	 }
	 
	 function eliminarProducto()
	 {
	 }
	 
	 function ingresarUsuario($id_usuario,$pass_usuario,$nombre_usuario,$apat_usuario,$amat_usuario,$tipo_usuario)
	 {
		 $link = conexion();
		 $sp = "call ingresarUsuario('$id_usuario','$pass_usuario','$nombre_usuario','$apat_usuario','$amat_usuario',$tipo_usuario)";
		 $consulta = mysql_query($sp,$link);
		 close($link);
		 return $consulta;
	 }
	 
	 function listarUsuario($id_usuario)
	 {
		 $link = conexion();
		 $sp = "call listarUsuario('$id_usuario')";		 
		 $consulta = mysql_query($sp,$link);
		 close($link);
		 return $consulta;		 
	 }
	 
	 function modificarUsuario($id_usuario,$pass_usuario,$nombre_usuario,$apat_usuario,$amat_usuario,$tipo_usuario)
	 {
		 $link = conexion();
		 $sp = "call modificarUsuario('$id_usuario','$pass_usuario','$nombre_usuario','$apat_usuario','$amat_usuario',$tipo_usuario)";
		 $consulta = mysql_query($sp,$link);
		 close($link);
		 return $consulta;
	 }
	 
	 function eliminarUsuario($id_usuario)
	 {
		 $link = conexion();
		 $sp = "call eliminarUsuario('$id_usuario')";		 
		 $consulta = mysql_query($sp,$link);
		 close($link);
		 return $consulta;
	 }
	 
	 //Get de la clase Administrador
	 function getTipoUsuario()
	 {
		 return $this->tipo_usuario;
	 }
 }
 
 class Vendedor extends Usuario
 {
	 //Variables de la clase Vendedor
	 private $tipo_usuario = 1002;
	 
	 //Metodos de la clase Vendedor
	 function realizarVenta()
	 {
		 
	 }
	 
	 function realizarCobro()
	 {
	 }
	 
	 function cambiarEstadoPago()
	 {
	 }
	 
	 function listarFactura()
	 {
	 }
	 
	 function mostrarReporteVentas()
	 {
	 }
	 
	 //Get de la clase Vendedor
	 function getTipoUsuario()
	 {
		 return $this->tipo_usuario;
	 }
 }
 
 class Bodeguero extends Usuario
 {
	 //Variables de la clase Bodeguero	 
	 private $tipo_usuario = 1003;
	 
	 //Metodos de la clase Bodeguero
	 function consultarProducto()
	 {
		 
	 }
	 
	 function ingresarStockProducto()
	 {
		 
	 }
	 
	 //Get de la clase Bodeguero
	 function getTipoUsuario()
	 {
		 return $this->tipo_usuario;
	 }
 }