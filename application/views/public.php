<div class="slider-container rev_slider_wrapper" style="height: 650px;">
	<div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 650, 'disableProgressBar': 'on', 'navigation': {'bullets': {'enable': true, 'direction': 'vertical', 'h_align': 'right', 'v_align': 'center', 'space': 5}, 'arrows': {'enable': false}}}">
		<ul>
			<li data-transition="fade">
				<img src="<?php echo assets_url(); ?>public/img/demos/medical/slides/slider-1.jpg"  
					alt=""
					data-bgposition="center center" 
					data-bgfit="cover" 
					data-bgrepeat="no-repeat"
					class="rev-slidebg">

				<div class="tp-caption main-label"
					data-x="left" data-hoffset="25"
					data-y="center" data-voffset="-5"
					data-start="1500"
					data-whitespace="nowrap"						 
					data-transform_in="y:[100%];s:500;"
					data-transform_out="opacity:0;s:500;"
					style="z-index: 5; font-size: 1.5em; text-transform: uppercase;"
					data-mask_in="x:0px;y:0px;">El cambio de aceite que va hacia usted</div>

				<div class="tp-caption main-label"
					data-x="left" data-hoffset="25"
					data-y="center" data-voffset="-55"
					data-start="500"
					style="z-index: 5; text-transform: uppercase; font-size: 52px;"
					data-transform_in="y:[-300%];opacity:0;s:500;">LUBRICAR DELIVERY</div>
				
				<div class="tp-caption bottom-label"
					data-x="left" data-hoffset="25"
					data-y="center" data-voffset="40"
					data-start="2000"
					style="z-index: 5; border-bottom: 1px solid #fff; padding-bottom: 3px;"
					data-transform_in="y:[100%];opacity:0;s:500;" style="font-size: 1.2em;">Atendemos en toda Panamá</div>
			</li>
			<li data-transition="fade">
				<img src="<?php echo assets_url(); ?>public/img/demos/medical/slides/slider-2.jpg"  
					alt=""
					data-bgposition="center center" 
					data-bgfit="cover" 
					data-bgrepeat="no-repeat"
					class="rev-slidebg">

				<div class="tp-caption main-label"
					data-x="left" data-hoffset="25"
					data-y="center" data-voffset="-5"
					data-start="1500"
					data-whitespace="nowrap"						 
					data-transform_in="y:[100%];s:500;"
					data-transform_out="opacity:0;s:500;"
					style="z-index: 5; font-size: 1.5em; text-transform: uppercase;"
					data-mask_in="x:0px;y:0px;">Contáctenos ahora para programar una cita de servicio en su localidad.  
</div>

				<div class="tp-caption main-label"
					data-x="left" data-hoffset="25"
					data-y="center" data-voffset="-55"
					data-start="500"
					style="z-index: 5; text-transform: uppercase; font-size: 52px;"
					data-transform_in="y:[-300%];opacity:0;s:500;">CITAS DE SERVICIO</div>
				
				<div class="tp-caption bottom-label"
					data-x="left" data-hoffset="25"
					data-y="center" data-voffset="40"
					data-start="2000"
					style="z-index: 5; border-bottom: 1px solid #fff; padding-bottom: 3px;"
					data-transform_in="y:[100%];opacity:0;s:500;" style="font-size: 1.2em;">En línea o vía telefónica</div>
			</li>
		</ul>
	</div>
</div>

<section class="section-custom-medical">
	<div class="container">
		<div class="row medical-schedules">
			<div class="col-lg-3 box-one background-color-primary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="0">
				<div class="feature-box feature-box-style-2 p-lg">
					<div class="feature-box-icon">
						<img src="<?php echo assets_url(); ?>public/img/demos/medical/icons/medical-icon-heart.png" alt class="img-responsive pt-xs" />
					</div>
					<div class="feature-box-info ml-md">
						<h4 class="m-none">Lubricar Delivery</h4>
					</div>
				</div>
			</div>
			<div class="col-lg-3 box-two background-color-tertiary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="600">
				<h5 class="m-none">
					<a href="servicios" title="">
						Agendar un servicio 
						<i class="icon-arrow-right-circle icons"></i>
					</a>
				</h5>
			</div>
			<div class="col-lg-3 box-three background-color-primary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1200">
				<div class="expanded-info p-xlg background-color-primary">
					<div class="info custom-info">
						<span>Lun-Vie</span>
						<span>8:30 am a 5:00 pm</span>
					</div>
					<div class="info custom-info">
						<span>Sabados</span>
						<span>9:30 am to 1:00 pm</span>
					</div>
				</div>
				<h5 class="m-none">
					Horario de Atención
					<i class="icon-arrow-right-circle icons"></i>
				</h5>
			</div>
			<div class="col-lg-3 box-four background-color-secondary p-none appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1800">
				<a href="tel:+008001234567" class="text-decoration-none">
					<div class="feature-box feature-box-style-2 m-none">
						<div class="feature-box-icon">
							<i class="icon-call-out icons"></i>
						</div>
						<div class="feature-box-info ml-md">
							<label class="font-weight-light">Contáctenos</label>
							<strong class="font-weight-normal">(800)123-4567</strong>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="row pt-xl">
			<div class="col-md-12">
				<h2 class="font-weight-semibold mb-xs">Servicios</h2>
				<p class="lead font-weight-normal">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
			</div>
		</div>
		<br>
		<?php
		foreach($servicios as $servicio){
		?>
			<div class="col-md-4">
				<div class="feature-box feature-box-style-2 mb-xl appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="300">
					<div class="feature-box-icon">
						<img src="<?php echo assets_url(); ?>public/img/demos/medical/<?php echo $servicio->icon; ?>" alt class="img-responsive" />
					</div>
					<div class="feature-box-info ml-md">
						<h4 class="font-weight-semibold"><a href="servicios" class="text-decoration-none"><?php echo $servicio->name; ?></a></h4>
						<p><?php echo $servicio->description; ?></p>
					</div>	
				</div>
			</div>
		<?php
		}
		?>
		<div class="row mt-lg pb-xlg">
			<div class="col-md-12 center">
				<a class="btn btn-borders btn-quaternary custom-button text-uppercase mt-lg font-weight-bold" href="servicios">ver mas</a>
			</div>
		</div>
	</div>
</section>

<section class="section section-no-border">
	<div class="container">
		<div class="row mt-xlg pt-xlg mb-xlg pb-xs">
			<div class="col-sm-8 col-md-8">
				<h2 class="font-weight-semibold mb-xs">Quienes Somos</h2>
				<p class="lead font-weight-normal">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum pretium, tortor risus dapibus tortor, eu suscipit orci leo sed nisl. Integer et ipsum eu nulla auctor mattis sit amet in diam. Vestibulum non ornare arcu. Class aptent taciti sociosqu ad...</p>

				<a class="btn btn-borders btn-quaternary custom-button text-uppercase mt-lg mb-lg font-weight-bold" href="somos">Saber mas</a>
			</div>
			<div class="col-sm-4 col-md-4">
				<img src="<?php echo assets_url(); ?>public/img/demos/medical/mecanica_automotriz_-1024x682.jpg" alt class="img-responsive box-shadow-custom" /> 
			</div>
		</div>
		
	</div>
</section>

<section class="section" style="margin-top: -30px;margin-bottom: -30px;background-color: #3A3A3A">
	<div class="container">

		<div class="row">
			<div class="col-md-8">
				<p style="font-size:18px;">
					Se parte de nuestro equipo, conviértete en una <em>franquicia</em>. 
					<span>Echa un vistazo a nuestro modelo de negocios.</span>
				</p>
			</div>
			<div class="col-md-4">
				<div class="get-started">
					<a href="contacto" class="btn btn-lg btn-primary">Contactanos</a>
					<div class="learn-more">O<a href="public"> Lea más...</a></div>
				</div>
			</div>
		</div>
	</div>
</section>

<!--<section class="section">
	<div class="container">
		<div class="row mt-md">
			<div class="col-md-12">
				<h2 class="font-weight-semibold m-none">Noticias</h2>
				<p class="lead font-weight-normal">Lorem ipsum dolor sit amet</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-md-4">
				<a href="#" class="text-decoration-none">
					<span class="thumb-info thumb-info-side-image thumb-info-side-image-custom thumb-info-no-zoom thumb-info-no-zoom thumb-info-side-image-custom-highlight">
						<span class="thumb-info-side-image-wrapper">
							<img alt="" class="img-responsive" src="<?php echo assets_url(); ?>public/img/demos/medical/noticias/PRUEBA-Volvo-V40-T5-Imagen-Interior-Asientos-Tapiceria-Cuero-Negro.jpg">
						</span>
						<span class="thumb-info-caption">
							<span class="thumb-info-caption-text p-xl">
								<h4 class="font-weight-semibold mb-xs">Ahora prestamos el servicio de lavado de carrocería de cuero.</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hend...</p>
							</span>
						</span>
					</span>
				</a>
			</div>
			<div class="col-sm-4 col-md-4">
				<a href="#" class="text-decoration-none">
					<span class="thumb-info thumb-info-side-image thumb-info-side-image-custom thumb-info-no-zoom thumb-info-no-zoom thumb-info-side-image-custom-highlight">
						<span class="thumb-info-side-image-wrapper">
							<img alt="" class="img-responsive" src="<?php echo assets_url(); ?>public/img/demos/medical/noticias/colon-1741453790-L.jpg">
						</span>
						<span class="thumb-info-caption">
							<span class="thumb-info-caption-text p-xl">
								<h4 class="font-weight-semibold mb-xs">Abierta nueva sede en Colon</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hend...</p>
							</span>
						</span>
					</span>
				</a>
			</div>
			<div class="col-sm-4 col-md-4">
				<a href="#" class="text-decoration-none">
					<span class="thumb-info thumb-info-side-image thumb-info-side-image-custom thumb-info-no-zoom thumb-info-no-zoom thumb-info-side-image-custom-highlight">
						<span class="thumb-info-side-image-wrapper">
							<img alt="" class="img-responsive" src="<?php echo assets_url(); ?>public/img/demos/medical/noticias/18306205.jpg">
						</span>
						<span class="thumb-info-caption">
							<span class="thumb-info-caption-text p-xl">
								<h4 class="font-weight-semibold mb-xs">Abierta nueva sede en Veraguas</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hend...</p>
							</span>
						</span>
					</span>
				</a>
			</div>
		</div>
		<div class="row pb-xlg">
			<div class="col-md-12 center">
				<a class="btn btn-borders btn-quaternary custom-button text-uppercase font-weight-bold">ver mas</a>
			</div>
		</div>
	</div>
</section>-->

<section>
	<br><br><br>
	<div class="container">
		<div class="row mt-md">
			<div class="col-md-12">
				<h2 class="font-weight-semibold m-none">Productos</h2>
				<p class="lead font-weight-normal">Disponemos de una variada gama de productos de excelente calidad.</p>
			</div>
		</div>
		<div class="row mb-xlg pb-xlg">
			<div class="content-grid pl-md pr-md">
				<div class="content-grid-row">
					<div class="content-grid-item col-sm-4 col-md-2 center">
						<img src="<?php echo assets_url(); ?>public/img/demos/medical/Total.png" alt class="img-responsive" />
					</div>
					<div class="content-grid-item col-sm-4 col-md-2 center">
						<img src="<?php echo assets_url(); ?>public/img/demos/medical/mobil.jpg" alt class="img-responsive" />
					</div>
					<div class="content-grid-item col-sm-4 col-md-2 center">
						<img src="<?php echo assets_url(); ?>public/img/demos/medical/pennzoil.png" alt class="img-responsive" />
					</div>
					<div class="content-grid-item col-sm-4 col-md-2 center">
						<img src="<?php echo assets_url(); ?>public/img/demos/medical/quaker_state.png" alt class="img-responsive" />
					</div>
					<div class="content-grid-item col-sm-4 col-md-2 center">
						<img src="<?php echo assets_url(); ?>public/img/demos/medical/castrol-logo.jpg" alt class="img-responsive" />
					</div>
					<div class="content-grid-item col-sm-4 col-md-2 center">
						<img src="<?php echo assets_url(); ?>public/img/demos/medical/valvoline-logo.png" alt class="img-responsive" />
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section-secondary">
	<div class="container">
		<div class="row mt-xlg pt-md mb-xlg pb-md">
			<div class="owl-carousel owl-theme nav-bottom rounded-nav" data-plugin-options="{'items': 1, 'loop': false, 'dots': false}">
				<div>
					<div class="col-md-8 col-md-offset-2 pt-xlg">
						<div class="testimonial testimonial-style-2 testimonial-with-quotes mb-none">
							<div class="testimonial-quote">“</div>
							<blockquote>
								<p class="font-weight-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum pretium, tortor risus dapibus tortor, eu suscipit orci leo sed nisl. Integer et ipsum eu nulla auctor mattis sit amet in diam. Vestibulum non.</p>
							</blockquote>
							<div class="testimonial-author mt-xlg">
								<p class="text-uppercase">
									<strong>John Smith</strong>
								</p>
							</div>
						</div>
					</div>
				</div>
				<div>
					<div class="col-md-8 col-md-offset-2 pt-xlg">
						<div class="testimonial testimonial-style-2 testimonial-with-quotes mb-none">
							<div class="testimonial-quote">“</div>
							<blockquote>
								<p class="font-weight-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum pretium, tortor risus dapibus tortor, eu suscipit orci leo sed nisl. Integer et ipsum eu nulla auctor mattis sit amet in diam. Vestibulum non.</p>
							</blockquote>
							<div class="testimonial-author mt-xlg">
								<p class="text-uppercase">
									<strong>John Smith</strong>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
