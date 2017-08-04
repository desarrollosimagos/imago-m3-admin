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

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo assets_url('public/vendor/bootstrap/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo assets_url('public/vendor/font-awesome/css/font-awesome.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo assets_url('public/vendor/animate/animate.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo assets_url('public/vendor/simple-line-icons/css/simple-line-icons.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo assets_url('public/vendor/owl.carousel/assets/owl.carousel.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo assets_url('public/vendor/owl.carousel/assets/owl.theme.default.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo assets_url('public/vendor/magnific-popup/magnific-popup.min.css'); ?>">
		<link href="<?php echo assets_url('css/plugins/dataTables/datatables.min.css');?>" rel="stylesheet">
		<link href="<?php echo assets_url('js/datatables.net-bs/css/dataTables.bootstrap.css'); ?>" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo assets_url('css/dataTables.responsive.css'); ?>">
		<link href="<?php echo assets_url('js/datatables.net-responsive-bs/css/responsive.bootstrap.min.css'); ?>">
		<link href="<?php echo assets_url('css/plugins/datapicker/datepicker3.css');?>" rel="stylesheet">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/css/theme.css">
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/css/theme-elements.css">
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/css/theme-blog.css">
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/css/theme-shop.css">

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
								<div class="header-row">
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
													<li class="activedropdown-full-color dropdown-secondary">
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
														<a class="dropdown-toggle" href="servicios">
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
													<li class="dropdown-full-color dropdown-secondary">
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
							<h1 class="mt-xs">Mi Perfil (<?php echo $this->session->userdata['logged_in_public']['name']; ?> <?php echo $this->session->userdata['logged_in_public']['lastname']; ?>)<span>Navegue por los datos de su cuenta</span></h1>
							<ul class="breadcrumb breadcrumb-valign-mid">
								<li><a href="#">Inicio</a></li>
								<li class="active">Perfil público</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="tabs tabs-bottom tabs-center tabs-simple">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tabsNavigationSimpleIcons1" data-toggle="tab">
										<span class="featured-boxes featured-boxes-style-6 p-none m-none">
											<span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
												<span class="box-content p-none m-none">
													<i class="icon-featured fa fa-user"></i>
												</span>
											</span>
										</span>									
										<p class="mb-none pb-none">Datos Personales</p>
									</a>
								</li>
								<li>
									<a href="#tabsNavigationSimpleIcons2" data-toggle="tab">
										<span class="featured-boxes featured-boxes-style-6 p-none m-none">
											<span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
												<span class="box-content p-none m-none">
													<i class="icon-featured fa fa-file"></i>
												</span>
											</span>
										</span>									
										<p class="mb-none pb-none">Historial de Pedidos</p>
									</a>
								</li>
								<li>
									<a href="#tabsNavigationSimpleIcons3" data-toggle="tab">
										<span class="featured-boxes featured-boxes-style-6 p-none m-none">
											<span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
												<span class="box-content p-none m-none">
													<i class="icon-featured fa fa-address-card"></i>
												</span>
											</span>
										</span>									
										<p class="mb-none pb-none">Mis Direcciones</p>
									</a>
								</li>
								<li>
									<a href="#tabsNavigationSimpleIcons4" data-toggle="tab">
										<span class="featured-boxes featured-boxes-style-6 p-none m-none">
											<span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
												<span class="box-content p-none m-none">
													<i class="icon-featured fa fa-car"></i>
												</span>
											</span>
										</span>									
										<p class="mb-none pb-none">Mis Vehículos</p>
									</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tabsNavigationSimpleIcons1">
									<div class="justify">
										<div class="col-md-2">
										</div>
										<div class="col-md-8">
											<h4>Datos Personales</h4>
											<ul class="list list-icons list-icons-style-3 mt-xlg">
												<li><i class="fa fa-id-card"></i> <strong>Nombre:</strong> <?php echo $this->session->userdata['logged_in_public']['name']; ?> <?php echo $this->session->userdata['logged_in_public']['lastname']; ?></li>
												<li>
													<i class="fa fa-phone"></i>
													<strong>Télefono:</strong> 
													<span id="span_phone"><?php echo $this->session->userdata['logged_in_public']['phone']; ?></span>
													&nbsp;<i class="fa fa-edit editar_telefonos" style="cursor:pointer;" title="Editar"></i>
												</li>
												<li>
													<i class="fa fa-mobile"></i> 
													<strong>Móvil:</strong> 
													<span id="span_cellphone"><?php echo $this->session->userdata['logged_in_public']['cell_phone']; ?></span>
													&nbsp;<i class="fa fa-edit editar_telefonos" style="cursor:pointer;" title="Editar"></i>
												</li>
												<li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com"><?php echo $this->session->userdata['logged_in_public']['username']; ?></a></li>
											</ul>
											<input type="hidden" id="customer_id" value="<?php echo $this->session->userdata['logged_in_public']['id']; ?>">
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tabsNavigationSimpleIcons2">
									<div class="justify">
										<div class="col-md-2">
										</div>
										<div class="col-md-8">
											<h4>Historial de Pedidos</h4>
											<div class="table-responsive">
												<table id="tab_order" class="table table-striped table-bordered dt-responsive table-hover dataTables-example">
													<thead>
														<tr>
															<th class="text-center">#</th>
															<th class="text-center">Orden N°</th>
															<th class="text-center">Franquicia</th>
															<th class="text-center">Cliente</th>
															<th class="text-center">Fecha</th>
															<th class="text-center">Monto</th>
															<th class="text-center">Servicios</th>
															<th class="text-center">Productos</th>
															<th class="text-center">Estatus</th>

														</tr>
													</thead>
													<tbody>
														<?php $i = 1; ?>
														<?php foreach ($ordenes as $list) { ?>
															<tr style="text-align: center">
																<td>
																	<?php echo $i; ?>
																</td>
																<td>
																	<?php printf("%08d", $list->id) ?> 
																</td>
																<td>
																	<?php
																	foreach ($list_franq as $listar) {
																		if ($listar->id == $list->franchise_id) {
																			echo $listar->name;
																		}
																	};
																	?>
																</td>
																<td>
																	<?php
																	foreach ($list_client as $listar) {
																		if ($listar->id == $list->customer_id) {
																			echo $listar->name . ' ' . $listar->lastname;
																		}
																	};
																	?>
																</td>
																<td>
																	<?php echo $list->date_order; ?>
																</td>
																<td>
																	<?php echo $list->total; ?>
																</td>
																<td>
																	<?php
																	foreach ($list_orders_services as $order_service) {
																		if ($order_service->order_id == $list->id) {
																			foreach ($list_serv as $servicio) {
																				if ($servicio->id == $order_service->service_id) {
																					echo $servicio->name . ", ";
																				}
																			}
																		}
																	}
																	?>
																</td>
																<td>
																	<?php
																	foreach ($list_orders_products as $order_product) {
																		if ($order_product->order_id == $list->id) {
																			foreach ($list_prod as $producto) {
																				if ($producto->id == $order_product->product_id) {
																					echo $producto->name . ", ";
																				}
																			}
																		}
																	}
																	?>
																</td>
																<td>
																	<?php foreach ($status as $listar) { ?>
																		<?php if ($listar->id == $list->status){ ?>
																			<span <?php if($listar->name != 'ABIERTO'){echo "class='".$listar->labels."'";} ?>><?php echo $listar->name; ?></span>
																		<?php } ?>
																	<?php } ?>
																</td>
															</tr>
															<?php $i++ ?>
														<?php } ?>
													</tbody>

												</table>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tabsNavigationSimpleIcons3">
									<div class="justify">
										<div class="col-md-2">
										</div>
										<div class="col-md-8">
											<h4>Mis Direcciones</h4>
											<button  class="btn btn-w-m btn-primary" id="i_new_line">
												<i class="fa fa-plus"></i>&nbsp;Agregar Dirección
											</button>
											<div class="table-responsive">
												<table style="width: 100%" class="table table-striped table-bordered dt-responsive table-hover dataTables-example" id="tab_direccion">
													<thead>
														<tr>
															<th>Ciudad</th>
															<th>Código Postal</th>
															<th>Descripción</th>
															<th>Dirección 1</th>
															<th>Dirección 2</th>
															<th>Teléfono</th>
															<th>Teléfono 2</th>
															<th>Editar</th>
															<th>Eliminar</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($direcciones as $direcc) { ?>
															<tr id="<?php echo $direcc->id; ?>">
																<td style='text-align: center' id="<?php echo $direcc->id; ?>"><?php echo $direcc->city; ?></td>
																<td style='text-align: center'><?php echo $direcc->zip; ?></td>
																<td style='text-align: center'><?php echo $direcc->description; ?></td>
																<td style='text-align: center'><?php echo $direcc->address_1; ?></td>
																<td style='text-align: center'><?php echo $direcc->address_2; ?></td>
																<td style='text-align: center'><?php echo $direcc->phone; ?></td>
																<td style='text-align: center'><?php echo $direcc->cell_phone; ?></td>
																<td style='text-align: center'>
																	<a class='editar_direccion' id="<?php echo $direcc->id; ?>">
																	<i class='fa fa-edit fa-2x'></i>
																	<input id="editar_direccion_<?php echo $direcc->id;?>" type="hidden" value="<?php echo $direcc->id.";".$direcc->city.";".$direcc->zip.";".$direcc->description.";".$direcc->address_1.";".$direcc->address_2.";".$direcc->phone.";".$direcc->cell_phone; ?>">
																	</a>
																</td>
																<td style='text-align: center'>
																	<a class='quitar_direccion' id="<?php echo $direcc->id; ?>">
																	<i class='fa fa-trash fa-2x'></i>
																	</a>
																</td>
															</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tabsNavigationSimpleIcons4">
									<div class="justify">
										<div class="col-md-2">
										</div>
										<div class="col-md-8">
											<h4>Mis Vehículos</h4>
											<button  class="btn btn-w-m btn-primary" id="i_new_line2">
												<i class="fa fa-plus"></i>&nbsp;Agregar Vehículo
											</button>
											<div class="table-responsive">
												<table style="width: 100%" class="table table-striped table-bordered dt-responsive table-hover dataTables-example" id="tab_vehiculo">
													<thead>
														<tr>
															<th>Marca</th>
															<th>Modelo</th>
															<th>Color</th>
															<th>Año</th>
															<th>Placa</th>
															<th>Editar</th>
															<th>Eliminar</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($vehiculos as $vehi) { ?>
															<tr id="<?php echo $vehi->id; ?>">
																<td style='text-align: center' id="<?php echo $vehi->id; ?>"><?php echo $vehi->trademark; ?></td>
																<td style='text-align: center'><?php echo $vehi->model; ?></td>
																<td style='text-align: center'><?php echo $vehi->color; ?></td>
																<td style='text-align: center'><?php echo $vehi->year; ?></td>
																<td style='text-align: center'><?php echo $vehi->license_plate; ?></td>
																<td style='text-align: center'>
																	<a class='editar_vehiculo' id="<?php echo $vehi->id; ?>">
																	<i class='fa fa-edit fa-2x'></i>
																	<input id="editar_vehiculo_<?php echo $vehi->id;?>" type="hidden" value="<?php echo $vehi->id.";".$vehi->trademark.";".$vehi->model.";".$vehi->color.";".$vehi->year.";".$vehi->license_plate; ?>">
																	</a>
																</td>
																<td style='text-align: center'>
																	<a class='quitar_vehiculo' id="<?php echo $vehi->id; ?>">
																	<i class='fa fa-trash fa-2x'></i>
																	</a>
																</td>
															</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
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
		
		<!--Modal de edición de teléfonos-->
		<div class="modal inmodal fade" id="modal_telefonos" tabindex="-1" role="dialog"  aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close cerrar_modal" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title"><span id="titulo"></span> Teléfonos</h4>
					</div>
					<div class="modal-body">
						<form id="form_phones" action="" method="post" class="form">
							<div class="form-group">
								<label >Teléfono </label>
								<input id="phone_2" name="phone_2" class="form-control" type="text" maxlength="50">
								<label>Móvil </label>
								<input id="cell_phone_2" name="cell_phone_2" class="form-control" type="text" maxlength="50">
								<input id="accion3" class="form-control" type="hidden" >
							</div>
						</form>
					</div>
					<div class="modal-footer" >
						<button class="btn btn-primary" type="button" id="edit_phones">
							Aceptar
						</button>
					</div>
				</div>
			</div>
		</div>
		<!--Modal de edición de teléfonos-->

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
		<script src="<?php echo assets_url('js/plugins/dataTables/datatables.min.js');?>"></script>
		<script src="<?php echo assets_url('js/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
		<script src="<?php echo assets_url('js/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
		<script src="<?php echo assets_url('js/datatables.net-responsive/js/dataTables.responsive.min.js'); ?>"></script>
		
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
		
		<script src="<?php echo assets_url(); ?>script/public_perfil.js"></script>

	</body>
</html>
<?php
echo validar_acceso_publico();
?>
