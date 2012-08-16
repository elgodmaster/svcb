<?php
	include("UserFactory.php");
	include("User.php");
	include("Test.php");
?>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="index.php" method="post">
		<table>
			<tr>
				<td>Nombre:</td>
				<td><input type="text" name="txtNombre" /></td>
			</tr>
			<tr>
				<td>Tipo:</td>
				<td>
					<select name="ddlCargo">
						<option value="guest">GuestUser</option>
						<option value="customer">CustomerUser</option>
						<option value="admin">AdminUser</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><input type="submit" value="Enviar"></td>
			</tr>
		</table>
	</form>
	<br/>
	<br/>
	<?php
		if (isset($_REQUEST["txtNombre"]))
		{
			//$users = array($_POST["txtNombre"]=>$_POST["ddlCargo"]);
			
			$ewa = UserFactory::Create($_POST["ddlCargo"]);
					
			//echo $ewa->hasDeletePermission();
			
			Test::displayRequirements($ewa);
			//Test::displayPermissions($ewa);
		}
	?>
</body>
</html>