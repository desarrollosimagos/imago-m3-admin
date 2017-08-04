<section class="page-header page-header-color page-header-primary page-header-float-breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="mt-xs"><?php echo $this->lang->line('header_title_s'); ?> 
				<span><?php echo $this->lang->line('header_title_span_s'); ?></span></h1>
				<ul class="breadcrumb breadcrumb-valign-mid">
					<li><a href="public"><?php echo $this->lang->line('header_li1_s'); ?></a></li>
					<li class="active"><?php echo $this->lang->line('header_li2_s'); ?></li>
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
						<a href="#w4-account" data-toggle="tab"><span>1</span><?php echo $this->lang->line('wizard_li1'); ?></a>
					</li>
					<li>
						<a href="#w4-profile" data-toggle="tab"><span>2</span><?php echo $this->lang->line('wizard_li2'); ?></a>
					</li>
					<li>
						<a href="#w4-billing" data-toggle="tab"><span>3</span><?php echo $this->lang->line('wizard_li3'); ?></a>
					</li>
					<li>
						<a href="#w4-confirm" data-toggle="tab"><span>4</span><?php echo $this->lang->line('wizard_li4'); ?></a>
					</li>
				</ul>
			</div>

			<form class="form-horizontal" id="form_solicitud" novalidate="novalidate">
				<div class="tab-content">
					<div id="w4-account" class="tab-pane active">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-username"><?php echo $this->lang->line('wizard_li1_label1'); ?></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="username" id="w4-username" value="<?php echo $this->session->userdata['logged_in_public']['name']." ".$this->session->userdata['logged_in_public']['lastname'];?>" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-username"><?php echo $this->lang->line('wizard_li1_label2'); ?></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="username" id="w4-username" value="<?php echo $this->session->userdata['logged_in_public']['username'];?>" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-username"><?php echo $this->lang->line('wizard_li1_label3'); ?></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="username" id="w4-username" value="<?php echo $this->session->userdata['logged_in_public']['phone'];?>" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
								<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $this->session->userdata['logged_in_public']['id']; ?>">
							</div>
						</div>
					</div>
					<div id="w4-profile" class="tab-pane">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-vehicle"><?php echo $this->lang->line('wizard_li2_label1'); ?> *</label>
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
								<span style="cursor: pointer" class="add_vehiculo input-group-addon" title="<?php echo $this->lang->line('wizard_li2_btn_add'); ?>"><span class="fa fa-plus" style="color: green"></span></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-vehicle"><?php echo $this->lang->line('wizard_li2_label2'); ?> *</label>
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
							<label class="col-sm-3 control-label" for="w4-vehicle"><?php echo $this->lang->line('wizard_li2_label3'); ?> *</label>
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
							<label class="col-sm-3 control-label" for="w4-first-name"><?php echo $this->lang->line('wizard_li2_label4'); ?></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="w4-marca" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-last-name"><?php echo $this->lang->line('wizard_li2_label5'); ?></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="w4-modelo" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-last-name"><?php echo $this->lang->line('wizard_li2_label6'); ?></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="w4-color" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-last-name"><?php echo $this->lang->line('wizard_li2_label7'); ?></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="w4-anyo" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
							</div>
						</div>
					</div>
					<div id="w4-billing" class="tab-pane">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-vehicle"><?php echo $this->lang->line('wizard_li3_label1'); ?> *</label>
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
								<span style="cursor: pointer" class="add_direccion input-group-addon" title="<?php echo $this->lang->line('wizard_li3_btn_add'); ?>"><span class="fa fa-plus" style="color: green"></span></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-cc"><?php echo $this->lang->line('wizard_li3_label2'); ?></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="w4-ciudad" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-cc"><?php echo $this->lang->line('wizard_li3_label3'); ?></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="w4-telefono" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-cc"><?php echo $this->lang->line('wizard_li3_label4'); ?></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="w4-movil" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-cc"><?php echo $this->lang->line('wizard_li3_label5'); ?></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="w4-descripcion" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-cc"><?php echo $this->lang->line('wizard_li3_label6'); ?></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="w4-zip" readonly="true" aria-required="true" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
							</div>
						</div>
					</div>
					<div id="w4-confirm" class="tab-pane">
						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-email"><?php echo $this->lang->line('wizard_li4_label1'); ?></label>
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
									<label for="w4-terms"><?php echo $this->lang->line('wizard_li4_check_terms'); ?></label>
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
					<a><i class="fa fa-angle-left"></i> <?php echo $this->lang->line('button_previous'); ?></a>
				</li>
				<!--<li id="finalizar" class="finish hidden pull-right">-->
				<li id="finalizar" class="finish hidden pull-right">
					<a><?php echo $this->lang->line('button_end'); ?></a>
				</li>
				<li class="next">
					<a><?php echo $this->lang->line('button_next'); ?> <i class="fa fa-angle-right"></i></a>
				</li>
			</ul>
		</div>
		
	</section>
	<?php	
	}else{
	?>
	<p class="lead font-weight-normal mb-xlg pb-xlg">
		<?php echo $this->lang->line('row1_text'); ?>
		<span class="ws-nowrap"><i class="icon-login icons"></i> 
		<a class="solicitar" style="cursor:pointer;"><?php echo $this->lang->line('row1_link'); ?></a>
		</span>
	</p>
	<?php
	}
	?>

</div>
