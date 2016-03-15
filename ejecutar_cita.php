<?php
session_start();
require_once('conexion.inc.php');
if(isset($_SESSION['login'])){
	$login_cita = $_SESSION['login'];
	$fecha_cita = $_POST['citadate'];
	$hora_cita  = $_POST['citahora'];
	$consulta_disponible = "SELECT * FROM cita WHERE fecha LIKE '$fecha_cita' AND hora LIKE '$hora_cita'";
	$resultado_disponible = @mysql_query($consulta_disponible);
	$disponible = mysql_num_rows($resultado_disponible);
	if ($disponible>0){
		header('location:nodisponible.php');
	} else {
		$consulta_citas = "INSERT INTO cita (login, fecha, hora) values ('$login_cita', '$fecha_cita', '$hora_cita')";
		$resultado_citas = @mysql_query($consulta_citas);
		header('location:logueado_cita.php');
	}
} else {
	header('location:login.php');
}

?>