<html>
<head>
	<title>Registro</title>
</head>

<body>
<a href="index.php">Inicio</a> <br/>
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$nombre = $_POST['nombre'];
	$gmail = $_POST['gmail'];
	$usuario = $_POST['usuario'];
	$contra = $_POST['contra'];

	if($nombre == "" || $gmail == "" || $usuario == "" || $contra == ""){
		echo "Todos los campos deben estar llenos. Uno o varios campos están vacíos.";
		echo "<br/>";
		echo "<a href='register.php'>Regresar</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO usuarios(nombre, correo, usuario, contra) VALUES('$nombre', '$gmail', '$usuario', '$contra')")
			or die("No se ejecuto, CHALE.");
			
		echo "Registro exitoso";
		echo "<br/>";
		echo "<a href='login.php'>Inicio de Secion</a>";
	}
} else {
?>
	<p><font size="+2">Registrar</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Nombre</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr> 
				<td>Correo</td>
				<td><input type="text" name="gmail"></td>
			</tr>			
			<tr> 
				<td>Usuario</td>
				<td><input type="text" name="usuario"></td>
			</tr>
			<tr> 
				<td>Contrasena</td>
				<td><input type="contra" name="contra"></td>
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
