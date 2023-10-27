<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Bienvenido a mi pagina!
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM usuarios");
	?>
				
		<?php echo "HOLA '".$_SESSION['nombre'] ?> '! <a href='logout.php'>Cerrar sesión</a><br/>
		<br/>
		Bienvenido<a href='mostar.php'>Ver y agregar productos</a>
		<br/><br/>
	<?php	
	} else {
		echo "Usted debe estar conectado para ver esta página.<br/><br/>";
		echo "<a href='login.php'>Login</a> | <a href='registrar.php'>Register</a>";
	}
	?>
	<div id="footer">
	Creado por <!-- <a href="http://blog.chapagain.com.np" title="Mukesh Chapagain">-->LUIS BRANDON CRISTOBAL RAMIREZ 5J</a>
	</div>
</body>
</html>
