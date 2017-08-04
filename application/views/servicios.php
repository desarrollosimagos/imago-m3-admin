<section class="page-header page-header-color page-header-primary page-header-float-breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="mt-xs">Servicios <span>Lorem ipsum dolor sit amet</span></h1>
				<ul class="breadcrumb breadcrumb-valign-mid">
					<li><a href="public">Inicio</a></li>
					<li class="active">Servicios</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<div class="container">

	<div class="row mt-lg mb-lg">
		<div class="col-md-12">
			
			<p class="lead font-weight-normal mb-xlg pb-xlg">Lubricar Delivery, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
			<?php
			foreach($servicios as $servicio){
			?>
			<div class="appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="100">
				<div class="feature-box feature-box-style-2 mb-lg">
					<div class="feature-box-icon">
						<img src="<?php echo assets_url(); ?>public/img/demos/medical/<?php echo $servicio->icon; ?>" alt class="img-responsive" />
					</div>
					<div class="feature-box-info ml-md">
						<h4 class="font-weight-semibold mb-xs"><?php echo $servicio->name; ?></h4>
						<p class="mb-none"><?php echo $servicio->description; ?></p>
						<!--<p><a href="services-detail.html" class="btn btn-borders btn-quaternary custom-button text-uppercase mt-sm mb-md font-weight-bold btn-sm">ver mas...</a></p>-->
					</div>	
				</div>

				<hr class="solid mb-xlg">
			</div>
			<?php
			}
			?>

		</div>
	</div>

</div>
