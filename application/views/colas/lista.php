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
            <!--<a href="<?php echo base_url() ?>colas/register">
				<button class="btn btn-outline btn-primary dim" type="button">
					<i class="fa fa-plus"></i> Agregar
				</button>
            </a>-->
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Listado de Colas </h5>
                    <!-- Campo oculto de base_url -->
					<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>"/>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="tab_colas" class="table table-striped table-bordered dt-responsive table-hover dataTables-example" >
                            <thead>
                                <tr style="text-align: center">
                                    <th>#</th>
                                    <th>Tienda Virtual</th>
                                    <th>Tienda Física</th>
                                    <th>Estatus</th>
                                    <th>Pendientes</th>
                                    <th>Procesados</th>
                                    <th>Detalles</th>
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
                                        <td>
                                            <?php echo "<span style='color:#F7A54A'>$cola->num_pendientes</span>"; ?>
                                        </td>
                                        <td>
											<?php echo "<span style='color:#1ab394'>$cola->num_procesados</span>"; ?>
                                        </td>
                                        <td style='text-align: center'>
											<?php
											if($cola->status == 1 || $cola->status == 4){
											?>
                                            <a style='color: #808284;cursor:default' disabled="disabled"><i class="fa fa-list fa-2x"></i></a>
                                            <?php
											}else{
											?>
											<a href="<?php echo base_url() ?>colas/edit/<?php echo $cola->id; ?>" title="Ver detalles" style='color: #1ab394'><i class="fa fa-list fa-2x"></i></a>
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
											<select class="form-control cambiar" style="width:100%" id="<?php echo $cola->id.";".$cola->status; ?>">
												<option value="1" <?php if($cola->status == 1){echo "selected='selected'";}?>>Procesado</option>
												<option value="2" <?php if($cola->status == 2){echo "selected='selected'";}?>>En proceso</option>
												<option value="3" <?php if($cola->status == 3){echo "selected='selected'";}?>>Pendiente</option>
												<option value="4" <?php if($cola->status == 4){echo "selected='selected'";}?>>Cancelado</option>
											</select>
											<?php
											}else if($cola->status == 3){
											?>
											<select class="form-control cambiar" style="width:100%" id="<?php echo $cola->id.";".$cola->status; ?>">
												<option value="1" <?php if($cola->status == 1){echo "selected='selected'";}?>>Procesado</option>
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
<script src="<?php echo assets_url(); ?>script/colas.js"></script>
