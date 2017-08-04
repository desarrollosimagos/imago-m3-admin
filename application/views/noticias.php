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
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/vendor/animate/animate.min.css">
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="<?php echo assets_url(); ?>public/vendor/magnific-popup/magnific-popup.min.css">

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

		<!-- Head Libs -->
		<script src="<?php echo assets_url(); ?>public/vendor/modernizr/modernizr.min.js"></script>

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
													<li class="activedropdown-full-color dropdown-secondary">
														<a href="noticias">
															Noticias
														</a>
													</li>
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
							<h1 class="mt-xs">Noticias <span>Everything you need to know</span></h1>
							<ul class="breadcrumb breadcrumb-valign-mid">
								<li><a href="#">Inicio</a></li>
								<li class="active">Noticias</li>
							</ul>
						</div>
					</div>
				</div>
			</section>

			<div class="container">

				<div class="row mt-xl mb-xlg pb-xl">
					<div class="col-md-12">
						<h2 class="font-weight-semibold mb-xs">Síganos y esté al tanto de todas las novedades</h2>

						<p class="lead font-weight-normal">Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat.</p>

						<p class="mb-xlg pb-xlg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum pretium, tortor risus dapibus tortor, eu suscipit orci leo sed nisl. Integer et ipsum eu nulla auctor mattis sit amet in diam. Vestibulum non ornare arcu. Class aptent taciti sociosqu ad.</p>

						<div class="row mt-xl">
							<div class="col-xs-4">
								<a href="#" class="text-decoration-none">
									<img alt="" class="img-responsive" src="<?php echo assets_url(); ?>public/img/demos/medical/noticias/18306205.jpg">
								</a>
							</div>
							<div class="col-sm-8">
								<h4 class="font-weight-semibold mb-xs mt-xs">
									<a href="#" class="text-decoration-none">Abierta nueva sede en Colon 
</a>
								</h4>
								<p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat...</p>
								<p><a href="#" class="btn btn-borders btn-quaternary custom-button text-uppercase mt-sm mb-md font-weight-bold btn-sm">ver mas...</a></p>
							</div>
						</div>

						<div class="row mt-xl">
							<div class="col-xs-4">
								<a href="#" class="text-decoration-none">
									<img alt="" class="img-responsive" src="<?php echo assets_url(); ?>public/img/demos/medical/noticias/colon-1741453790-L.jpg">
								</a>
							</div>
							<div class="col-sm-8">
								<h4 class="font-weight-semibold mb-xs mt-xs">
									<a href="#" class="text-decoration-none">Abierta nueva sede en Veraguas</a>
								</h4>
								<p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat...</p>
								<p><a href="#" class="btn btn-borders btn-quaternary custom-button text-uppercase mt-sm mb-md font-weight-bold btn-sm">ver mas...</a></p>
							</div>
						</div>

						<div class="row mt-xl">
							<div class="col-xs-4">
								<a href="#" class="text-decoration-none">
									<img alt="" class="img-responsive" src="<?php echo assets_url(); ?>public/img/demos/medical/noticias/PRUEBA-Volvo-V40-T5-Imagen-Interior-Asientos-Tapiceria-Cuero-Negro.jpg">
								</a>
							</div>
							<div class="col-sm-8">
								<h4 class="font-weight-semibold mb-xs mt-xs">
									<a href="#" class="text-decoration-none">Ahora prestamos el servicio de lavado de carrocería de cuero.</a>
								</h4>
								<p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat...</p>
								<p><a href="#" class="btn btn-borders btn-quaternary custom-button text-uppercase mt-sm mb-md font-weight-bold btn-sm">ver mas...</a></p>
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
						<h5 class="modal-title"><span id="titulo"></span> Cliente</h5>
					</div>
					<div class="modal-body" >
						<form id="form_client" action="" method="post" class="form">
							<div class="form-group">
								<label >Usuario *</label>
								<input id="username" name="username" class="form-control" type="text" maxlength="100">
								<label>Contraseña *</label>
								<input id="password" name="password" class="form-control" type="password" maxlength="20" >
								<label>Repetir Contraseña *</label>
								<input id="confirm" name="confirm" class="form-control" type="password" maxlength="20" >
								<label >Nombre *</label>
								<input id="name" name="name" class="form-control" type="text" maxlength="150">
								<label>Apellido *</label>
								<input id="lastname" name="lastname" class="form-control" type="text" maxlength="20">
								<label>Telefono 1 *</label>
								<input id="phone" name="phone" class="form-control" type="text" maxlength="20">
								<label>Teléfono 2</label>
								<input id="cell_phone" name="cell_phone" class="form-control" type="text" maxlength="20">
								<input id="status" name="status" class="form-control" type="hidden" value="activo" maxlength="20">
							</div>
						</form>
					</div>
					<div class="modal-footer" >
						<button class="btn btn-primary" type="button" id="add_client">
							Registrar
						</button>
					</div>
				</div>
			</div>
		</div>
		<!--Modal de registro/inicio de sesión-->

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


	</body>
</html>
<?php
echo validar_acceso_publico();
?>
