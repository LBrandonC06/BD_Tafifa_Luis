<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$resultado = mysqli_query($mysqli, "SELECT * FROM tarifa WHERE usuario_id=".$_SESSION['id']." ORDER BY usuario_id DESC");
?>

<html>
<head>
	<title>Paguina de Inicio</title>
</head>

<body>
	<a href="index.php">INICIO</a> | <a href="agregar.html">CREAR NUEVO PRODUCTO</a> | <a href="logout.php">Cerrar sesión</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Id_Medido</td>
			<td>Dueno</td>
			<td>Energia</td>
			<td>Iva</td>
			<td>Fac_Periodo</td>
			<td>DAP</td>
			<td>Adeudo</td>
			<td>Total</td>
			<td>Actualizar</td>
			<td>usuario_id</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($resultado)) {		
			echo "<tr>";
			echo "<td>".$res['Id_Medidor']."</td>";
			echo "<td>".$res['Dueno']."</td>";
			echo "<td>".$res['Energia']."</td>";
			echo "<td>".$res['Iva']."</td>";
			echo "<td>".$res['Fac_Periodo']."</td>";
			echo "<td>".$res['DAP']."</td>";
			echo "<td>".$res['Adeudo']."</td>";
			echo "<td>".$res['Total']."</td>";
			echo "<td><a href=\"editar.php?id=$res[Id_Medidor]\">Editar</a> | <a href=\"Eliminar.php?id=$res[Id_Medidor]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
			echo "<td>".$res['usuario_id']."</td>";
		}
		?>
	</table>	
</body>
</html>
