<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Colas</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            <li class="active">
                <strong>Colas</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo base_url() ?>colas/register">
            <button class="btn btn-outline btn-primary dim" type="button"><i class="fa fa-plus"></i> Agregar</button></a>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Listado de Colas </h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="tab_colas" class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr style="text-align: center">
                                    <th>#</th>
                                    <th>Tienda Virtual</th>
                                    <th>Tienda Física</th>
                                    <th>Estatus</th>
                                    <th>Editar</th>
                                    <th>Cambiar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($listar as $cola) { ?>
                                    <tr style="text-align: center">
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $cola->nombre; ?>
                                        </td>
                                        <td>
                                            <?php echo $cola->name; ?>
                                        </td>
                                        <td>
                                            <?php
											if($cola->status == 1){
												echo "<span style='color:#1ab394'>Procesado</span>"; 
											}else if($cola->status == 2){
												echo "<span style='color:#2E6191'>En proceso</span>"; 
											}else if($cola->status == 3){
												echo "<span style='color:#F7A54A'>Pendiente</span>"; 
											}else if($cola->status == 4){
												echo "<span style='color:#808284'>Cancelado</span>"; 
											}else{
												echo "";
											}
                                            ?>
                                        </td>
                                        <td style='text-align: center'>
											<?php
											if($cola->status == 1 || $cola->status == 4){
											?>
                                            <a style='color: #808284;cursor:default' disabled="disabled"><i class="fa fa-edit fa-2x"></i></a>
                                            <?php
											}else{
											?>
											<a href="<?php echo base_url() ?>colas/edit/<?php echo $cola->id; ?>" title="Editar" style='color: #1ab394'><i class="fa fa-edit fa-2x"></i></a>
											<?php
											}
											?>
                                        </td>
                                        <td>
											<?php
											if($cola->status == 1 || $cola->status == 4){
											?>
                                            <select class="form-control" style="width:100%" disabled="disabled">
												<option value="1" <?php if($cola->status == 1){echo "selected='selected'";}?>>Procesado</option>
												<option value="2" <?php if($cola->status == 2){echo "selected='selected'";}?>>En proceso</option>
												<option value="3" <?php if($cola->status == 3){echo "selected='selected'";}?>>Pendiente</option>
												<option value="4" <?php if($cola->status == 4){echo "selected='selected'";}?>>Cancelado</option>
											</select>
											<?php
											}else if($cola->status == 2){
											?>
											<select class="form-control" style="width:100%" class="cambiar" id="<?php echo $cola->id; ?>">
												<option value="1" <?php if($cola->status == 1){echo "selected='selected'";}?>>Procesado</option>
												<option value="2" <?php if($cola->status == 2){echo "selected='selected'";}?>>En proceso</option>
												<option value="3" <?php if($cola->status == 3){echo "selected='selected'";}?>>Pendiente</option>
												<option value="4" <?php if($cola->status == 4){echo "selected='selected'";}?>>Cancelado</option>
											</select>
											<?php
											}else if($cola->status == 3){
											?>
											<select class="form-control" style="width:100%" class="cambiar" id="<?php echo $cola->id; ?>">
												<option value="2" <?php if($cola->status == 2){echo "selected='selected'";}?>>En proceso</option>
												<option value="3" <?php if($cola->status == 3){echo "selected='selected'";}?>>Pendiente</option>
												<option value="4" <?php if($cola->status == 4){echo "selected='selected'";}?>>Cancelado</option>
											</select>
											<?php
											}
											?>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


 <!-- Page-Level Scripts -->
<script>
$(document).ready(function(){
     $('#tab_colas').DataTable({
        "paging": true,
        "lengthChange": false,
        "autoWidth": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "iDisplayLength": 5,
        "iDisplayStart": 0,
        "sPaginationType": "full_numbers",
        "aLengthMenu": [5, 10, 15],
        "oLanguage": {"sUrl": "<?= assets_url() ?>js/es.txt"},
        "aoColumns": [
            {"sClass": "registro center", "sWidth": "5%"},
            {"sClass": "registro center", "sWidth": "20%"},
            {"sClass": "registro center", "sWidth": "20%"},
            {"sClass": "registro center", "sWidth": "20%"},
            {"sWidth": "3%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false},
            {"sWidth": "3%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false}
        ]
    });
             
    // Función para cambiar el status de una cola según la opción seleccionada en su respectivo combo
	$("table#tab_colas").on('change', 'select.cambiar', function (e) {
		e.preventDefault();
		var id = this.getAttribute('id');
		alert(id)
	});       
	
});
        
</script>
