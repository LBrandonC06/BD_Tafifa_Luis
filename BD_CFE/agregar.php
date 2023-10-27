<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Agregar</title>
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {

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
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$resultado = mysqli_query($mysqli,"INSERT INTO tarifa(Id_Medidor,Dueno,Energia,Iva,Fac_Periodo,DAP, Adeudo,Total,usuario_id) VALUES('$Id_Medidor','$Dueno','$Energia', '$Iva','$Fac_Periodo','$DAP', '$Adeudo','$Total','$usuario_id')");
		
		//display success message
		echo "<font color='green'>Datos agregados exitosamente.";
		echo "<br/><a href='mostar.php'>Ver resultado</a>";
	}
}
?>
</body>
</html>
