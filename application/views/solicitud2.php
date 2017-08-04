<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Lubricar</title>	

		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Porto - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo assets_url(); ?>public/img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="<?php echo assets_url(); ?>public/img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/css/theme.css">
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/css/theme-elements.css">
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/css/theme-blog.css">
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/css/theme-shop.css">
		
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/vendor/bootstrap/css/bootstrap.min.css">
		<link href="<?php echo assets_url('css/select2.css');?>" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/vendor/animate/animate.min.css">
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/vendor/magnific-popup/magnific-popup.min.css">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/vendor/rs-plugin/css/settings.css">
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/vendor/rs-plugin/css/layers.css">
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/vendor/rs-plugin/css/navigation.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/css/skins/skin-medical.css"> 

		<!-- Demo CSS -->
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/css/demos/demo-medical.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/css/custom.css">
		
		<!-- Sweet Alert -->
		<link href="<?php echo assets_url('css/plugins/sweetalert/sweetalert.css');?>" rel="stylesheet">

		<!-- Admin Extension Specific Page Vendor CSS -->
		<link rel="stylesheet" href="http://preview.oklerthemes.com/porto-admin/edge/assets/vendor/pnotify/pnotify.custom.css" />

		<!-- Admin Extension CSS -->
		<link rel="stylesheet" href="http://preview.oklerthemes.com/porto-admin/edge/assets/stylesheets/theme-admin-extension.css">

		<!-- Admin Extension Skin CSS -->
		<link rel="stylesheet" href="http://preview.oklerthemes.com/porto-admin/edge/assets/stylesheets/skins/extension.css">


		<!-- Head Libs -->
		<script src="<?php echo assets_url(); ?>public/vendor/modernizr/modernizr.min.js"></script>
		
		<!-- google reCAPTCHA -->
		<script src='https://www.google.com/recaptcha/api.js'></script>

	</head>
	<body>

		<div class="body">
			<header id="header" class="header-narrow" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 35, 'stickySetTop': '-35px', 'stickyChangeLogo': false}">
				<div class="header-body">
					<div class="header-top header-top header-top-style-3 header-top-custom">
						<div class="container">
							<nav class="header-nav-top pull-right">
								<ul class="nav nav-pills">
									<li class="hidden-xs" id="li_cerrar">
										<span class="ws-nowrap"><i class="icon-logout icons"></i><a href="#" id="cerrar">Salir</a></span>
									</li>
									<li class="hidden-xs" id="li_perfil">
										<span class="ws-nowrap">
										<i class="icon-user icons"></i> 
										<a href="public_perfil" id="perfil"><span id="span_perfil"></span></a>
										</span>
									</li>
									<li class="hidden-xs" id="li_inicio">
										<span class="ws-nowrap"><i class="icon-login icons"></i> <a href="#" id="inicio">Iniciar Sesión</a></span>
									</li>
									<li class="hidden-xs">
										<span class="ws-nowrap"><i class="icon-envelope-open icons"></i> <a class="text-decoration-none" href="mailto:contacto@lubricardelivery.com">contacto@lubricardelivery.com</a></span>
									</li>
									<li>
										<span class="ws-nowrap"><i class="icon-call-out icons"></i></i> (800) 123-4567</span>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column">
								<div class="header-logo">
									<a href="public">
										<img alt="Porto" width="143" height="40" src="<?php echo assets_url(); ?>public/img/demos/medical/logo-medical.png">
									</a>
								</div>
							</div>
							<div class="header-column">
								<div class="header-row">
									<div class="header-nav pt-xs">
										<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
											<i class="fa fa-bars"></i>
										</button>
										<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
											<nav>
												<ul class="nav nav-pills" id="mainNav">
													<li class="dropdown-full-color dropdown-secondary">
														<a href="public">
															Inicio
														</a>
													</li>
													<li class="dropdown-full-color dropdown-secondary">
														<a href="somos">
															Quienes Somos
														</a>
													</li>
													<li class="dropdown dropdown-full-color dropdown-secondary">
														<!--<a class="dropdown-toggle" href="servicios">-->
														<a href="servicios">
															Servicios
														</a>
														<!--<ul class="dropdown-menu">
															<li><a href="services-detail.html">Cardiology</a></li>
															<li><a href="services-detail.html">Gastroenterology</a></li>
															<li><a href="services-detail.html">Pulmonology</a></li>
															<li><a href="services-detail.html">Dental</a></li>
															<li><a href="services-detail.html">Gynecology</a></li>
															<li><a href="services-detail.html">Hepatology</a></li>
														</ul>-->
													</li>
													<li class="activedropdown-full-color dropdown-secondary">
														<a href="solicitud">
															Solicitud de Servicios
														</a>
													</li>
													<!--<li class="dropdown-full-color dropdown-secondary">
														<a href="noticias">
															Noticias
														</a>
													</li>-->
													<li class="dropdown-full-color dropdown-secondary">
														<a href="contacto">
															Contactos
														</a>
													</li>
												</ul>
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

			<div role="main" class="main">
				
			<section class="page-header page-header-color page-header-primary page-header-float-breadcrumb">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="mt-xs">Solicitud de Servicios <span>Nos contactaremos con usted tan pronto como recibamos la solicitud</span></h1>
							<ul class="breadcrumb breadcrumb-valign-mid">
								<li><a href="public">Inicio</a></li>
								<li class="active">Solicitud de Servicios</li>
							</ul>
						</div>
					</div>
				</div>
			</section>

			<div class="container">
				<?php 
				if(isset($this->session->userdata['logged_in_public'])){
				?>
				<p class="lead font-weight-normal mb-xlg pb-xlg">Lubricar Delivery, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
				<section class="panel panel-admin form-wizard" id="w4">
					
					<div class="panel-body">
						<div class="wizard-progress wizard-progress-lg">
							<div class="steps-progress">
								<div class="progress-indicator" style="width: 0%;"></div>
							</div>
							<ul class="wizard-steps">
								<li class="active">
									<a href="#w4-account" data-toggle="tab"><span>1</span>Datos Personales:</a>
								</li>
								<li>
									<a href="#w4-profile" data-toggle="tab"><span>2</span>Vehiculo</a>
								</li>
								<li>
									<a href="#w4-billing" data-toggle="tab"><span>3</span>Dirección</a>
								</li>
								<li>
									<a href="#w4-confirm" data-toggle="tab"><span>4</span>Confirmación</a>
								</li>
							</ul>
						</div>
		
						<form class="form-horizontal" id="form_solicitud" novalidate="novalidate">
							<div class="tab-content">
								<div id="w4-account" class="tab-pane active">
									<div class="form-group">
										<label class="col-sm-3 control-label" for="w4-username">Nombre:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="username" id="w4-username" value="<?php echo $this->session->userdata['logged_in_public']['name']." ".$this->session->userdata['logged_in_public']['lastname'];?>" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="w4-username">Correo Electronico:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="username" id="w4-username" value="<?php echo $this->session->userdata['logged_in_public']['username'];?>" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="w4-username">Teléfono</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="username" id="w4-username" value="<?php echo $this->session->userdata['logged_in_public']['phone'];?>" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
											<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $this->session->userdata['logged_in_public']['id']; ?>">
										</div>
									</div>
								</div>
								<div id="w4-profile" class="tab-pane">
									<div class="form-group">
										<label class="col-sm-3 control-label" for="w4-vehicle">Vehiculo *</label>
										<div class="input-group mar-btm col-sm-9">
											<span class="input-group-addon"><i class="fa fa-car fa-lg"></i></span>
											<select style="width: 100%" name="vehiculo" id="vehiculo" class="form-control">
												<option selected="" value="0">Seleccione</option>
												<?php
												foreach ($vehiculos as $vehiculo) {
													?>
													<option value="<?php echo $vehiculo->id; ?>"><?php echo $vehiculo->license_plate." - ".$vehiculo->trademark; ?></option>
													<?php
												}
												?>
											</select>
											<span style="cursor: pointer" class="add_vehiculo input-group-addon" title="Nuevo vehículo"><span class="fa fa-plus" style="color: green"></span></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="w4-vehicle">Franquicia *</label>
										<div class="input-group mar-btm col-sm-9">
											<span class="input-group-addon"><i class="fa fa-building fa-lg"></i></span>
											<select style="width: 100%" name="franquicia" id="franquicia" class="form-control">
												<option selected="" value="0">Seleccione</option>
												<?php
												foreach ($franquicias as $franquicia) {
													?>
													<option value="<?php echo $franquicia->id; ?>"><?php echo $franquicia->name; ?></option>
													<?php
												}
												?>
											</select>
											<!--<span style="cursor: pointer" class="add_vehiculo input-group-addon" title="Nuevo vehículo"><span class="fa fa-plus" style="color: green"></span></span>-->
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="w4-vehicle">Servicios *</label>
										<div class="input-group mar-btm col-sm-9">
											<span class="input-group-addon"><i class="fa fa-gears fa-lg"></i></span>
											<select style="width: 100%" id="services_ids" class="form-control" multiple="multiple">
												<?php
												foreach ($servicios as $servicio) {
													?>
													<option value="<?php echo $servicio->id; ?>"><?php echo $servicio->name; ?></option>
													<?php
												}
												?>
											</select>
											<input type="hidden" name="sub_total" id="sub_total" value="0">
											<input type="hidden" name="impuesto" id="impuesto" value="0">
											<input type="hidden" name="total" id="total" value="0">
											<!--<span style="cursor: pointer" class="add_services input-group-addon"><span class="fa fa-plus" style="color: green"></span></span>-->
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="w4-first-name">Marca (P.ej. Fiat)</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="w4-marca" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="w4-last-name">Modelo (P.ej ej. Vectra)</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="w4-modelo" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="w4-last-name">Color (Ej: Gasolina)</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="w4-color" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="w4-last-name">Año / modelo (Ej: Año 2009, 2010)</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="w4-anyo" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
										</div>
									</div>
								</div>
								<div id="w4-billing" class="tab-pane">
									<div class="form-group">
										<label class="col-sm-3 control-label" for="w4-vehicle">Dirección *</label>
										<div class="input-group mar-btm col-sm-9">
											<span class="input-group-addon"><i class="fa fa-address-card fa-lg"></i></span>
											<select style="width: 100%" name="address" id="address" class="form-control">
												<option selected="" value="0">Seleccione</option>
												<?php
												foreach ($direcciones as $direccion) {
													?>
													<option value="<?php echo $direccion->id; ?>"><?php echo $direccion->city." - ".$direccion->address_1; ?></option>
													<?php
												}
												?>
											</select>
											<span style="cursor: pointer" class="add_direccion input-group-addon"><span class="fa fa-plus" style="color: green"></span></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="w4-cc">Ciudad (Ej: Panama City)</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="w4-ciudad" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="w4-cc">Teléfono</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="w4-telefono" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="w4-cc">Móvil</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="w4-movil" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="w4-cc">Descripción</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="w4-descripcion" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="w4-cc">Código Postal (Ej: 12020-050)</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="w4-zip" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
										</div>
									</div>
								</div>
								<div id="w4-confirm" class="tab-pane">
									<div class="form-group">
										<label class="col-sm-3 control-label" for="w4-email">Fecha y Confirmación</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="fecha" id="w4-fecha"  aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-3"></div>
										<div class="col-sm-9">
											<div>
												<input type="checkbox" name="terms" id="w4-terms">
												<input type="hidden" id="terms_accept">
												<label for="w4-terms">Estoy de acuerdo con los términos de servicio.</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					
					<div class="panel-footer">
						<ul class="pager">
							<li class="previous disabled">
								<a><i class="fa fa-angle-left"></i> Anterior</a>
							</li>
							<!--<li id="finalizar" class="finish hidden pull-right">-->
							<li id="finalizar" class="finish hidden pull-right">
								<a>Finalizar</a>
							</li>
							<li class="next">
								<a>Siguiente <i class="fa fa-angle-right"></i></a>
							</li>
						</ul>
					</div>
					
				</section>
				<?php	
				}else{
				?>
				<p class="lead font-weight-normal mb-xlg pb-xlg">
					Antes de realizar cualquier solicitud debe iniciar sesión.
					<span class="ws-nowrap"><i class="icon-login icons"></i> <a class="solicitar" style="cursor:pointer;">Iniciar Sesión</a></span>
				</p>
				<?php
				}
				?>

			</div>

			<footer id="footer" class="m-none">
				<div class="container">
					<div class="row">
						
						<div class="col-md-3">
							<h4 class="mb-xlg">Horario de Atención</h4>
							<div class="info custom-info">
								<span>Lun-Vie</span>
								<span>8:30 am to 5:00 pm</span>
							</div>
							<div class="info custom-info">
								<span>Sabados</span>
								<span>9:30 am to 1:00 pm</span>
							</div>
	
						</div>
						<div class="col-md-3 col-md-offset-1">
							<div class="contact-details">
								<h4 class="mb-xlg">Contáctenos</h4>
								<a class="text-decoration-none" href="tel:1234567890">
									<strong class="font-weight-light">(800)123-4567</strong>
								</a>
							</div>
						</div>
						<div class="col-md-2">
							<h4 class="mb-xlg">Redes Sociales</h4>
							<ul class="social-icons">
								<li class="social-icons-facebook">
									<a href="http://www.facebook.com/" target="_blank" title="Facebook">
										<i class="fa fa-facebook"></i>
									</a>
								</li>
								<li class="social-icons-twitter">
									<a href="http://www.twitter.com/" target="_blank" title="Twitter">
										<i class="fa fa-twitter"></i>
									</a>
								</li>
								<li class="social-icons-linkedin">
									<a href="http://www.linkedin.com/" target="_blank" title="Linkedin">
										<i class="fa fa-linkedin"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="footer-copyright pt-md pb-md">
					<div class="container">
						<div class="row">
							<div class="col-md-12 center m-none">
								<p>© Copyright 2017. All Rights Reserved.</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		
		<!--Modal de registro/inicio de sesión-->
		<div class="modal inmodal fade" id="modal_cliente" tabindex="-1" role="dialog"  aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close cerrar_modal" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h5 class="modal-title text-center"><span id="titulo"></span></h5>
					</div>
					<div class="modal-body" >
						<form id="form_client" action="" method="post" class="form">
							<div class="form-group">
								<label class="username">Usuario *</label>
								<input id="username" name="username" class="form-control" type="text" maxlength="100">
								<label class="password">Contraseña *</label>
								<input id="password" name="password" class="form-control" type="password" maxlength="20" >
								<input id="location" name="location" class="form-control" type="hidden" maxlength="20" >
								<label class="confirm">Repetir Contraseña *</label>
								<input id="confirm" name="confirm" class="form-control" type="password" maxlength="20" >
								<label class="name">Nombre *</label>
								<input id="name" name="name" class="form-control" type="text" maxlength="150">
								<label class="lastname">Apellido *</label>
								<input id="lastname" name="lastname" class="form-control" type="text" maxlength="20">
								<label class="phone">Telefono 1 *</label>
								<input id="phone" name="phone" class="form-control" type="text" maxlength="20">
								<label class="cell_phone">Teléfono 2</label>
								<input id="cell_phone" name="cell_phone" class="form-control" type="text" maxlength="20">
								<input id="status" name="status" class="form-control" type="hidden" value="0" maxlength="20">
								<input id="base_url" type="hidden" value="<?php echo base_url(); ?>"/>
								<br>
								<div id="recapcha">
									<div class="g-recaptcha" data-sitekey="6LewpiQUAAAAABg-KyhrB7y71mygvZGYfc5Zp8l2"></div>
								</div>						
							</div>
						</form>
						<button id="iniciar" type="button" class="btn btn-primary full-width m-b text-center">Iniciar</button>
						<button class="btn btn-primary full-width m-b text-center" type="button" id="add_client">Registrar</button>
					</div>
					<div class="modal-footer text-center" >
					</div>
					<p class="text-muted text-center" id="question_account"><small>¿No tiene una cuenta?</small></p>
					<a class="btn btn-sm btn-white btn-block" id="reg_client" href="#">Crea una cuenta</a>
					<a class="btn btn-sm btn-white btn-block" id="hidden_reg_client" href="#">Ya poseo una cuenta</a>
				</div>
			</div>
		</div>
		<!--Modal de registro/inicio de sesión-->
		
		<!--Modal de registro de direcciones-->
		<div class="modal inmodal fade" id="modal_direccion" tabindex="-1" role="dialog"  aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close cerrar_modal" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h5 class="modal-title"><span id="titulo"></span> Dirección</h5>
					</div>
					<div class="modal-body" >
						<form id="form_direccion" action="" method="post" class="form">
							<div class="form-group">
								<label >Ciudad *</label>
								<input id="city" name="city" class="form-control" type="text" maxlength="100">
								<label>Código Postal *</label>
								<input id="zip" name="zip" class="form-control" type="text" maxlength="20" >
								<label>Descripción</label>
								<input id="description" name="description" class="form-control" type="text" maxlength="50" >
								<label>Dirección 1 *</label>
								<input id="address_1" name="address_1" class="form-control" type="text" maxlength="150" >
								<label >Dirección 2</label>
								<input id="address_2" name="address_2" class="form-control" type="text" maxlength="150">
								<label>Teléfono 1 *</label>
								<input id="phone_1" name="phone_1" class="form-control" type="text" maxlength="20">
								<label>Teléfono 2</label>
								<input id="cell_phone_1" name="cell_phone" class="form-control" type="text" maxlength="20">
								<input id="id_direccion" name="id_direccion" class="form-control" type="hidden" >
								<input id="accion"  class="form-control" type="hidden" >
								<input id="posicion"  class="form-control" type="hidden" >
							</div>
						</form>
					</div>
					<div class="modal-footer" >
						<button class="btn btn-primary" type="button" id="add_address">
							Aceptar
						</button>
					</div>
				</div>
			</div>
		</div>
		<!--Modal de registro de direcciones-->
		
		<!--Modal de registro de vehículos-->
		<div class="modal inmodal fade" id="modal_vehiculo" tabindex="-1" role="dialog"  aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close cerrar_modal" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title"><span id="titulo"></span> Vehiculo</h4>
					</div>
					<div class="modal-body">
						<form id="form_vehiculo" action="" method="post" class="form">
							<div class="form-group">
								<label >Marca *</label>
								<input id="trademark" name="trademark" class="form-control" type="text" maxlength="50">
								<label>Modelo *</label>
								<input id="model" name="model" class="form-control" type="text" maxlength="50">
								<label >Color *</label>
								<input id="color" name="color" class="form-control" type="text" maxlength="50">
								<label >Año *</label>
								<input type="text" class="form-control"  id="year" name="year" maxlength="4">
								<label >Placa *</label>
								<input id="license_plate" name="license_plate" class="form-control" type="text" maxlength="50">
								<input id="id_vehiculo" name="id_vehiculo" class="form-control" type="hidden" >
								<input id="accion2" class="form-control" type="hidden" >
								<input id="posicion2" class="form-control" type="hidden" >
							</div>
						</form>
					</div>
					<div class="modal-footer" >
						<button class="btn btn-primary" type="button" id="add_vehicle">
							Aceptar
						</button>
					</div>
				</div>
			</div>
		</div>
		<!--Modal de registro de vehículos-->

		<!-- Vendor -->
		<script src="<?php echo assets_url(); ?>public/vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo assets_url(); ?>public/vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="<?php echo assets_url(); ?>public/vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="<?php echo assets_url(); ?>public/vendor/jquery-cookie/jquery-cookie.min.js"></script>
		<script src="<?php echo assets_url(); ?>public/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo assets_url(); ?>public/vendor/common/common.min.js"></script>
		<script src="<?php echo assets_url(); ?>public/vendor/jquery.validation/jquery.validation.min.js"></script>
		<script src="<?php echo assets_url(); ?>public/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
		<script src="<?php echo assets_url(); ?>public/vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="<?php echo assets_url(); ?>public/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="<?php echo assets_url(); ?>public/vendor/isotope/jquery.isotope.min.js"></script>
		<script src="<?php echo assets_url(); ?>public/vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="<?php echo assets_url(); ?>public/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="<?php echo assets_url(); ?>public/vendor/vide/vide.min.js"></script>
		<link href="<?php echo assets_url('css/plugins/datapicker/datepicker3.css');?>" rel="stylesheet">
		<script src="<?php echo assets_url('js/select2.js');?>"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo assets_url(); ?>public/js/theme.js"></script>
		
		<!-- Current Page Vendor and Views -->
		<script src="<?php echo assets_url(); ?>public/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="<?php echo assets_url(); ?>public/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

		<!-- Current Page Vendor and Views -->
		<script src="<?php echo assets_url(); ?>public/js/views/view.contact.js"></script>

		<!-- Demo -->
		<script src="<?php echo assets_url(); ?>public/js/demos/demo-medical.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo assets_url(); ?>public/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo assets_url(); ?>public/js/theme.init.js"></script>
		
		<!-- Data picker -->
		<script src="<?php echo assets_url('js/plugins/datapicker/bootstrap-datepicker.js');?>"></script>
		
		<!-- Sweet alert -->
		<script src="<?php echo assets_url('js/plugins/sweetalert/sweetalert.min.js');?>"></script>
		
		<!-- Validate only numeric data -->
		<script src="<?php echo assets_url('js/jquery.numeric.js');?>"></script>

		<!-- Registro/Inicio de Sesión -->
		<script src="<?php echo assets_url(); ?>script/sesion.js"></script>

		<!-- Admin Extension Specific Page Vendor -->
		<script src="http://preview.oklerthemes.com/porto-admin/edge/assets/vendor/jquery-validation/jquery.validate.js"></script>
		<script src="http://preview.oklerthemes.com/porto-admin/edge/assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
		<script src="http://preview.oklerthemes.com/porto-admin/edge/assets/vendor/pnotify/pnotify.custom.js"></script>

		<!-- Admin Extension -->
		<script src="http://preview.oklerthemes.com/porto-admin/edge/assets/javascripts/theme.admin.extension.js"></script>

		<!-- Admin Extension Examples -->
		<script src="http://preview.oklerthemes.com/porto-admin/edge/assets/javascripts/forms/examples.wizard.js"></script>

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
		 -->
		
		<script src="<?php echo assets_url(); ?>script/public_solicitud.js"></script>
		
		<script>
			$(document).ready(function () {
				// Aplicamos select2() a todos los combos select
				$("select").select2();
			});
		</script>

	</body>
</html>
<?php
echo validar_acceso_publico();
?>
