<style>
	th {
		text-align:center !important;
	}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Productos </h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Inicio</a>
            </li>
            
            <li>
                <a href="<?php echo base_url() ?>productos">Productos</a>
            </li>
           
            <li class="active">
                <strong>Editar Producto</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Editar Producto <small></small></h5>
				</div>
				<div class="ibox-content">
					<form id="form_productos" method="post" accept-charset="utf-8" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label" >Nombre *</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nombre" id="nombre" maxlength="150" value="<?php echo $editar[0]->nombre ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Referencia *</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="referencia" id="referencia" maxlength="150" value="<?php echo $editar[0]->referencia ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Precio en Dólares *</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="costo_dolar" id="costo_dolar" maxlength="11" value="<?php echo $editar[0]->costo_dolar ?>">
								<label id="label_precio_dolar" style="color:red;"></label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Precio en Bolívares *</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="costo_bolivar" id="costo_bolivar" maxlength="11" value="<?php echo $editar[0]->costo_bolivar ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Unidades de medida *</label>
							<div class="col-sm-6">
								<select class="form-control m-b" name="unidad_medida" id="unidad_medida">
									<option value="0" selected="">Seleccione</option>
									<?php foreach ($listar_unidades as $unidad) { ?>
										<option value="<?php echo $unidad->id ?>"><?php echo $unidad->name." - ".$unidad->symbol; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<!--<div class="form-group">
							<label class="col-sm-2 control-label" >Tienda *</label>
							<div class="col-sm-6">
								<select class="form-control m-b" name="tiendav_id" id="tiendav_id">
									<option value="0" selected="">Seleccione</option>
									<?php foreach ($listar_tiendas as $tienda) { ?>
										<option value="<?php echo $tienda->id ?>"><?php echo $tienda->nombre; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>-->
						<div class="form-group">
							<label class="col-sm-2 control-label" >Se compra:</label>
							<div class="col-sm-1">
								<input type="checkbox" class="form-control" name="c_compra" id="c_compra" <?php if($editar[0]->c_compra == 1){ echo "checked='checked'"; }?>>
							</div>
							<label class="col-sm-2 control-label" >Se vende:</label>
							<div class="col-sm-1">
								<input type="checkbox" class="form-control" name="c_vende" id="c_vende" <?php if($editar[0]->c_vende == 1){ echo "checked='checked'"; }?>>
							</div>
							<label class="col-sm-2 control-label" >Se fabrica:</label>
							<div class="col-sm-1">
								<input type="checkbox" class="form-control" name="c_fabrica" id="c_fabrica" <?php if($editar[0]->c_fabrica == 1){ echo "checked='checked'"; }?>>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Modificado *</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="modificado" id="modificado" readonly="true" value="<?php echo $editar[0]->modificado ?>">
							</div>
						</div>
						<br>
						<!-- Tabla de tiendas -->
						<hr>
						<div class="ibox-title">
							<h5>Asociar Tiendas <small></small></h5>
						</div>
						<div class="col-md-2">
							<label class="control-label" >Tienda</label>
							<select class="form-control" name="tiendav_id" id="tiendav_id">
								<option value="0" selected="">Seleccione</option>
								<?php foreach ($listar_tiendas as $tienda) { ?>
									<option value="<?php echo $tienda->id ?>"><?php echo $tienda->nombre; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-2">
							<label class="control-label" >Referencia</label>
							<input type="text" class="form-control input-sm" name="referencia_tienda" id="referencia_tienda">
						</div>
						<div class="col-md-2">
							<label class="control-label" >Precio</label>
							<input type="text" class="form-control input-sm" name="precio" id="precio" value="<?php echo $editar[0]->costo_bolivar ?>">
						</div>
						<div class="col-md-2">
							<label class="control-label" >Cantidad</label>
							<input type="text" class="form-control input-sm" name="cantidad" id="cantidad" value="1">
						</div>
						<div class="col-md-2">
							<label style="font-weight:bold"></label>
							<br>
							<button type="button" class="btn btn-w-m btn-primary" id="i_new_line"><i class="fa fa-plus"></i>&nbsp;Agregar Tienda</button>
						</div>
						<div class="table-responsive col-md-12">
							<table style="width: 100%" class="tab_tiendas table dataTable table-striped table-bordered dt-responsive jambo_table bulk_action" id="tab_tiendas">
								<thead>
									<tr>
										<th>Tienda</th>
										<!--<th>Precio</th>
										<th>Impuesto</th>-->
										<th>Referencia</th>
										<th>Precio</th>
										<th>Cantidad</th>
										<th>Eliminar</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($tiendas_asociadas as $tienda) { ?>
										<tr id="<?php echo $tienda->tiendav_id; ?>">
											<td style='text-align: center' id="<?php echo $tienda->id; ?>">
											<?php foreach ($listar_tiendas as $tienda2) {
												if ($tienda->tiendav_id == $tienda2->id){
													echo $tienda2->nombre."<br>";
												}
											}?></td>
											<td style='text-align: center'><?php echo $tienda->referencia; ?></td>
											<td style='text-align: center'><?php echo $tienda->precio; ?></td>
											<td style='text-align: center'><?php echo $tienda->cantidad; ?></td>
											<td style='text-align: center'><a  style="color: #1ab394" class='quitar' id="<?php echo $tienda->id; ?>"><i class='fa fa-trash fa-2x'></i></a></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<!-- Tabla de tiendas -->
						<br>
						<br>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-2">
								<!--Campo para almacenar los códigos de los registros a desasociar-->
                                <input type="hidden" id="codigos_des1" name="codigos_des1" placeholder="Códigos">
								<input class="form-control"  type='hidden' id="id" name="id" value="<?php echo $id ?>"/>
								<input id="id_unidad_medida" type="hidden" value="<?php echo $editar[0]->unidad_medida ?>"/>
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
        url = '<?php echo base_url() ?>productos/';
        window.location = url;
    });
    
    // Auto-selección de combos con las opciones correspondientes
    $("#unidad_medida").select2('val', $("#id_unidad_medida").val());
    //~ $("#tiendav_id").select2('val', $("#id_tienda").val());
	
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
	
	$('#tab_tiendas').DataTable({
		"bLengthChange": false,
		"iDisplayLength": 10,
		"iDisplayStart": 0,
		destroy: true,
		paging: false,
		searching: false,
		"order": [[0, "asc"]],
		"pagingType": "full_numbers",
		"language": {"url": "<?= assets_url() ?>js/es.txt"},
		"aoColumns": [
			{"sWidth": "30%"},
			{"sWidth": "20%"},
			{"sWidth": "20%"},
			{"sWidth": "20%"},
			//~ {"sWidth": "8%"},
			//~ {"sWidth": "4%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false},
			{"sWidth": "10%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false}
		]
	});
	
    $("#edit").click(function (e) {

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
			$('#unidad_medida').focus();
			
        } /*else if ($('#tiendav_id').val().trim() == "0") {
			swal("Disculpe,", "para continuar debe seleccionar la tienda");
			$('#tiendav_id').parent('div').addClass('has-error');
			
        }*/ else {
            
            // Formateamos los precios para usar coma en vez de punto
            //~ $("#costo_dolar").val(String($("#costo_dolar").val()).replace('.',','));
            //~ $("#costo_bolivar").val(String($("#costo_bolivar").val()).replace('.',','));
            //~ 
            //~ alert($("#costo_dolar").val());
            //~ alert($("#costo_bolivar").val());
            
            $.post('<?php echo base_url(); ?>CProductos/update', $("#form_productos").serialize(), function (response) {
				if (response[0] == '1') {
					swal("Disculpe,", "este producto se encuentra registrado");
				}else{
					// Asociamos las tiendas al producto
					var data = [];
					$("#tab_tiendas tbody tr").each(function () {
						var id_tienda, tienda_text, referencia_t;
						id_tienda = $(this).attr('id');  // id tienda
						tienda_text = $(this).find('td').eq(0).attr('id'); //text tienda
						referencia_t = $(this).find('td').eq(1).text();
						precio = $(this).find('td').eq(2).text();
						cantidad = $(this).find('td').eq(3).text();

						campos = { "id_tienda" : id_tienda, "tienda" : tienda_text, "referencia" : referencia_t, "precio" : precio, "cantidad" : cantidad }
						data.push(campos);

					});
					
					// Borramos la asociación con las tiendas quitadas de la lista
					if ($("#codigos_des1").val() != '') {
						$.post('<?php echo base_url(); ?>CProductos/unassociate_stores', {'id_producto':$("#id").val(), 'codigos_des1':$("#codigos_des1").val()}, function (response2) {
						
						});
					}
					
					// Registramos la asociación con las tiendas de la lista
					$.post('<?php echo base_url(); ?>CProductos/associate_stores', {'id_producto':$("#id").val(), 'tiendas':data}, function (response2) {
						swal({
							title: "Registro",
							 text: "Actualizado con exito",
							  type: "success" 
							},
						function(){						
							// Reiniciamos
							window.location.href = '<?php echo base_url(); ?>productos';
						});
					});
				}
			});
        }
    });
    
    $("#i_new_line").click(function (e) {

        e.preventDefault();  // Para evitar que se envíe por defecto

        if ($('#tiendav_id').val().trim() == "0") {
			swal("Disculpe,", "para continuar debe seleccionar una tienda");
			$('#tiendav_id').parent('div').addClass('has-error');
			
        } else if ($('#referencia_tienda').val().trim() == "") {
			swal("Disculpe,", "para continuar debe ingresar la referencia de la tienda");
			$('#referencia_tienda').parent('div').addClass('has-error');
			
        } else {
			
			var table = $('#tab_tiendas').DataTable();
			var tienda = $("#tiendav_id").find('option').filter(':selected').text();
			var tiendav_id = $("#tiendav_id").val();
            var referencia_tienda = $("#referencia_tienda").val();
            var precio = $("#precio").val();
            if($("#precio").val().trim() == "" || $("#precio").val().trim() == 0){
				precio = $('#costo_bolivar').val().trim();
			}
            var cantidad = $("#cantidad").val();
            if($("#cantidad").val().trim() == "" || $("#cantidad").val().trim() == 0){
				cantidad = 1;
			}
			var botonQuitar = "<a  style='color: #1ab394' class='quitar'><i class='fa fa-trash fa-2x'></i></a>";
			
			// Añadimos la tienda a la tabla (primero verificamos si aún no está añadida)
			var num_apariciones = 0;
			$("#tab_tiendas tbody tr").each(function () {
				var id_tienda;
				id_tienda = $(this).attr('id');  // id tienda
				if(id_tienda == tiendav_id){
					num_apariciones += 1;
				}
			});
			if(num_apariciones == 0){
				var i = table.row.add([tienda, referencia_tienda, precio, cantidad, botonQuitar]).draw();
				table.rows(i).nodes().to$().attr("id", tiendav_id);
			}else{
				swal("Disculpe,", "la tienda ya se encuentra en la lista");
			}
		}
	});
	
	//Método para eliminar un registro de la tabla
	$("table#tab_tiendas").on('click', 'a.quitar', function () {
		
		var cod_reg = '';

		if ($(this).attr('id') !== undefined) {

			cod_reg = $(this).attr('id');


			if ($("#codigos_des1").val() === '') {
				$("#codigos_des1").val(cod_reg);
			} else {
				$("#codigos_des1").val($("#codigos_des1").val() + ',' + cod_reg);
			}

		}

		var aPos = $("table#tab_tiendas").dataTable().fnGetPosition(this.parentNode.parentNode);
		$("table#tab_tiendas").dataTable().fnDeleteRow(aPos);

	});
	
});

</script>
