<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Tiendas</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            
            <li>
                <a href="<?php echo base_url() ?>usuarios">Tiendas</a>
            </li>
            
            <li class="active">
                <strong>Registrar Tienda</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Registrar Tienda<small></small></h5>
					
				</div>
				<div class="ibox-content">
					<form id="form_tienda" method="post" accept-charset="utf-8" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label" >Rif *</label>
							<div class="col-sm-4">
								<input type="text" class="form-control"  maxlength="20" name="rif" id="rif">
							</div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label" >Nombre</label>
							<div class="col-sm-8">
								<input type="text" class="form-control"  name="name" maxlength="100" id="name">
							</div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label" >Dirección</label>
							<div class="col-sm-8">
								<input type="text" class="form-control"  name="address" maxlength="250" id="address">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Teléfono</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" maxlength="20" name="phone" id="phone">
							</div>
						</div>
						<br>
						<!-- Tabla de usuarios -->
						<hr>
						<div class="ibox-title">
							<h5>Asociar Usuarios <small></small></h5>
						</div>
						<div class="col-md-2">
							<label class="control-label" >Usuario</label>
							<select class="form-control" name="usuario_id" id="usuario_id">
								<option value="0" selected="">Seleccione</option>
								<?php foreach ($listar_usuarios as $usuario) { ?>
									<option value="<?php echo $usuario->id ?>"><?php echo $usuario->username; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-2">
							<label class="control-label" >Tipo</label>
							<select class="form-control" name="tipo" id="tipo">
								<option value="0" selected="">Seleccione</option>
								<option value="1">Administrador</option>
								<option value="2">Empleado</option>
							</select>
						</div>
						<div class="col-md-2">
							<label style="font-weight:bold"></label>
							<br>
							<button type="button" class="btn btn-w-m btn-primary" id="i_new_line"><i class="fa fa-plus"></i>&nbsp;Agregar Usuario</button>
						</div>
						<div class="table-responsive col-md-12">
							<table style="width: 100%" class="tab_usuarios table dataTable table-striped table-bordered dt-responsive jambo_table bulk_action" id="tab_usuarios">
								<thead>
									<tr>
										<th>Usuario</th>
										<th>Tipo</th>
										<th>Eliminar</th>
									</tr>
								</thead>
								<tbody>
									
								</tbody>
							</table>
						</div>
						<!-- Tabla de usuarios -->
						<br>
						<br>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-2">
								<!--<input type="hidden" id="codigos_des1" name="codigos_des1" placeholder="Códigos">-->
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
        url = '<?php echo base_url() ?>tiendas/';
        window.location = url;
    });
    
    //~ $("#costo_dolar,#costo_bolivar").numeric(); //Valida solo permite valores numéricos

    $("#registrar").click(function (e) {

        e.preventDefault();  // Para evitar que se envíe por defecto

        if ($('#rif').val().trim() === "") {
			swal("Disculpe,", "para continuar debe ingresar el rif");
			$('#rif').parent('div').addClass('has-error');
			
        } else if ($('#name').val().trim() == "") {
			swal("Disculpe,", "para continuar debe ingresar el nombre");
			$('#name').parent('div').addClass('has-error');
			
        } else if ($('#address').val().trim() == "") {
			swal("Disculpe,", "para continuar debe ingresar la dirección");
			$('#address').parent('div').addClass('has-error');
			
        } else if ($('#phone').val().trim() == "") {
			swal("Disculpe,", "para continuar debe ingresar el teléfono");
			$('#phone').parent('div').addClass('has-error');
			
        } else {
            
            var formData = new FormData(document.getElementById("form_tienda"));  // Forma de capturar todos los datos del formulario
			
			$.ajax({
				//~ method: "POST",
				type: "post",
				dataType: "html",
				url: '<?php echo base_url(); ?>CTiendas/add',
				data: formData,
				cache: false,
				contentType: false,
				processData: false
			})
			.done(function(response) {
				if(response.error){
					console.log(response.error);
				} else {
					if (response == 'existe') {
						swal("Disculpe,", "este usuario se encuentra registrado");
					}else{
						// Asociamos los usuarios a la tienda
						var data = [];
						$("#tab_usuarios tbody tr").each(function () {
							var id_usuario, tipo;
							if ($(this).attr('id') != undefined){
								id_usuario = $(this).attr('id').split(";");  // id tienda
								id_usuario = id_usuario[0];
								tipo = $(this).attr('id').split(";");  // tipo
								tipo = tipo[1];

								campos = { "id_usuario" : id_usuario, "tipo" : tipo}
								data.push(campos);
							}

						});
						
						// Registramos la asociación con los usuarios de la lista
						$.post('<?php echo base_url(); ?>CTiendas/associate_users', {'id_tienda':response, 'usuarios':data}, function (response2) {
							swal({
								title: "Registro",
								 text: "Guardado con exito",
								  type: "success" 
								},
							function(){
							  window.location.href = '<?php echo base_url(); ?>tiendas';
							});
						});
						
					}
				}				
			}).fail(function() {
				console.log("error ajax");
			});
        }
    });
    
    // Configuraciones de la lista de usuarios
    $('#tab_usuarios').DataTable({
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
			{"sWidth": "20%"},
			{"sWidth": "20%"},
			{"sWidth": "10%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false}
		]
	});
    
    // Función para agregar usuarios a la lista
    $("#i_new_line").click(function (e) {

        e.preventDefault();  // Para evitar que se envíe por defecto

        if ($('#usuario_id').val().trim() == "0") {
			swal("Disculpe,", "para continuar debe seleccionar un usuario");
			$('#usuario_id').parent('div').addClass('has-error');
			
        } else if ($('#tipo').val().trim() == "0") {
			swal("Disculpe,", "para continuar debe seleccionar el tipo de usuario");
			$('#tipo').parent('div').addClass('has-error');
			
        } else {
			
			var table = $('#tab_usuarios').DataTable();
			var usuario = $("#usuario_id").find('option').filter(':selected').text();
			var usuario_id = $("#usuario_id").val();
			var tipo = $("#tipo").find('option').filter(':selected').text();
            var tipo_id = $("#tipo").val();
			var botonQuitar = "<a  style='color: #1ab394' class='quitar'><i class='fa fa-trash fa-2x'></i></a>";
			
			// Añadimos el usuario a la tabla (primero verificamos si aún no está añadido)
			var num_apariciones = 0;
			var num_apariciones2 = 0;
			var num_apariciones3 = 0;
			$("#tab_usuarios tbody tr").each(function () {
				var id_usuario, id_tipo, usuario_tipo;
				usuario_tipo = $(this).attr('id');  // id usuario + tipo
				if (usuario_tipo != undefined){
					id_usuario = usuario_tipo.split(";");  // id usuario
					id_usuario = id_usuario[0];
					id_tipo = usuario_tipo.split(";");  // id usuario
					id_tipo = id_tipo[1];
					if(id_usuario == usuario_id){
						num_apariciones += 1;
					}
					if(usuario_tipo == usuario_id+";"+tipo_id){
						num_apariciones2 += 1;
					}
					if(id_tipo == '1'){
						num_apariciones3 += 1;
					}
				}
			});
			//~ if(num_apariciones == 0){
				//~ var i = table.row.add([usuario, tipo, botonQuitar]).draw();
				//~ table.rows(i).nodes().to$().attr("id", usuario_id+";"+tipo_id);
			//~ }else{
				//~ swal("Disculpe,", "el usuario ya se encuentra en la lista");
			//~ }
			if(num_apariciones == 1){
				swal("Disculpe,", "el usuario ya se encuentra en la lista");
			}else if(num_apariciones3 == 1 && tipo_id == '1'){
				swal("Disculpe,", "ya asignó un administrador para la tienda");
			}else{
				var i = table.row.add([usuario, tipo, botonQuitar]).draw();
				table.rows(i).nodes().to$().attr("id", usuario_id+";"+tipo_id);
			}
		}
	});
	
	//Método para eliminar un registro de la tabla
	$("table#tab_usuarios").on('click', 'a.quitar', function () {
		
		//~ var cod_reg = '';
//~ 
		//~ if ($(this).attr('id') !== undefined) {
//~ 
			//~ cod_reg = $(this).attr('id');
//~ 
//~ 
			//~ if ($("#codigos_des1").val() === '') {
				//~ $("#codigos_des1").val(cod_reg);
			//~ } else {
				//~ $("#codigos_des1").val($("#codigos_des1").val() + ',' + cod_reg);
			//~ }
//~ 
		//~ }

		var aPos = $("table#tab_usuarios").dataTable().fnGetPosition(this.parentNode.parentNode);
		$("table#tab_usuarios").dataTable().fnDeleteRow(aPos);

	});
	
});

</script>
