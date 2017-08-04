<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Imago M3</title>

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
		<link href="<?php echo assets_url('css/select2.css');?>" rel="stylesheet">
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
									<li id="li_confirm">
										<span class="ws-nowrap">
											<div class="li_confirm" style="display:none;">
											<?php 
											if(isset($_GET['confirm'])){
												if($_GET['confirm'] == '1'){
													echo '1';
												}else{
													echo "";
												}
											}
											?>
											</div>
										</span>
									</li>
									<li id="li_error">
										<span class="ws-nowrap">
											<div class="error" style="color:red;">
											<?php 
											if(isset($_GET['error'])){
												if($_GET['error'] == '1'){
													echo $this->lang->line('top_bar_message1');
												}else if($_GET['error'] == '2'){
													echo $this->lang->line('top_bar_message2');
												}else{
													echo "";
												}
											}
											?>
											</div>
										</span>
									</li>
									<li class="hidden-xs" id="li_cerrar">
										<span class="ws-nowrap"><i class="icon-logout icons"></i><a href="#" id="cerrar"><?php echo $this->lang->line('top_bar_logout'); ?></a></span>
									</li>
									<li class="hidden-xs" id="li_perfil">
										<span class="ws-nowrap">
										<i class="icon-user icons"></i> 
										<a href="public_perfil" id="perfil"><span id="span_perfil"></span></a>
										</span>
									</li>
									<li class="hidden-xs" id="li_inicio">
										<span class="ws-nowrap"><i class="icon-login icons"></i> <a href="#" id="inicio"><?php echo $this->lang->line('top_bar_login'); ?></a></span>
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
													<li id="li_public" class="dropdown-full-color dropdown-secondary">
														<a href="public">
															<?php echo $this->lang->line('menu_bar_menu1'); ?>
														</a>
													</li>
													<li id="li_somos" class="dropdown-full-color dropdown-secondary">
														<a href="somos">
															<?php echo $this->lang->line('menu_bar_menu2'); ?>
														</a>
													</li>
													<li id="li_servicios" class="dropdown-full-color dropdown-secondary">
														<!--<a class="dropdown-toggle" href="servicios">-->
														<a href="servicios">
															<?php echo $this->lang->line('menu_bar_menu3'); ?>
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
													<li id="li_solicitud" class="dropdown-full-color dropdown-secondary">
														<a href="solicitud">
															<?php echo $this->lang->line('menu_bar_menu4'); ?>
														</a>
													</li>
													<!--<li class="dropdown-full-color dropdown-secondary">
														<a href="noticias">
															Noticias
														</a>
													</li>-->
													<li id="li_contacto" class="dropdown-full-color dropdown-secondary">
														<a href="contacto">
															<?php echo $this->lang->line('menu_bar_menu5'); ?>
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
				
			<?php
			// Carga de páginas
			require_once($pagina);
			?>

			<footer id="footer" class="m-none">
				<div class="container">
					<div class="row">
						
						<div class="col-md-3">
							<h4 class="mb-xlg"><?php echo $this->lang->line('title1_footer'); ?></h4>
							<div class="info custom-info">
								<span><?php echo $this->lang->line('days1_footer'); ?></span>
								<span>8:30 am to 5:00 pm</span>
							</div>
							<div class="info custom-info">
								<span><?php echo $this->lang->line('days2_footer'); ?></span>
								<span>9:30 am to 1:00 pm</span>
							</div>
						</div>
						<!--<div class="col-md-3 col-md-offset-1">-->
						<div class="col-md-3">
							<div class="contact-details">
								<h4 class="mb-xlg"><?php echo $this->lang->line('title2_footer'); ?></h4>
								<a class="text-decoration-none" href="tel:1234567890">
									<strong class="font-weight-light">(800)123-4567</strong>
								</a>
							</div>
						</div>
						<div class="col-md-2">
							<h4 class="mb-xlg"><?php echo $this->lang->line('title3_footer'); ?></h4>
							<ul class="social-icons">
								<li class="social-icons-facebook">
									<a href="http://www.facebook.com/" target="_blank" title="Facebook">
										<i class="fa fa-facebook"></i>
										<input type="hidden" id="section" value="<?php echo $section;?>">
										<input type="hidden" id="language" value="<?php echo $this->session->userdata('site_lang');?>">
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
						<div class="col-md-4">
							<div class="contact-details">
								<h4 class="mb-xlg"><?php echo $this->lang->line('title4_footer'); ?></h4>
								<select onchange="javascript:if(this.value != 'seleccione'){window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/'+this.value;}">
									<option value="seleccione">Seleccione</option>
									<option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>><?php echo $this->lang->line('tag_language1'); ?></option>
									<option value="portuguese" <?php if($this->session->userdata('site_lang') == 'portuguese') echo 'selected="selected"'; ?>><?php echo $this->lang->line('tag_language2'); ?></option>
									<option value="spanish" <?php if($this->session->userdata('site_lang') == 'spanish') echo 'selected="selected"'; ?>><?php echo $this->lang->line('tag_language3'); ?></option>   
								</select>
								<!--<p><?php echo $this->lang->line('welcome_message'); ?></p>-->
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright pt-md pb-md">
					<div class="container">
						<div class="row">
							<div class="col-md-12 center m-none">
								<p><?php echo $this->lang->line('rights_message'); ?></p>
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
						<h5 class="modal-title text-center" id="titulo1"><span><?php echo $this->lang->line('modal_title_s'); ?></span></h5>
						<h5 class="modal-title text-center" id="titulo2"><span><?php echo $this->lang->line('modal_title_s2'); ?></span></h5>
					</div>
					<div class="modal-body" >
						<form id="form_client" action="login_public" method="post" class="form">
							<div class="form-group">
								<label class="username"><?php echo $this->lang->line('modal_input1_s'); ?> *</label>
								<input id="username" name="username" class="form-control" type="text" maxlength="100">
								<label class="password"><?php echo $this->lang->line('modal_input2_s'); ?> *</label>
								<input id="password" name="password" class="form-control" type="password" maxlength="20" >
								<label class="confirm"><?php echo $this->lang->line('modal_input3_s'); ?> *</label>
								<input id="confirm" name="confirm" class="form-control" type="password" maxlength="20" >
								<label class="name"><?php echo $this->lang->line('modal_input4_s'); ?> *</label>
								<input id="name" name="name" class="form-control" type="text" maxlength="150">
								<label class="lastname"><?php echo $this->lang->line('modal_input5_s'); ?> *</label>
								<input id="lastname" name="lastname" class="form-control" type="text" maxlength="20">
								<label class="phone"><?php echo $this->lang->line('modal_input6_s'); ?> *</label>
								<input id="phone" name="phone" class="form-control" type="text" maxlength="20">
								<label class="cell_phone"><?php echo $this->lang->line('modal_input7_s'); ?></label>
								<input id="cell_phone" name="cell_phone" class="form-control" type="text" maxlength="20">
								<input id="status" name="status" class="form-control" type="hidden" value="0" maxlength="20">
								<input id="base_url" type="hidden" value="<?php echo base_url(); ?>"/>
								<br>
								<div id="recapcha">
									<div class="g-recaptcha" data-sitekey="6LewpiQUAAAAABg-KyhrB7y71mygvZGYfc5Zp8l2"></div>
								</div>						
							</div>
						</form>
						<button id="iniciar" type="button" class="btn btn-primary full-width m-b text-center"><?php echo $this->lang->line('modal_btn_send_s'); ?></button>
						<button class="btn btn-primary full-width m-b text-center" type="button" id="add_client"><?php echo $this->lang->line('modal_btn_send_s2'); ?></button>
					</div>
					<div class="modal-footer text-center" >
					</div>
					<p class="text-muted text-center" id="question_account"><small><?php echo $this->lang->line('modal_q_s'); ?></small></p>
					<a class="btn btn-sm btn-white btn-block" id="reg_client" href="#"><?php echo $this->lang->line('modal_link_add_s'); ?></a>
					<a class="btn btn-sm btn-white btn-block" id="hidden_reg_client" href="#"><?php echo $this->lang->line('modal_link_login_s2'); ?></a>
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
						<h5 class="modal-title" id="titulo_a1"><span><?php echo $this->lang->line('modal_title_a'); ?></span></h5>
						<h5 class="modal-title" id="titulo_a2"><span><?php echo $this->lang->line('modal_title_a2'); ?></span></h5>
					</div>
					<div class="modal-body" >
						<form id="form_direccion" action="" method="post" class="form">
							<div class="form-group">
								<label ><?php echo $this->lang->line('modal_input1_a'); ?> *</label>
								<input id="city" name="city" class="form-control" type="text" maxlength="100">
								<label><?php echo $this->lang->line('modal_input2_a'); ?> *</label>
								<input id="zip" name="zip" class="form-control" type="text" maxlength="20" >
								<label><?php echo $this->lang->line('modal_input3_a'); ?></label>
								<input id="description" name="description" class="form-control" type="text" maxlength="50" >
								<label><?php echo $this->lang->line('modal_input4_a'); ?> *</label>
								<input id="address_1" name="address_1" class="form-control" type="text" maxlength="150" >
								<label ><?php echo $this->lang->line('modal_input5_a'); ?></label>
								<input id="address_2" name="address_2" class="form-control" type="text" maxlength="150">
								<label><?php echo $this->lang->line('modal_input6_a'); ?> *</label>
								<input id="phone_1" name="phone_1" class="form-control" type="text" maxlength="20">
								<label><?php echo $this->lang->line('modal_input7_a'); ?></label>
								<input id="cell_phone_1" name="cell_phone" class="form-control" type="text" maxlength="20">
								<input id="id_direccion" name="id_direccion" class="form-control" type="hidden" >
								<input id="accion"  class="form-control" type="hidden" >
								<input id="posicion"  class="form-control" type="hidden" >
							</div>
						</form>
					</div>
					<div class="modal-footer" >
						<button class="btn btn-primary" type="button" id="add_address">
							<span id="send_a1"><?php echo $this->lang->line('modal_btn_send_a1'); ?></span>
							<span id="send_a2"><?php echo $this->lang->line('modal_btn_send_a2'); ?></span>
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
						<h4 class="modal-title" id="titulo_v1"><span><?php echo $this->lang->line('modal_title_v'); ?></span></h4>
						<h4 class="modal-title" id="titulo_v2"><span><?php echo $this->lang->line('modal_title_v2'); ?></span></h4>
					</div>
					<div class="modal-body">
						<form id="form_vehiculo" action="" method="post" class="form">
							<div class="form-group">
								<label ><?php echo $this->lang->line('modal_input1_v'); ?> *</label>
								<input id="trademark" name="trademark" class="form-control" type="text" maxlength="50">
								<label><?php echo $this->lang->line('modal_input2_v'); ?> *</label>
								<input id="model" name="model" class="form-control" type="text" maxlength="50">
								<label ><?php echo $this->lang->line('modal_input3_v'); ?> *</label>
								<input id="color" name="color" class="form-control" type="text" maxlength="50">
								<label ><?php echo $this->lang->line('modal_input4_v'); ?> *</label>
								<input type="text" class="form-control"  id="year" name="year" maxlength="4">
								<label ><?php echo $this->lang->line('modal_input5_v'); ?> *</label>
								<input id="license_plate" name="license_plate" class="form-control" type="text" maxlength="50">
								<input id="id_vehiculo" name="id_vehiculo" class="form-control" type="hidden" >
								<input id="accion2" class="form-control" type="hidden" >
								<input id="posicion2" class="form-control" type="hidden" >
							</div>
						</form>
					</div>
					<div class="modal-footer" >
						<button class="btn btn-primary" type="button" id="add_vehicle">
							<span id="send_v1"><?php echo $this->lang->line('modal_btn_send_v1'); ?></span>
							<span id="send_v2"><?php echo $this->lang->line('modal_btn_send_v2'); ?></span>
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
						<h4 class="modal-title" id="titulo_phones"><span><?php echo $this->lang->line('modal_title_t'); ?></span></h4>
					</div>
					<div class="modal-body">
						<form id="form_phones" action="" method="post" class="form">
							<div class="form-group">
								<label ><?php echo $this->lang->line('modal_input1_t'); ?> </label>
								<input id="phone_2" name="phone_2" class="form-control" type="text" maxlength="50">
								<label><?php echo $this->lang->line('modal_input2_t'); ?> </label>
								<input id="cell_phone_2" name="cell_phone_2" class="form-control" type="text" maxlength="50">
								<input id="accion3" class="form-control" type="hidden" >
							</div>
						</form>
					</div>
					<div class="modal-footer" >
						<button class="btn btn-primary" type="button" id="edit_phones">
							<?php echo $this->lang->line('modal_btn_send_t'); ?>
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
		<script src="<?php echo assets_url('js/select2.js');?>"></script>
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
		
		<!-- Admin Extension Specific Page Vendor -->
		<script src="http://preview.oklerthemes.com/porto-admin/edge/assets/vendor/jquery-validation/jquery.validate.js"></script>
		<script src="http://preview.oklerthemes.com/porto-admin/edge/assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
		<script src="http://preview.oklerthemes.com/porto-admin/edge/assets/vendor/pnotify/pnotify.custom.js"></script>

		<!-- Admin Extension -->
		<script src="http://preview.oklerthemes.com/porto-admin/edge/assets/javascripts/theme.admin.extension.js"></script>

		<!-- Admin Extension Examples -->
		<script src="http://preview.oklerthemes.com/porto-admin/edge/assets/javascripts/forms/examples.wizard.js"></script>
		
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCmh8346n5MUe573bmjTqxn026Wa-G8Cg"></script>
		<script>
			
			if ( $("#googlemaps").length > 0 ) {
			
				/*
				Map Settings

					Find the Latitude and Longitude of your address:
						- http://universimmedia.pagesperso-orange.fr/geo/loc.htm
						- http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

				*/

				// Map Markers
				var mapMarkers = [{
					address: "New York, NY 10017",
					html: "<strong>Lubricar</strong><br>New York, NY 10017",
					icon: {
						image: "<?php echo assets_url(); ?>public/img/pin.png",
						iconsize: [26, 46],
						iconanchor: [12, 46]
					},
					popup: true
				}];

				// Map Initial Location
				var initLatitude = 40.75198;
				var initLongitude = -73.96978;

				// Map Extended Settings
				var mapSettings = {
					controls: {
						draggable: (($.browser.mobile) ? false : true),
						panControl: true,
						zoomControl: true,
						mapTypeControl: true,
						scaleControl: true,
						streetViewControl: true,
						overviewMapControl: true
					},
					scrollwheel: false,
					markers: mapMarkers,
					latitude: initLatitude,
					longitude: initLongitude,
					zoom: 16
				};

				var mapRef = $('#googlemaps').data('gMap.reference');

				var map = $('#googlemaps').gMap(mapSettings),
					mapRef = $('#googlemaps').data('gMap.reference');

				// Map Center At
				var mapCenterAt = function(options, e) {
					e.preventDefault();
					$('#googlemaps').gMap("centerAt", options);
				}

				// Styles from https://snazzymaps.com/
				var styles = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}];

				var styledMap = new google.maps.StyledMapType(styles, {
					name: 'Styled Map'
				});

				mapRef.mapTypes.set('map_style', styledMap);
				mapRef.setMapTypeId('map_style');
			
			}

		</script>

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
		<?php
			// Habilitamos el js de validaciones correspondiente a la página actual
			$url_relativa = $_SERVER['REQUEST_URI'];

			// Nótese el uso de !==. Puesto que != simple no funcionará como se espera
			// porque la posición de 'a' está en el 1° (primer) caracter.
			if (strpos($url_relativa, 'public_perfil') !== false) {
				echo '<script src="'.assets_url().'script/public_perfil.js"></script>';
			}else if(strpos($url_relativa, 'solicitud') !== false){
				echo '<script src="'.assets_url().'script/public_solicitud.js"></script>';
			}
		?>
		
		<script src="<?php echo assets_url(); ?>script/contact.js"></script>
		
		<script>
			$(document).ready(function () {
				// Aplicamos select2() a todos los combos select
				$("select").select2();
			});
			
			// Marcar la sección actual
			if($("#section").val() == "public"){
				$("#li_public").addClass('active');
			}else if($("#section").val() == "somos"){
				$("#li_somos").addClass('active');
			}else if($("#section").val() == "servicios"){
				$("#li_servicios").addClass('active');
			}else if($("#section").val() == "solicitud"){
				$("#li_solicitud").addClass('active');
			}else if($("#section").val() == "contacto"){
				$("#li_contacto").addClass('active');
			}
		</script>

	</body>
</html>
<?php
echo validar_acceso_publico();
?>
