<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Productos </h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            
            <li>
                <a href="<?php echo base_url() ?>productos">Productos</a>
            </li>
            
            <li class="active">
                <strong>Registrar Producto</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Registrar Producto <small></small></h5>
					
				</div>
				<div class="ibox-content">
					<form id="form_productos" method="post" accept-charset="utf-8" class="form-horizontal">
						<ul class="nav nav-tabs">
						  <li class="active"><a data-toggle="tab" href="#home">Datos</a></li>
						  <li><a data-toggle="tab" href="#disponibilidad">Disponibilidad</a></li>
						  <li><a data-toggle="tab" href="#menu1">Fotos</a></li>
						</ul>

						<div class="tab-content">
							
							<!-- Datos -->
							<div id="home" class="tab-pane fade in active">
								<br>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label" >Nombre *</label>
										<div class="col-sm-10">
											<input type="text" class="form-control"  maxlength="100" name="nombre" id="nombre">
										</div>
									</div>
									<div class="form-group"><label class="col-sm-2 control-label" >Referencia *</label>
										<div class="col-sm-10">
											<input type="text" class="form-control"  name="referencia" maxlength="150" id="referencia">
										</div>
									</div>
									<div class="form-group"><label class="col-sm-2 control-label" >Descripción</label>
										<div class="col-sm-10">
											<!--<input type="text" class="form-control"  name="descripcion" maxlength="150" id="descripcion">-->
											<textarea name="descripcion" id="descripcion" cols="52"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" >Tienda *</label>
										<div class="col-sm-10">
											<select class="form-control m-b" name="tienda_id" id="tienda_id">
												<option value="0" selected="">Seleccione</option>
												<?php foreach ($listar_tiendas_fisicas as $tienda) { ?>
													<option value="<?php echo $tienda->id ?>"><?php echo $tienda->rif." - ".$tienda->name; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group"><label class="col-sm-2 control-label" >Precio en Dólares *</label>
										<div class="col-sm-10">
											<input type="text" class="form-control"  name="costo_dolar" maxlength="11" id="costo_dolar">
											<label id="label_precio_dolar" style="color:red;"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Precio en Bolívares *</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" maxlength="11" name="costo_bolivar" id="costo_bolivar">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" >Unidades de medida *</label>
										<div class="col-sm-10">
											<select class="form-control m-b" name="unidad_medida" id="unidad_medida">
												<option value="0" selected="">Seleccione</option>
												<?php foreach ($listar_unidades as $unidad) { ?>
													<option value="<?php echo $unidad->id ?>"><?php echo $unidad->name." - ".$unidad->symbol; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
							</div>
							
							<!-- Disponibilidad -->
							<div id="disponibilidad" class="tab-pane fade">
								<br>
								<div class="form-group col-lg-12">
									<label class="col-sm-2 control-label" >Se compra:</label>
									<div class="col-sm-1">
										<input type="checkbox" class="form-control" name="c_compra" id="c_compra">
									</div>
								</div>
								<div class="form-group col-lg-12">
									<label class="col-sm-2 control-label" >Se vende:</label>
									<div class="col-sm-1">
										<input type="checkbox" class="form-control" name="c_vende" id="c_vende">
									</div>
								</div>
								<div class="form-group col-lg-12">
									<label class="col-sm-2 control-label" >Se fabrica:</label>
									<div class="col-sm-1">
										<input type="checkbox" class="form-control" name="c_fabrica" id="c_fabrica">
									</div>
								</div>
							</div>
							
							<!-- Fotos -->
							<div id="menu1" class="tab-pane fade">
								<br>
								<div class="col-lg-6">
									<div class="form-group"><label class="col-sm-2 control-label" >Foto Principal</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" name="imagen[]" onChange="valida_tipo($(this))">
										</div>
									</div>
									<div class="form-group"><label class="col-sm-2 control-label" >Foto 2</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" name="imagen[]" onChange="valida_tipo($(this))">
										</div>
									</div>
									<div class="form-group"><label class="col-sm-2 control-label" >Foto 3</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" name="imagen[]" onChange="valida_tipo($(this))">
										</div>
									</div>
									<div class="form-group"><label class="col-sm-2 control-label" >Foto 4</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" name="imagen[]" onChange="valida_tipo($(this))">
										</div>
									</div>
									<div class="form-group"><label class="col-sm-2 control-label" >Foto 5</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" name="imagen[]" onChange="valida_tipo($(this))">
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group"><label class="col-sm-2 control-label" >Foto 6</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" name="imagen[]" onChange="valida_tipo($(this))">
										</div>
									</div>
									<div class="form-group"><label class="col-sm-2 control-label" >Foto 7</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" name="imagen[]" onChange="valida_tipo($(this))">
										</div>
									</div>
									<div class="form-group"><label class="col-sm-2 control-label" >Foto 8</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" name="imagen[]" onChange="valida_tipo($(this))">
										</div>
									</div>
									<div class="form-group"><label class="col-sm-2 control-label" >Foto 9</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" name="imagen[]" onChange="valida_tipo($(this))">
										</div>
									</div>
									<div class="form-group"><label class="col-sm-2 control-label" >Foto 10</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" name="imagen[]" onChange="valida_tipo($(this))">
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<!-- Enviar-->
						<div class="form-group">
							<div class="col-sm-12">
								<button class="btn btn-white" id="volver" type="button">Volver</button>
								<button class="btn btn-primary" id="registrar" type="submit">Guardar</button>
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
        url = '<?php echo base_url() ?>productos/';
        window.location = url;
    });
    
    $("#costo_dolar,#costo_bolivar").numeric(); //Valida solo permite valores numéricos
    
    // Indicamos el precio actual del dólar en la etiqueta informativa debajo del campo de Precio en Dólares
    $.get('https://s3.amazonaws.com/dolartoday/data.json', function (response) {  // Se produce un error si usamos $.post en vez de $.get
		//~ alert(response['USD']['transferencia']);
		var precio_dolar = response['USD']['transferencia'];
		$("#label_precio_dolar").text("**Precio actual del dólar("+precio_dolar+")");
	}, 'json');

	// Convertimos el valor en dólares a bolívares
	$("#costo_dolar").change(function (e) {
		e.preventDefault();  // Para evitar que se envíe por defecto
		
		$.get('https://s3.amazonaws.com/dolartoday/data.json', function (response) {  // Se produce un error si usamos $.post en vez de $.get
			//~ alert(response['USD']['transferencia']);
			var dolar_bolivar = parseFloat($("#costo_dolar").val()) * response['USD']['transferencia'];
			$("#costo_bolivar").val(dolar_bolivar.toFixed(2));
		}, 'json');
	});

    $("#registrar").click(function (e) {

        e.preventDefault();  // Para evitar que se envíe por defecto

        if ($('#nombre').val().trim() === "") {
			swal("Disculpe,", "para continuar debe ingresar nombre");
			$('#nombre').parent('div').addClass('has-error');
			
        } else if ($('#referencia').val().trim() === "") {
			swal("Disculpe,", "para continuar debe ingresar la referencia");
			$('#referencia').parent('div').addClass('has-error');
			
        } else if ($('#costo_dolar').val().trim() === "") {
			swal("Disculpe,", "para continuar debe ingresar el costo en dólares");
			$('#costo_dolar').parent('div').addClass('has-error');
			
        } else if ($('#costo_bolivar').val().trim() === "") {
			swal("Disculpe,", "para continuar debe ingresar el costo en bolívares");
			$('#costo_bolivar').parent('div').addClass('has-error');
			
        } else if ($('#unidad_medida').val().trim() == "0") {
			swal("Disculpe,", "para continuar debe seleccionar la unidad de medida");
			$('#unidad_medida').parent('div').addClass('has-error');
			
        } else if ($('#tienda_id').val().trim() == "0") {
			swal("Disculpe,", "para continuar debe seleccionar la tienda");
			$('#tienda_id').parent('div').addClass('has-error');
			
        } else {
            
            // Formateamos los precios para usar coma en vez de punto
            //~ $("#costo_dolar").val(String($("#costo_dolar").val()).replace('.',','));
            //~ $("#costo_bolivar").val(String($("#costo_bolivar").val()).replace('.',','));
            //~ 
            //~ alert($("#costo_dolar").val());
            //~ alert($("#costo_bolivar").val());
            
            var formData = new FormData(document.getElementById("form_productos"));  // Forma de capturar todos los datos del formulario
			
			$.ajax({
				//~ method: "POST",
				type: "post",
				dataType: "html",
				url: '<?php echo base_url(); ?>CProductos/add',
				data: formData,
				cache: false,
				contentType: false,
				processData: false
			})
			.done(function(data) {
				if(data.error){
					console.log(data.error);
				} else {
					if (data == 'existe') {
						swal("Disculpe,", "este producto se encuentra registrado");
					}else{
						swal({ 
							title: "Registro",
							 text: "Guardado con exito",
							  type: "success" 
							},
						function(){
						  window.location.href = '<?php echo base_url(); ?>productos';
						});
					}
				}				
			}).fail(function() {
				console.log("error ajax");
			});
        }
    });
    
});

// Validamos que los archivos sean de tipo .jpg, jpeg o png
function valida_tipo(input) {
	
	var max_size = '';
	var archivo = input.val();
	
	var ext = archivo.split(".");
	ext = ext[1];
	
	if (ext != 'jpg' && ext != 'jpeg' && ext != 'png'){
		swal("Disculpe,", "sólo se admiten archivos .jpg, .jpeg y png");
		input.val('');
		input.parent('div').addClass('has-error');
	}else{
		input.parent('div').removeClass('has-error');
	}
};

</script>
