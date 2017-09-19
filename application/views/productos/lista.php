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
            <a href="<?php echo base_url() ?>productos/register">
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
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Referencia</th>
                                    <th>Costo en Dólares</th>
                                    <th>Costo en Bolívares</th>
                                    <th>Unidad de medida</th>
                                    <!--<th>Tienda</th>-->
                                    <th>Modificado</th>
                                    <th>Descripción</th>
                                    <th>Se compra</th>
                                    <th>Se vende</th>
                                    <th>Se fabrica</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                        <td>
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
                                        <!--<td id="tienda_<?php echo $perfil->tienda_id?>">
                                            <?php 
											foreach ($listar_tiendas as $tienda){
												if($perfil->tienda_id == $tienda->id){
													echo $tienda->nombre;
												}else{
													echo "";
												}
											}
											?>
                                        </td>-->
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
                            </tbody>
                        </table>
                        <div class="text-right">
							<button class="btn btn-outline btn-primary dim" id="actualizar_montos" type="button"><i class="fa fa-floppy-o"></i> Actualizar</button>
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
        "paging": true,
        "lengthChange": false,
        "autoWidth": false,
        "searching": true,
        "ordering": true,
        "info": true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            { extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},

            {extend: 'print',
             customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
            }
            }
        ],
        "iDisplayLength": 100,
        "iDisplayStart": 0,
        "sPaginationType": "full_numbers",
        "aLengthMenu": [100, 200, 300],
        "oLanguage": {"sUrl": "<?= assets_url() ?>js/es.txt"},
        "aoColumns": [
            {"sWidth": "3%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false},
            {"sClass": "registro center", "sWidth": "5%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "registro center", "sWidth": "20%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "registro center", "sWidth": "20%"},
            {"sClass": "none", "sWidth": "20%"},
            {"sClass": "none", "sWidth": "10%"},
            {"sClass": "none", "sWidth": "10%"},
            {"sClass": "none", "sWidth": "10%"},
            {"sWidth": "3%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false},
            {"sWidth": "3%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false}
        ]
    });
    
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
    
    // Función para marcar/desmarcar los inputs y volver editable o no las celdas de Costo en Bolívares
	$("table#tab_productos").on('change', 'input#check_all', function (e) {
		e.preventDefault();
		
		var check = $(this);
		
		//~ alert(check.prop('checked'));  // Saber si el campo está marcado o no
		
		var accion = '';
		if (check.is(':checked')) {
            accion = 'marcar';
            //~ alert(accion);
            check.prop("checked", "checked");  // Marcamos nuevamente el checkbox
            // Recorremos la tabla marcando todos los checkbox
            $("#tab_productos tbody tr").each(function () {
				$(this).find('td').find('input').prop("checked", "checked");
				var valor_bs = $(this).find('td').eq(5).text();
				//~ alert(valor_bs);
				if(valor_bs == ""){
					valor_bs = $(this).find('td').eq(5).find('input').val()
					$(this).find('td').eq(5).html("<input type='text' value='"+valor_bs.trim()+"' size='8px'>");
				}else{
					$(this).find('td').eq(5).html("<input type='text' value='"+valor_bs.trim()+"' size='8px'>");
				}
			});
        }else{
			accion = 'desmarcar';
			//~ alert(accion);
			check.prop("checked", "");  // Desmarcamos nuevamente el checkbox
			// Recorremos la tabla desmarcando todos los checkbox
            $("#tab_productos tbody tr").each(function () {
				$(this).find('td').find('input').prop("checked", "");				
				var valor_bs = $(this).find('td').eq(5).find('input').val();
				//~ alert(valor_bs);
				$(this).find('td').eq(5).text(valor_bs);
			});
		}
	});
	
	// Función para marcar/desmarcar un input seleccionado y volver editable o no la celda de Costo en Bolívares correspondiente
	$("table#tab_productos").on('change', 'input.check', function (e) {
		e.preventDefault();
        var id = this.getAttribute('id');
        var id_column = id+"_column";
        var column = $("#"+id_column);
        
        //~ alert(id_column);
        
        var check = $(this);
		
		//~ alert(check.prop('checked'));  // Saber si el campo está marcado o no
		
		var accion = '';
		if (check.is(':checked')) {
            accion = 'marcar';
            //~ alert(accion);
            check.prop("checked", "checked");  // Marcamos nuevamente el checkbox
            // Volvemos editable la columna correspondiente
			var valor_bs = column.text();
            column.html("<input type='text' value='"+valor_bs.trim()+"' size='8px'>");
        }else{
			accion = 'desmarcar';
			//~ alert(accion);
			check.prop("checked", "");  // Desmarcamos nuevamente el checkbox
			// Volvemos no editable la columna correspondiente
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
				var costo_mat_dolar = $(this).find('td').eq(4).text();  // Costo del material en dólares
				var valor_referencial = parseFloat(costo_mat_dolar) * precio_dolar;
				// Indicamos el monto referencial
				$(this).find('td').eq(5).find('input').val(valor_referencial.toFixed(2));
			}
		});
		
		//~ alert(num_checked);
		
		if (num_checked == 0) {
			swal("Disculpe,", "no ha marcado ningún elemento de la lista");			
        }
	});
	
	// Proceso de actualización de montos de los materiales seleccionados
	$("#actualizar_montos").on('click', function (e) {
		
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
		
				var num_checked = 0;  // Contador de checkbox marcados
				
				// Recorremos la tabla para verificar que campos están editables y proceder a actualizarles el monto
				$("#tab_productos tbody tr").each(function () {
					var checkbox;
					checkbox = $(this).find('td').eq(0).find('input');
					
					if (checkbox.is(':checked')) {
						num_checked += 1;
						var id = $(this).find('td').eq(13).find('a').attr('id');
						var nombre = $(this).find('td').eq(2).text().trim();
						var referencia = $(this).find('td').eq(3).text().trim();
						var costo_dolar = $(this).find('td').eq(4).text().trim();
						var costo_bolivar = $(this).find('td').eq(5).find('input').val().trim();
						var unidad_medida = $(this).find('td').eq(6).attr('id');
						unidad_medida = unidad_medida.split('_');
						unidad_medida = unidad_medida[1];
						//~ var tienda_id = $(this).find('td').eq(7).attr('id');
						//~ tienda_id = tienda_id.split('_');
						//~ tienda_id = tienda_id[1];
						var c_compra = $(this).find('td').eq(8).text().trim();
						var c_vende = $(this).find('td').eq(9).text().trim();
						var c_fabrica = $(this).find('td').eq(10).text().trim();
						//~ alert("Id: "+id+", "+"Nombre: "+nombre+", "+"Referencia: "+referencia+", "+"costo_dolar: "+costo_dolar+", "+"costo_bolivar: "+costo_bolivar);
						// Actualizamos los datos del material
						$.post('<?php echo base_url(); ?>CProductos/update_list', {'id':id, 'nombre':nombre, 'referencia':referencia, 'costo_dolar':costo_dolar, 'costo_bolivar':costo_bolivar, 'unidad_medida':unidad_medida, 'c_compra':c_compra, 'c_vende':c_vende, 'c_fabrica':c_fabrica}, function (response) {
							//~ alert(response);
						});
					}
				});
				
				//~ alert(num_checked);
				
				if (num_checked == 0) {
					swal("Disculpe,", "no ha marcado ningún elemento de la lista");			
				}else{
					swal({ 
						title: "Actualizado",
						 text: "Actualizado con exito",
						  type: "success" 
						},
					function(){
					  window.location.href = '<?php echo base_url(); ?>productos';
					});
				}
			}
		});  // Cierre del confirm
	});
	
});
        
</script>
