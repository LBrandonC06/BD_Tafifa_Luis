<?php

/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */

$servidorsql = 'localhost';
$databaseName = 'cfe';
$usuarios = 'root';
$contra = '';

$mysqli = mysqli_connect($servidorsql, $usuarios, $contra, $databaseName); 
	
?>
