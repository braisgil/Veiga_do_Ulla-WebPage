<?php
session_start();
//INCLUDES
require_once('conexion.inc.php');
require_once('login.inc.php');
//require_once('desconexion.inc.php');

//COMPROBACION DE LOS USUARIOS
if (isset($_POST['login']) && isset($_POST['password'])){
	//CONSULTA DE LOGIN
	$consulta = "SELECT * FROM usuario WHERE login LIKE '".$_POST['login']."' AND password LIKE md5('".$_POST['password']."')";
	$resultado = @mysql_query($consulta);
		//VALIDACION DE USUARIO
		if ($fila = @mysql_fetch_array($resultado)==NULL){
			//NO EXISTE
		} else {
			//SI EXISTE
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['password'] = $_POST['password'];
			$login = $_SESSION['login'];
			$password = $_SESSION['password'];
			header('location:logueado.php');
			//echo $login;
			//echo $_SESSION;
		}
};


?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Inicia Sesion</title>
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
					<!-- MENU NAV -->
						<nav id="nav">
							<ul>
								<li><a href="index.php">Inicio</a></li>
								<li><a href="nosotros.php">¿Quiénes somos?</a></li>
								<li><a href="requisitos.php">Requisitos</a></li>
							</ul>
						</nav>
					<!-- PRESENTACION BANNER -->
						<div id="banner">
							<div class="container">
								<section>
									<header class="major">
										<h2>Residencia canina - Veiga do Ulla</h2>
										<span class="byline">Visítenos sin compromiso y descubra porque nuestros clientes están satisfechos y sus mascotas contentas y con ganas de repetir.</span>
									</header>
									<a href="#" class="button alt">Regístrate</a>
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
							<h2>Inicia Sesion</h2>
							<span class="byline">Inicia sesion para pedir tu cita online a cualquier hora.</span>
						</header>
						<p>
							<div id='divlogin'>
								<form action='' id='login' method='post'>
								<fieldset>
									<label for='login'>Usuario</label>
									<input type='text' name='login' id='login'/>
									<label for='password'>Contraseña</label>
									<input type='password' name='password' id='password'/>
									<br/>
									<input type='submit' value='Identifícate'/>
								</fieldset>
							</form>
							</div>
						</p>
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