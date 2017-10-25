<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Tiendas Virtuales</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            <li class="active">
                <strong>Tiendas Virtuales</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo base_url() ?>tiendasv/register">
            <button class="btn btn-outline btn-primary dim" type="button"><i class="fa fa-plus"></i> Agregar</button>
            </a>
            <!--<button class="btn btn-outline btn-primary dim" id="referenciar" type="button"><i class="fa fa-refresh"></i> Referenciar</button>-->
            <label id="label_precio_dolar" style="color:red;"></label>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Listado de Tiendas Virtuales</h5>
                    <input type="hidden" id="precio_dolar">
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="tab_tiendas" class="table table-striped table-bordered dt-responsive table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>URL</th>
                                    <th>Tienda</th>
                                    <th>Tokens</th>
                                    <th>Token Cliente</th>
                                    <th>Secret API</th>
                                    <th>URL Callback</th>
                                    <th>API Cliente</th>
                                    <th>App</th>
                                    <th>Aplicación</th>
                                    <th>Fórmula</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                    <th>Actualizar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($listar as $tienda) { ?>
                                    <tr style="text-align: center">
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $tienda->nombre; ?>
                                        </td>
                                        <td>
                                            <?php echo $tienda->descripcion; ?>
                                        </td>
                                        <td>
                                            <?php echo $tienda->url; ?>
                                        </td>
                                        <td>
                                            <?php 
											foreach ($listar_tiendas as $tiendaf){
												if($tienda->tienda_id == $tiendaf->id){
													echo $tiendaf->name;
												}else{
													echo "";
												}
											}
											?>
                                        </td>
                                        <td>
                                            <?php echo $tienda->tokens; ?>
                                        </td>
                                        <td>
                                            <?php echo $tienda->token_cliente; ?>
                                        </td>
                                        <td>
                                            <?php echo $tienda->secret_api; ?>
                                        </td>
                                        <td>
                                            <?php echo $tienda->url_callback; ?>
                                        </td>
                                        <td>
                                            <?php echo $tienda->cliente_api_id; ?>
                                        </td>
                                        <td>
                                            <?php echo $tienda->app_id; ?>
                                        </td>
                                        <td>
                                            <?php 
											foreach ($listar_aplicaciones as $aplicacion){
												if($tienda->aplicacion_id == $aplicacion->id){
													echo $aplicacion->nombre;
												}else{
													echo "";
												}
											}
											?>
                                        </td>
                                        <td>
                                            <?php echo $tienda->formula; ?>
                                        </td>
                                        <td style='text-align: center'>
                                            <a href="<?php echo base_url() ?>tiendasv/edit/<?= $tienda->id; ?>" title="Editar" style='color: #1ab394'><i class="fa fa-edit fa-2x"></i></a>
                                        </td>
                                        <td style='text-align: center'>
                                            <a class='borrar' id='<?php echo $tienda->id; ?>' style='color: #1ab394' title='Eliminar'><i class="fa fa-trash-o fa-2x"></i></a>
                                        </td>
                                        <td style='text-align: center'>
                                            <a class='actualizar' id="<?php echo $tienda->ruta.";".$tienda->id; ?>" style='color: #1ab394' title='Actualizar precios'><i class="fa fa-refresh fa-2x"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php } ?>
                            </tbody>
                        </table>
                        <input type="hidden" id="update_prices" value="<?php echo base_url(); ?>"/>
                        <!--<div class="text-right">
							<button class="btn btn-outline btn-primary dim" id="actualizar_montos" type="button"><i class="fa fa-floppy-o"></i> Actualizar</button>
						</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="cargando" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!--<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Modal Header</h4>
			</div>-->
			<div class="modal-body">
				<!-- Imagen de carga -->
				<div class="col-md-12" id="resultado">
					<div>
						<i class="fa fa-refresh fa-spin">
							
						</i>
						<span>Validando...</span>
					</div>
				</div>
				<!-- Imagen de carga -->
			</div>
			<!--<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>-->
		</div>
	</div>
</div>


 <!-- Page-Level Scripts -->
<script>
$(document).ready(function(){
	$('#tab_tiendas').DataTable({
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
            {"sClass": "registro center", "sWidth": "5%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "none", "sWidth": "10%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "none", "sWidth": "10%"},
            {"sClass": "none", "sWidth": "10%"},
            {"sClass": "none", "sWidth": "10%"},
            {"sClass": "none", "sWidth": "10%"},
            {"sClass": "none", "sWidth": "10%"},
            {"sClass": "none", "sWidth": "10%"},
            {"sClass": "none", "sWidth": "10%"},
            {"sClass": "none", "sWidth": "10%"},
            {"sClass": "none", "sWidth": "10%"},
            {"sWidth": "3%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false},
            {"sWidth": "3%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false},
            {"sWidth": "3%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false}
        ]
    });
             
    // Validacion para borrar
    $("table#tab_tiendas").on('click', 'a.borrar', function (e) {
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
             
                $.post('<?php echo base_url(); ?>tiendasv/delete/' + id + '', function (response) {

                    if (response[0] == "e") {
                       
                         swal({ 
                           title: "Disculpe,",
                            text: "No se puede eliminar, tiene productos asociados",
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
                             window.location.href = '<?php echo base_url(); ?>tiendasv';
                         });
                    }
                });
            } 
        });
    });
    
    // Validacion para actualizar tienda virtual
    $("table#tab_tiendas").on('click', 'a.actualizar', function (e) {
        e.preventDefault();
        var id = this.getAttribute('id');
		var ruta = id.split(";");
		ruta = ruta[0];
		id = id.split(";");
		id = id[1];
        
        // Saber si la tienda tiene cola de envío y en qué estatus está
        $.post('<?php echo base_url(); ?>mercado/cola/?id='+id, function (response) {

			if (response == 2) {
			   
				 swal({ 
				   title: "Disculpe,",
					text: "Hay una sincronización en proceso...",
					 type: "warning" 
				   },
				   function(){
					 
				 });
				 
			}else if(response == 3){
				
				swal({
					title: "Cola pendiente",
					text: "Tiene una cola pendiente, ¿desea procesarla?",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Procesar",
					cancelButtonText: "Cancelar",
					closeOnConfirm: false,
					closeOnCancel: true
				},
				function(isConfirm){
					
					if (isConfirm) {
					 
						window.location.href = '<?php echo base_url(); ?>'+ruta+'?id='+id;
						
					}else{
					
						// Cancelar una cola según el id de la misma
						$.post('<?php echo base_url(); ?>mercado/cancelar_cola/?id='+id, function (response2) {
								
								if(response2 == 1){
									
									swal({ 
									   title: "Cancelado",
										text: "Cola cancelada con exito",
										 type: "success" 
									},
									function(){
										 
									});
									
								}else{
									swal({ 
									   title: "Error",
										text: "La cola no pudo ser cancelada, consulte con su administrador...",
										 type: "warning" 
									},
									function(){
										 
									});
								}
							
						});
					
					}
					
				});
				
				 
			}else{
				
				window.location.href = '<?php echo base_url(); ?>'+ruta+'?id='+id;
				
			}
			
		});
        
    });
	
});
        
</script>
