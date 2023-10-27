<?php session_start(); ?>
<html>
<head>
	<title>Login</title>
</head>

<body>
<a href="index.php">Home</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
	$contra = mysqli_real_escape_string($mysqli, $_POST['contra']);

	if($usuario == "" || $contra == "") {
		echo "Either username or password field is empty.";
		echo "<br/>";
		echo "<a href='login.php'>Go back</a>";
	} else {
		$resultado = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE usuario='$usuario' AND contra='$contra'")
					or die("No se pudo ejecutar la selección query.");
		
		$row = mysqli_fetch_assoc($resultado);
		
		if(is_array($row) && !empty($row)) {
			$ValidarUsuario = $row['usuario'];
			$_SESSION['valid'] = $ValidarUsuario;
			$_SESSION['nombre'] = $row['nombre'];
			$_SESSION['id'] = $row['id'];
		} else {
			echo "usuario o contraseña invalido.";
			echo "<br/>";
			echo "<a href='login.php'>Regresar</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<p><font size="+2">Login</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">usuario</td>
				<td><input type="text" name="usuario"></td>
			</tr>
			<tr> 
				<td>contrasena</td>
				<td><input type="password" name="contra"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
