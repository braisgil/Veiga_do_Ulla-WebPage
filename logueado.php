<?php
session_start();

require_once('conexion.inc.php');

if(isset($_SESSION['login'])){

$saludo = "<h2>Hola ".$_SESSION['login']."</h2>";

$consulta_datos = "SELECT * FROM usuario WHERE login LIKE '".$_SESSION['login']."'";
$resultado_datos = @mysql_query($consulta_datos);
	if (($resultado_datos != null) && (mysql_num_rows($resultado_datos)>0)) {
		$datos = "<h2>Datos del Perro</h2>
				 <ul>
					<li>";

		while(($fila = mysql_fetch_assoc($resultado_datos))!=null) {
			$nombre        =	$fila['nombre_perro'];
			$nacim_perro   =	$fila['nacim_perro'];
			$raza          =    $fila['raza'];
			$tratamientos  =    $fila['tratamientos'];
			$foto          =    $fila['foto'];

			$datos.="<strong>Nombre: </strong>$nombre</li>
					 <li><strong>Foto: </strong><br/><img src='images/".$foto.".jpg'/>
					 <li><strong>Fecha de Nacimiento: </strong>$nacim_perro</li>
					 <li><strong>Raza: </strong>$raza</li> 
					 <li><strong>Tratamientos: </strong><br/>$tratamientos</li>";
		}

	$datos.="</ul>";
	}

$consulta_citas = "SELECT * FROM cita WHERE login LIKE '".$_SESSION['login']."'";
$resultado_citas = @mysql_query($consulta_citas);
	if (($resultado_citas != null) && (mysql_num_rows($resultado_citas)>0)) {
		$datos_citas = "<h2>Historial de citas</h2>
				 <ul>
					<li><strong>Citas Antiguas: </strong>";
		$hoy = date("Y-m-d");
		while(($fila_citas = mysql_fetch_assoc($resultado_citas))!=null) {
			$fecha        =	$fila_citas['fecha'];
			$hora         = $fila_citas['hora'];


			if ($fecha>$hoy){
				$fecha_futura = $fecha;
				$hora_futura = $hora;
			} else if ($fecha<$hoy){
				$fecha_pasada = $fecha;
				$hora_pasada = $hora;
			} else {
				//$cita_hoy = "Hoy: ".$fecha." tienes cita";
			}

			$datos_citas.="$fecha_pasada     $hora_pasada</li>";
		}
	$datos_citas.="<li><strong>Próxima cita: </strong><br/>$fecha_futura    $hora_futura</li>
	</ul>";
}

}else{
	header('location:login.php');
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Logueado</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
	</head>
	<body class="no-sidebar">
		<!--CABECERA-->
			<div id="header">
				<div class="container">	
					<!-- LOGO -->
						<h1><a href="#" id="logo">VEIGA DO ULLA</a></h1>	
					<!-- PRESENTACION BANNER -->
						<div id="banner">
							<div class="container">
								<section>
									<header class="major">
										<h2>Residencia canina - Veiga do Ulla</h2>
										<span class="byline">Visítenos sin compromiso y descubra porque nuestros clientes están satisfechos y sus mascotas contentas y con ganas de repetir.</span>
									</header>
									<a href="logout.php" class="button alt">Salir</a>
								</section>			
							</div>
						</div>
				</div>
			</div>

		<!-- Main -->
			<div id="main" class="wrapper style1">
				<div class="container">
					<section>
						<header class="major">
							<h2><?=$saludo?></h2>
							<span class="byline">Desde esta página podrás ver los datos de seguimiento de tu mascota y pedir tu cita online.</span>
						</header>
						<p><?=$datos?></p>
						<p><?=$datos_citas?></p>
						<a href="cita.php" class="button alt">Pedir cita online</a>
						<br/>
						<br/>
						<a href="logout.php" class="button alt">Salir</a>
					</section>
				</div>
			</div>

		<!-- FOOTER CONTACTO -->
			<div id="footer">
				<div class="container">
						<div class="row">
							<div class="8u">
								<section>
									<header class="major">
										<h2>Tarifas y Horario:</h2>
										<span class="byline">Tarifas:</br>Precio por día sin comida -> 9 €<br/>Precio por día con comida -> 11 €</br>Para estancias superiores a 30 días, tratamientos o curas y servicio a domicilio consultar.<br/><br/>Horario:<br/>Lunes a Viernes -> 10:30 a 13:30 y 17:00 a 20:00 horas.<br/>Sábados -> 10:30 a 13:30 horas.<br/>Las visitas,  entregas y recogidas de mascotas se haran previa cita.
										</span>
									</header>
								</section>
							</div>
							<div class="4u">
								<section>
									<header class="major">
										<h2>Contacto</h2>
										<span class="byline">Para cualquier consulta contacte con nosotros en las siguientes vías.</span>
									</header>
									<ul class="contact">
										<li>
											<span class="address">Dirección</span>
											<span>Neira de Abaixo, 15<br />San Mamede de Ribadulla 15885, Vedra(A Coruña) España</span>
										</li>
										<li>
											<span class="mail">Correo</span>
											<span><a href="#">residenciaveigadoulla@gmail.com</a></span>
										</li>
										<li>
											<span class="phone">Teléfono</span>
											<span>639823070</span>
										</li>
									</ul>	
								</section>
							</div>
						</div>
				</div>
			</div>

	</body>
</html>