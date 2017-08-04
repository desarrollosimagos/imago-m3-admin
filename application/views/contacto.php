<section class="page-header page-header-color page-header-primary page-header-float-breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="mt-xs"><?php echo $this->lang->line('header_title'); ?> 
				<span><?php echo $this->lang->line('header_title_span'); ?></span></h1>
				<ul class="breadcrumb breadcrumb-valign-mid">
					<li><a href="public"><?php echo $this->lang->line('header_li1'); ?></a></li>
					<li class="active"><?php echo $this->lang->line('header_li2'); ?></li>
				</ul>
			</div>
		</div>
	</div>
</section>

<div class="container">

	<div class="row mt-lg">
		<div class="col-md-4">
			<div class="feature-box feature-box-style-2">
				<div class="feature-box-icon">
					<i class="icon-login icons"></i>
				</div>
				<div class="feature-box-info">
					<h4 class="mb-sm"><?php echo $this->lang->line('row1_title1'); ?></h4>
					<p class="font-size-lg">
						<?php echo $this->lang->line('row1_p1'); ?> <br>
						<?php echo $this->lang->line('row1_p2'); ?>
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="feature-box feature-box-style-2">
				<div class="feature-box-icon">
					<i class="icon-phone icons"></i>
				</div>
				<div class="feature-box-info">
					<h4 class="mb-sm"><?php echo $this->lang->line('row1_title2'); ?></h4>
					<p class="font-size-lg">
						123-456-7890 <br>
						123-456-7891
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="feature-box feature-box-style-2">
				<div class="feature-box-icon">
					<i class="icon-envelope icons"></i>
				</div>
				<div class="feature-box-info">
					<h4 class="mb-sm"><?php echo $this->lang->line('row1_title3'); ?></h4>
					<p class="font-size-lg">
						<a href="mailto:contacto@lubricardelivery.com" class="text-decoration-none">contacto@lubricardelivery.com</a><br>
					</p>
				</div>
			</div>
		</div>
	</div>

	<hr class="solid">

	<div class="row pt-lg mb-lg pb-xl">
		<div class="col-md-6">
			<div id="googlemaps" class="google-map m-none mb-xl"></div>
		</div>
		<div class="col-md-6">

			<h4 class="font-weight-semibold mb-xlg"><?php echo $this->lang->line('row2_title1'); ?></h4>

			<div class="alert alert-success hidden mt-lg" id="contactSuccess">
				<?php echo $this->lang->line('row2_alert1'); ?>
			</div>

			<div class="alert alert-danger hidden mt-lg" id="contactError">
				<?php echo $this->lang->line('row2_alert2'); ?>
				<span class="font-size-xs mt-sm display-block" id="mailErrorMessage"></span>
			</div>

			<form id="contactForm" method="POST">
				<div class="row">
					<div class="form-group">
						<div class="col-md-12">
							<!--<input type="text" placeholder="Tu nombre" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>-->
							<input type="text" placeholder="<?php echo $this->lang->line('row2_input1'); ?>" value="" maxlength="100" class="form-control" name="name" id="name">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-12">
							<!--<input type="email" placeholder="Tu Correo Electrónico" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>-->
							<input type="email" placeholder="<?php echo $this->lang->line('row2_input2'); ?>" value="" maxlength="100" class="form-control" name="email" id="email">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-12">
							<!--<input type="text" placeholder="Asunto" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required>-->
							<input type="text" placeholder="<?php echo $this->lang->line('row2_input3'); ?>" value="" maxlength="100" class="form-control" name="subject" id="subject">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-12">
							<!--<textarea maxlength="5000" placeholder="Mensaje" data-msg-required="Please enter your message." rows="5" class="form-control" name="message" id="message" required></textarea>-->
							<textarea maxlength="5000" placeholder="<?php echo $this->lang->line('row2_input4'); ?>" rows="5" class="form-control" name="message" id="message"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<input id="send_message" type="submit" value="<?php echo $this->lang->line('row2_button'); ?>" class="btn btn-primary btn-lg mb-xlg">
					</div>
				</div>
			</form>

		</div>
	</div>

</div>
