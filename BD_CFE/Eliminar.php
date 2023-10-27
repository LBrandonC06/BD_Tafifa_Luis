<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include("connection.php");

//getting id of the data from url
$Id_Medidor = $_GET['id'];

//deleting the row from table
$resultado=mysqli_query($mysqli, "DELETE FROM tarifa WHERE Id_Medidor=$Id_Medidor");

//redirecting to the display page (view.php in our case)
header("Location:mostar.php");
?>

