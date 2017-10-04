<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Productos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            <li class="active">
                <strong>Productos</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo base_url() ?>productos/register" id="agregar">
            <button class="btn btn-outline btn-primary dim" type="button"><i class="fa fa-plus"></i> Agregar</button>
            </a>
            <button class="btn btn-outline btn-primary dim" id="referenciar" type="button"><i class="fa fa-refresh"></i> Referenciar</button>
            <label id="label_precio_dolar" style="color:red;"></label>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Listado de Productos </h5>
                    <input type="hidden" id="precio_dolar">
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="tab_productos" class="table table-striped table-bordered dt-responsive table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="check_all"></th>
                                    <!--<th>#</th>-->
                                    <th>Nombre</th>
                                    <th>Referencia</th>
                                    <th>Costo en Dólares</th>
                                    <th>Costo en Bolívares</th>
                                    <!--<th>Unidad de medida</th>-->
                                    <th>Tienda</th>
                                    <th>Modificado</th>
                                    <th>Descripción</th>
                                    <th>Se compra</th>
                                    <th>Se vende</th>
                                    <th>Se fabrica</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <!--<tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($listar as $perfil) { ?>
                                    <tr style="text-align: center">
                                        <td>
                                            <input type="checkbox" id="checkbox_<?php echo $perfil->id;?>" class="check">
                                        </td>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $perfil->nombre; ?>
                                        </td>
                                        <td>
                                            <?php echo $perfil->referencia; ?>
                                        </td>
                                        <td id="checkbox_<?php echo $perfil->id;?>_column_dl">
                                            <?php echo $perfil->costo_dolar; ?>
                                        </td>
                                        <td id="checkbox_<?php echo $perfil->id;?>_column">
                                            <?php echo $perfil->costo_bolivar; ?>
                                        </td>
                                        <td id="unidad_<?php echo $perfil->unidad_medida?>">
                                            <?php 
											foreach ($listar_unidades as $unidad){
												if($perfil->unidad_medida == $unidad->id){
													echo $unidad->name." - ".$unidad->symbol;
												}else{
													echo "";
												}
											}
											?>
                                        </td>
                                        <td id="tienda_<?php echo $perfil->tienda_id?>">
                                            <?php 
											foreach ($listar_tiendas_fisicas as $tienda){
												if($perfil->tienda_id == $tienda->id){
													echo $tienda->name;
												}else{
													echo "";
												}
											}
											?>
                                        </td>
                                        <td>
                                            <?php echo $perfil->modificado; ?>
                                        </td>
                                        <td>
                                            <?php echo $perfil->descripcion; ?>
                                        </td>
                                        <td>
                                            <?php echo $perfil->c_compra; ?>
                                        </td>
                                        <td>
                                            <?php echo $perfil->c_vende; ?>
                                        </td>
                                        <td>
                                            <?php echo $perfil->c_fabrica; ?>
                                        </td>
                                        <td style='text-align: center'>
                                            <a href="<?php echo base_url() ?>productos/edit/<?= $perfil->id; ?>" title="Editar" style='color: #1ab394'><i class="fa fa-edit fa-2x"></i></a>
                                        </td>
                                        <td style='text-align: center'>
                                            <a class='borrar' id='<?php echo $perfil->id; ?>' style='color: #1ab394' title='Eliminar'><i class="fa fa-trash-o fa-2x"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php } ?>
                            </tbody>-->
                        </table>
                        
                        <div class="text-right">
							<!-- Imagen de carga -->
							<div class="col-md-6" style="display:none;" id="resultado">
								<div>
									<i class="fa fa-refresh fa-spin">
										
									</i>
									<span style="color:red !important;">Actualizando...</span>
								</div>
							</div>
							<!-- Imagen de carga -->
							<div class="col-md-6" style="display:block;" id="resultado">
								<button class="btn btn-outline btn-primary dim" id="actualizar_montos" type="button"><i class="fa fa-floppy-o"></i> Actualizar</button>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


 <!-- Page-Level Scripts -->
<script>
$(document).ready(function(){
	$('#tab_productos').DataTable({
        //~ "paging": true,
        //~ "lengthChange": false,
        "autoWidth": false,
        //~ "searching": true,
        //~ "ordering": true,
        //~ "info": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
			"method":"POST",
			"url": "<?= base_url() ?>productos_json"
		},
		"columnDefs": [
			{
				//~ "target": [0, 3, 4],
				"orderable":false,
			}
		],
        //~ "iDisplayLength": 50,
        //~ "iDisplayStart": 0,
        //~ "sPaginationType": "full_numbers",
        //~ "aLengthMenu": [50, 100, 150],
        "oLanguage": {"sUrl": "<?= assets_url() ?>js/es.txt"},
        //~ "columns": [
			//~ {"data":"nombre"},
			//~ {"data":"referencia"},
			//~ {"data":"costo_dolar"},
			//~ {"data":"costo_bolivar"},
			//~ {"data":"name"},
			//~ {"data":"modificado"},
			//~ {"data":"descripcion"},
			//~ {"data":"c_compra"},
			//~ {"data":"c_vende"},
			//~ {"data":"c_fabrica"}
        //~ ],
        "aoColumns": [
            {"sWidth": "3%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false},
            {"sClass": "registro center", "sWidth": "20%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "registro center", "sWidth": "20%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "none", "sWidth": "20%"},
            {"sClass": "none", "sWidth": "10%"},
            {"sClass": "none", "sWidth": "10%"},
            {"sClass": "none", "sWidth": "10%"},
            {"sWidth": "3%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false},
            {"sWidth": "3%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false}
        ]
    });
    
    // Lectura de elementos del paginador
    //~ $(".pagination").ready(function(){
		//~ $('.pagination li').each(function(){
			//~ if($(this).attr("id")){		
				//~ alert($(this).attr("id"));
			//~ }
			//~ alert($(this).text());
		//~ });
	//~ });    
    
    // Cargamos el precio actual del dólar en el campo oculto 'precio_dolar'
    $.get('https://s3.amazonaws.com/dolartoday/data.json', function (response) {  // Se produce un error si usamos $.post en vez de $.get
		//~ alert(response['USD']['transferencia']);
		var precio_dolar = response['USD']['transferencia'];
		$("#precio_dolar").val(precio_dolar);
		$("#label_precio_dolar").text("**Precio actual del dólar("+precio_dolar+")");
	}, 'json');
             
    // Validacion para borrar
    $("table#tab_productos").on('click', 'a.borrar', function (e) {
        e.preventDefault();
        var id = this.getAttribute('id');

        swal({
            title: "Borrar registro",
            text: "¿Está seguro de borrar el registro?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Eliminar",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            closeOnCancel: true
          },
        function(isConfirm){
            if (isConfirm) {
             
                $.post('<?php echo base_url(); ?>productos/delete/' + id + '', function (response) {

                    if (response[0] == "e") {
                       
                         swal({ 
                           title: "Disculpe,",
                            text: "No se puede eliminar se encuentra asociado a un usuario",
                             type: "warning" 
                           },
                           function(){
                             
                         });
                    }else{
                         swal({ 
                           title: "Eliminar",
                            text: "Registro eliminado con exito",
                             type: "success" 
                           },
                           function(){
                             window.location.href = '<?php echo base_url(); ?>productos';
                         });
                    }
                });
            } 
        });
    });
    
    // Función para marcar/desmarcar los inputs y volver editable o no las celdas de Costo en Dólares y Costo en Bolívares
	$("table#tab_productos").on('change', 'input#check_all', function (e) {
		e.preventDefault();
		
		var check = $(this);
		
		//~ alert(check.prop('checked'));  // Saber si el campo está marcado o no
		
		var accion = '';
		if (check.is(':checked')) {
            accion = 'marcar';
            check.prop("checked", "checked");  // Marcamos nuevamente el checkbox
            // Recorremos la tabla marcando todos los checkbox y convirtiendo las columnas de costos en inputs editables
            $("#tab_productos tbody tr").each(function () {
				$(this).find('td').find('input').prop("checked", "checked");
				var id_dl = $(this).find('span').eq(0).attr('id');  // Id de la columna de dólares
				id_dl = id_dl.replace("checkbox", "input");
				var id_new_input_dl = "id='"+id_dl+"'"  // Asignamos un id al input compuesto del id del td padre pero reemplazando el prefijo 'checkbox' por 'input'
				var id_bs = $(this).find('span').eq(1).attr('id');  // Id de la columna de bolívares
				id_bs = id_bs.replace("checkbox", "input");
				var id_new_input_bs = "id='"+id_bs+"'"  // Asignamos un id al input compuesto del id del td padre pero reemplazando el prefijo 'checkbox' por 'input'
				// Campos de costos en dólares
				var valor_dl = $(this).find('span').eq(0).text();
				if(valor_dl == ""){
					valor_dl = $(this).find('span').eq(0).find('input').val();
					$(this).find('span').eq(0).html("<input "+id_new_input_dl+" type='text' value='"+valor_dl.trim()+"' size='8px' onChange='referenciar(\""+id_dl+"\")'>");
					$(this).find('span').eq(0).find('input').numeric();
				}else{
					$(this).find('span').eq(0).html("<input "+id_new_input_dl+" type='text' value='"+valor_dl.trim()+"' size='8px' onChange='referenciar(\""+id_dl+"\")'>");
					$(this).find('span').eq(0).find('input').numeric();
				}
				// Campos de costos en bolívares
				var valor_bs = $(this).find('span').eq(1).text();
				if(valor_bs == ""){
					valor_bs = $(this).find('span').eq(1).find('input').val()
					$(this).find('span').eq(1).html("<input "+id_new_input_bs+" type='text' value='"+valor_bs.trim()+"' size='8px'>");
					$(this).find('span').eq(1).find('input').numeric();
				}else{
					$(this).find('span').eq(1).html("<input "+id_new_input_bs+" type='text' value='"+valor_bs.trim()+"' size='8px'>");
					$(this).find('span').eq(1).find('input').numeric();
				}
			});
        }else{
			accion = 'desmarcar';
			//~ alert(accion);
			check.prop("checked", "");  // Desmarcamos nuevamente el checkbox
			// Recorremos la tabla desmarcando todos los checkbox y convirtiendo las columnas de costos en texto plano
            $("#tab_productos tbody tr").each(function () {
				$(this).find('td').find('input').prop("checked", "");
				// Campos de costos en dólares				
				var valor_dl = $(this).find('span').eq(0).find('input').val();
				//~ alert(valor_dl);
				$(this).find('span').eq(0).text(valor_dl);
				// Campos de costos en bolívares
				var valor_bs = $(this).find('span').eq(1).find('input').val();
				//~ alert(valor_bs);
				$(this).find('span').eq(1).text(valor_bs);
			});
		}
	});
	
	// Función para marcar/desmarcar un input seleccionado y volver editable o no las celdas de Costo en Dólares y Costo en Bolívares correspondiente
	$("table#tab_productos").on('change', 'input.check', function (e) {
		e.preventDefault();
        var id = this.getAttribute('id');
        var id_column = id+"_column";
        var column = $("#"+id_column);
        var id_column_dl = id+"_column_dl";
        var column_dl = $("#"+id_column_dl);
                
        //~ alert(id_column);
        
        // Ids para los inputs de edición de montos
        var id_dl = id_column_dl.replace("checkbox", "input");  // Id de la columna de dólares		
		var id_new_input_dl = "id='"+id_dl+"'"  // Asignamos un id al input compuesto del id del checkbox marcado pero reemplazando el prefijo 'checkbox' por 'input'
		var id_bs = id_column.replace("checkbox", "input");  // Id de la columna de bolívares		
		var id_new_input_bs = "id='"+id_bs+"'"  // Asignamos un id al input compuesto del id del checkbox marcado pero reemplazando el prefijo 'checkbox' por 'input'
		
        var check = $(this);
		
		//~ alert(check.prop('checked'));  // Saber si el campo está marcado o no
		
		var accion = '';
		if (check.is(':checked')) {
            accion = 'marcar';
            //~ alert(accion);
            check.prop("checked", "checked");  // Marcamos nuevamente el checkbox
            // Volvemos editable las columnas correspondientes
            // Columna de precio en dólares
			var valor_dl = column_dl.text();
            column_dl.html("<input "+id_new_input_dl+" type='text' value='"+valor_dl.trim()+"' size='8px' onChange='referenciar(\""+id_dl+"\")'>");
            column_dl.find('input').numeric();
			// Columna de precio en bolívares
			var valor_bs = column.text();
            column.html("<input "+id_new_input_bs+" type='text' value='"+valor_bs.trim()+"' size='8px'>");
            column.find('input').numeric();
        }else{
			accion = 'desmarcar';
			//~ alert(accion);
			check.prop("checked", "");  // Desmarcamos nuevamente el checkbox
			// Volvemos no editable las columnas correspondientes
			// Columna de precio en dólares
			var valor_dl = column_dl.find('input').val();
            column_dl.text(valor_dl);
            // Columna de precio en bolívares
			var valor_bs = column.find('input').val();
            column.text(valor_bs);
		}
	});
	
	// Proceso de referenciación de montos según el precio actual del dólar 
	$("#referenciar").on('click', function (e) {
		var num_checked = 0;  // Contador de checkbox marcados
		var precio_dolar = $("#precio_dolar").val();  // Capturamos el precio del dólar previamente cargado en el campo oculto 'precio_dolar'
		
		// Recorremos la tabla para verificar que campos están editables y proceder a referenciarles el monto
		$("#tab_productos tbody tr").each(function () {
			var checkbox;
			checkbox = $(this).find('td').eq(0).find('input');
			
			if (checkbox.is(':checked')) {
				num_checked += 1;
				// Captura del costo del material en dólares teniendo en cuenta si está en un input o es texto plano
				if($(this).find('span').eq(0).find('input').val().trim() == undefined){
					var costo_mat_dolar = $(this).find('span').eq(0).text();
				}else{
					var costo_mat_dolar = $(this).find('span').eq(0).find('input').val();
				}
				var valor_referencial = parseFloat(costo_mat_dolar) * precio_dolar;
				// Indicamos el monto referencial
				$(this).find('span').eq(1).find('input').val(valor_referencial.toFixed(2));
			}
		});
		
		//~ alert(num_checked);
		
		if (num_checked == 0) {
			swal("Disculpe,", "no ha marcado ningún elemento de la lista");			
        }
	});
	
	
	// Proceso de actualización de montos de los materiales seleccionados
	$("#actualizar_montos").on('click', function (e) {
		var num_checked = 0;  // Contador de checkbox marcados
		
		// Recorremos la tabla para contar los registros con los campos de precios editables
		$("#tab_productos tbody tr").each(function () {
			var checkbox;
			checkbox = $(this).find('td').eq(0).find('input');
			
			if (checkbox.is(':checked')) {
				num_checked += 1;
			}
		});
		
		if (num_checked == 0) {
			swal("Disculpe,", "no ha marcado ningún elemento de la lista");
			$('#resultado').css({display:'none'});
			$('#agregar').prop('disabled',false);
			$('#referenciar').prop('disabled',false);		
		}else{
		
			swal({
				title: "Actualizar productos",
				text: "¿Está seguro de actualizar los montos de los productos?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Actualizar",
				cancelButtonText: "Cancelar",
				closeOnConfirm: false,
				closeOnCancel: true
			  },
			function(isConfirm){
				if (isConfirm) {
					
					var data = [];  // Arreglo para productos a actualizar
					// Recorremos la tabla para verificar qué campos están editables y proceder a incluirlos en el arreglo
					$("#tab_productos tbody tr").each(function () {
						var checkbox;
						checkbox = $(this).find('td').eq(0).find('input');
						
						if (checkbox.is(':checked')) {
							var id = $(this).find('td').eq(12).find('a').attr('id');
							var nombre = $(this).find('td').eq(1).text().trim();
							var referencia = $(this).find('td').eq(2).text().trim();
							var costo_dolar = $(this).find('span').eq(0).find('input').val().trim();
							var costo_bolivar = $(this).find('span').eq(1).find('input').val().trim();
							//~ var tienda_id = $(this).find('td').eq(6).attr('id');
							//~ tienda_id = tienda_id.split('_');
							//~ tienda_id = tienda_id[1];
							var c_compra = $(this).find('td').eq(8).text().trim();
							var c_vende = $(this).find('td').eq(9).text().trim();
							var c_fabrica = $(this).find('td').eq(10).text().trim();
							
							campos = { 
								'id' : id,
								'nombre' : nombre,
								'referencia' : referencia,
								'costo_dolar' : costo_dolar,
								'costo_bolivar' : costo_bolivar,
								'c_compra' : c_compra,
								'c_vende' : c_vende,
								'c_fabrica' : c_fabrica
							}
							data.push(campos);
						}
					});
					
					console.log(data);
					
					$.ajax({
						url : '<?php echo base_url(); ?>CProductos/update_list',
						type : 'POST',
						async: false,  // Para que no proceda con las siguientes instrucciones hasta terminar la petición
						//~ dataType : 'json',
						data : {'productos' : data},
						beforeSend:function(objeto){
							$('#resultado').css({display:'block'});
							$('#agregar').prop('disabled',true);
							$('#referenciar').prop('disabled',true);
						},
						success : function(response) {
							
							$('#resultado').css({display:'none'});
							$('#agregar').prop('disabled',false);
							$('#referenciar').prop('disabled',false);
							swal({
								title: "Actualización",
								 text: "Actualizado con exito",
								  type: "success" 
								},
							function(){
								// Reiniciamos
								window.location.href = '<?php echo base_url(); ?>productos';
							});
															
						},
					});
					
				}
			});  // Cierre del confirm
			
		}  // Cierre del if que valida si hay checkbox marcados
		
	});
	
});

// Función para referenciar del precio en bolívares al cambiar el precio en dólares de algún producto
function referenciar(id_input_dl){
	var precio_dolar = $("#precio_dolar").val();  // Capturamos el precio del dólar previamente cargado en el campo oculto 'precio_dolar'
	//~ var precio_dolar = 22938.23;  // Prueba con valor estático
	
	var input_dolar = $("#"+id_input_dl).val();  // Capturamos el precio en dólares del producto modificado
	// Preparamos el input del precio en bolívares
	var id_input_bolivar = id_input_dl.replace("_dl","");
	var input_bolivar = $("#"+id_input_bolivar);
	
	// Calculamos el nuevo precio y lo asinamos al input de monto en bolívares correspondiente al producto
	var valor_referencial = parseFloat(input_dolar) * precio_dolar;
	input_bolivar.val(valor_referencial.toFixed(2));
}
        
</script>
