<?php
session_start();

require_once('conexion.inc.php');

if(isset($_SESSION['login'])){/*ENTRO EN LA WEB*/} else {header('location:login.php');}	

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Cita Online</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<script src="jquery-ui-1.11.3/external/jquery/jquery.js"></script>
		<script src="jquery-ui-1.11.3/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="jquery-ui-1.11.3/jquery-ui.min.css">
		<script src="jquery-timepicker/jquery.timepicker.min.js"></script>
		<link rel="stylesheet" href="jquery-timepicker/jquery.timepicker.css">
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>

		<script>

			$(document).ready(function(){
				$( '#citadate' ).datepicker({
					minDate: 1,
					beforeShowDay: function (day) { 
           				var day = day.getDay(); 
           				if (day == 0) { 
          			    return [false, "somecssclass"] 
           				} else { 
             		    return [true, "someothercssclass"] 
           				} 
         			} 
				});
			});
			$(function($){
    			$.datepicker.regional['es'] = {
        		closeText: 'Cerrar',
       			prevText: '<Ant',
       			nextText: 'Sig>',
        		currentText: 'Hoy',
        		monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        		monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        		dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        		dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        		weekHeader: 'Sm',
        		dateFormat: 'yy-mm-dd',
        		firstDay: 1,
        		isRTL: false,
        		showMonthAfterYear: false,
        		yearSuffix: ''
    			};
    		$.datepicker.setDefaults($.datepicker.regional['es']);
			});

			$(document).ready(function(){
				$( '#citahora' ).timepicker({
					minTime:'10:30am',
					maxTime:'7:30pm',
					disableTimeRanges: [
        				['2:30pm', '4.31pm']
   					]
				});
			});

		</script>
	</head>
	<body class="no-sidebar">
		<!--CABECERA-->
			<div id="header">
				<div class="container">	
					<!-- LOGO -->
						<h1><a href="#" id="logo">VEIGA DO ULLA</a></h1>
						<h1><?=$prueba?></h1>	
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

		<!-- PANEL USO -->
			<div id="main" class="wrapper style1">
				<div class="container">
					<section>
						<header class="major">
							<h2>Cita Online</h2>
							<span class="byline">Seleccione una fecha y confirme su solicitud</span>
						</header>
						<p>
							<div id='divcita'>
								<form action='ejecutar_cita.php' id='cita' method='POST'>
									<fieldset>
										<label for='cita'>Fecha:</label>
										<input type='text' id='citadate' name='citadate'/>
										<br/>
										<label for='hora'>Hora:</label>
										<input type='text' id='citahora' name='citahora'/>
										<br/>
										<input type='submit' value='Confirmar'/>
									</fieldset>
								</form>
							</div>
						</p>
	
						<br/>
						<a href="logueado.php" class="button alt">Atrás</a>
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