<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
	$Id_Medidor = $_POST['Id_Medidor'];
	$Dueno = $_POST['Dueno'];
	$Energia = $_POST['Energia'];
	$Iva = $_POST['Iva'];
	$Fac_Periodo = $_POST['Fac_Periodo'];
	$DAP = $_POST['DAP'];
	$Adeudo = $_POST['Adeudo'];
	$Total  = $_POST['Total'];
	$usuario_id=$_SESSION['id'];
	
	// checking empty fields
	
	// checking empty fields
	if(empty($Id_Medidor) || empty($Dueno) || empty($Energia)|| empty($Iva)|| empty($Fac_Periodo)|| empty($DAP)|| empty($Adeudo)|| empty($Total)) {
				
		if(empty($Id_Medidor)) {
			echo "<font color='red'>El campo de Id_Medidor está vacío.</font><br/>";
		}
		if(empty($Dueno)) {
			echo "<font color='red'>El campo de Dueno está vacío.</font><br/>";
		}
		if(empty($Energia)) {
			echo "<font color='red'>El campo de Energia está vacío.</font><br/>";
		}		
		if(empty($Iva)) {
			echo "<font color='red'>El campo de Iva está vacío.</font><br/>";
		}
		if(empty($Fac_Periodo)) {
			echo "<font color='red'>El campo de Fac_Periodo está vacío.</font><br/>";
		}
		if(empty($DAP)) {
			echo "<font color='red'>El campo de DAP está vacío.</font><br/>";
		}		
		if(empty($Adeudo)) {
			echo "<font color='red'>El campo de Adeudo está vacío.</font><br/>";
		}
		if(empty($Total)) {
			echo "<font color='red'>El campo de Total está vacío.</font><br/>";
		}
		
			//link to the previous page
			echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		} else {	
			//updating the table
			$result = mysqli_query($mysqli, "UPDATE tarifa SET Id_Medidor='$Id_Medidor', Dueno='$Dueno', Energia='$Energia', Fac_Periodo='$Fac_Periodo', DAP='$DAP', Adeudo='$Adeudo', Total='$Total' WHERE Id_Medidor=$Id_Medidor");
			
			//redirectig to the display page. In our case, it is view.php
			header("Location: view.php");
		}
}
?>
<?php
//getting id from url
$ids = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM tarifa WHERE Id_Medidor=$ids");

while($res = mysqli_fetch_array($result))
{
	$Id_Medidor = $res['Id_Medidor'];
	$Dueno = $res['Dueno'];
	$Energia = $res['Energia'];
	$Iva = $res['Iva'];
	$Fac_Periodo =$res['Fac_Periodo'];
	$DAP =$res['DAP'];
	$Adeudo = $res['Adeudo'];
	$Total  = $res['Total'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="view.php">Ver Productos</a> | <a href="logout.php">Cerrar Sesion</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
		<tr> 
				<td>Id_Medidor</td>
				<td><input type="text" name="Id_Medidor" value="<?php echo $Id_Medidor;?>"></td>
			</tr>
			<tr> 
				<td>Dueno</td>
				<td><input type="text" name="Dueno" value="<?php echo $Dueno;?>"></td>
			</tr>
			<tr> 
				<td>Energia</td>
				<td><input type="text" name="Energia" value="<?php echo $Energia;?>"></td>
			</tr>
			<tr> 
				<td>Iva</td>
				<td><input type="text" name="Iva" value="<?php echo $Iva;?>"></td>
			</tr>			
			<tr> 
				<td>Fac_Periodo</td>
				<td><input type="text" name="Fac_Periodo" value="<?php echo $Fac_Periodo;?>"></td>
			</tr>
			<tr> 
				<td>DAP</td>
				<td><input type="text" name="DAP" value="<?php echo $DAP;?>"></td>
			</tr>
			<tr> 
				<td>Adeudo</td>
				<td><input type="text" name="Adeudo" value="<?php echo $Adeudo;?>"></td>
			</tr>
			<tr> 
				<td>Total</td>
				<td><input type="text" name="Total" value="<?php echo $Total;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
