<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Tiendas Virtuales</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            
            <li>
                <a href="<?php echo base_url() ?>tiendasv">Tiendas Virtuales</a>
            </li>
           
            <li class="active">
                <strong>Editar Tienda Virtual</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Editar Tienda Virtual<small></small></h5>
				</div>
				<div class="ibox-content">
					<form id="form_tiendas" method="post" accept-charset="utf-8" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label" >Nombre *</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nombre" id="nombre" maxlength="150" value="<?php echo $editar[0]->nombre ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Descripción</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="150" value="<?php echo $editar[0]->descripcion ?>">
							</div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label" >URL</label>
							<div class="col-sm-6">
								<input type="text" class="form-control"  name="url" maxlength="150" id="url" value="<?php echo $editar[0]->url ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tienda</label>
							<div class="col-sm-6">
								<select class="form-control m-b" name="tienda_id" id="tienda_id">
									<option value="0" selected="">Seleccione</option>
									<?php foreach ($listar_tiendas as $tienda) { ?>
										<option value="<?php echo $tienda->id ?>"><?php echo $tienda->rif.'  |  '.$tienda->name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tokens</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" maxlength="200" name="tokens" id="tokens" value="<?php echo $editar[0]->tokens ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Token Cliente</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" maxlength="200" name="token_cliente" id="token_cliente" value="<?php echo $editar[0]->token_cliente ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Secret API</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" maxlength="200" name="secret_api" id="secret_api" value="<?php echo $editar[0]->secret_api ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">URL Callback</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" maxlength="200" name="url_callback" id="url_callback" value="<?php echo $editar[0]->url_callback ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">API Cliente</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" maxlength="200" name="cliente_api_id" id="cliente_api_id" value="<?php echo $editar[0]->cliente_api_id ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">App</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" maxlength="200" name="app_id" id="app_id" value="<?php echo $editar[0]->app_id ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Aplicación</label>
							<div class="col-sm-6">
								<select class="form-control m-b" name="aplicacion_id" id="aplicacion_id">
									<option value="0" selected="">Seleccione</option>
									<?php foreach ($listar_aplicaciones as $aplicacion) { ?>
										<option value="<?php echo $aplicacion->id ?>"><?php echo $aplicacion->nombre; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Formula</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" maxlength="20" name="formula" id="formula" value="<?php echo $editar[0]->formula ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-2">
								 <input class="form-control" type='hidden' id="id" name="id" value="<?php echo $id ?>"/>
								 <input id="id_tienda" type="hidden" value="<?php echo $editar[0]->tienda_id ?>"/>
								 <input id="id_aplicacion" type="hidden" value="<?php echo $editar[0]->aplicacion_id ?>"/>
								<button class="btn btn-white" id="volver" type="button">Volver</button>
								<button class="btn btn-primary" id="edit" type="submit">Guardar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){

    $('input').on({
        keypress: function () {
            $(this).parent('div').removeClass('has-error');
        }
    });

    $('#volver').click(function () {
        url = '<?php echo base_url() ?>tiendasv/';
        window.location = url;
    });
    
    // Auto-selección de combos con las opciones correspondientes
    $("#aplicacion_id").select2('val', $("#id_aplicacion").val());
    $("#tienda_id").select2('val', $("#id_tienda").val());
	
	$("#costo_dolar,#costo_bolivar").numeric(); //Valida solo permite valores numéricos

    $("#edit").click(function (e) {

        e.preventDefault();  // Para evitar que se envíe por defecto
        
        var regex = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;

        if ($('#nombre').val().trim() === "") {
			swal("Disculpe,", "para continuar debe ingresar nombre");
			$('#nombre').parent('div').addClass('has-error');
			
        } else if ($('#url').val().trim() != "" && !(regex.test($('#url').val().trim()))) {
			swal("Disculpe,", "la url no es válida");
			$('#url').parent('div').addClass('has-error');
			
        } else if ($('#url_callback').val().trim() != "" && !(regex.test($('#url_callback').val().trim()))){
			
			swal("Disculpe,", "la url no es válida");
			$('#url_callback').parent('div').addClass('has-error');
			$('#url_callback').focus();
			
		} else if ($('#tienda_id').val().trim() == "0" ){
			
			swal("Disculpe,", "para continuar debe seleccionar la tienda asociada");
			$('#tienda_id').parent('div').addClass('has-error');
			$('#tienda_id').focus();
			
		} else if ($('#aplicacion_id').val().trim() == "0" ){
			
			swal("Disculpe,", "para continuar debe seleccionar la aplicación");
			$('#aplicacion_id').parent('div').addClass('has-error');
			$('#aplicacion_id').focus();
			
		} else {

            //~ $.post('<?php echo base_url(); ?>CTiendasVirtuales/update', $('#form_tiendas').serialize(), function (response) {
				//~ if (response[0] == '1') {
                    //~ swal("Disculpe,", "este nombre se encuentra registrado");
                //~ }else{
					//~ swal({ 
						//~ title: "Actualizar",
						 //~ text: "Guardado con exito",
						  //~ type: "success" 
						//~ },
					//~ function(){
					  //~ window.location.href = '<?php echo base_url(); ?>productos';
					//~ });
				//~ }
            //~ });
            
            // Formateamos los precios para usar coma en vez de punto
            //~ $("#costo_dolar").val(String($("#costo_dolar").val()).replace('.',','));
            //~ $("#costo_bolivar").val(String($("#costo_bolivar").val()).replace('.',','));
            //~ 
            //~ alert($("#costo_dolar").val());
            //~ alert($("#costo_bolivar").val());
            
            var formData = new FormData(document.getElementById("form_tiendas"));  // Forma de capturar todos los datos del formulario
			
			$.ajax({
				//~ method: "POST",
				type: "post",
				dataType: "html",
				url: '<?php echo base_url(); ?>CTiendasVirtuales/update',
				data: formData,
				cache: false,
				contentType: false,
				processData: false
			})
			.done(function(data) {
				if(data.error){
					console.log(data.error);
				} else {
					if (data[0] == '1') {
						swal("Disculpe,", "esta tienda se encuentra registrada");
					}else{
						swal({ 
							title: "Registro",
							 text: "Actualizado con exito",
							  type: "success" 
							},
						function(){
						  window.location.href = '<?php echo base_url(); ?>tiendasv';
						});
					}
				}				
			}).fail(function() {
				console.log("error ajax");
			});
        }
    });
});

</script>
