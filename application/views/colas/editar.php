<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Detalles </h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            
            <li>
                <a href="<?php echo base_url() ?>colas">Colas</a>
            </li>
           
            <li class="active">
                <strong>Detalles</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<div class="ibox float-e-margins">
					
				<div class="ibox-title">
					<h5>Productos Asociados</h5>
				</div>
				
				<!-- Start ibox-content-->
				<div class="ibox-content">
					
					<div class="table-responsive">
						
                        <!-- Campo oculto de base_url -->
						<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>"/>
						
						<table class="table table-striped table-bordered dt-responsive table-hover dataTables-example" id="tab_productos">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Categoría</th>
									<th>Precio</th>
									<th>Cantidad</th>
									<th>Descripción</th>
									<th>Detalles</th>
									<th>Referencia</th>
									<th>Estatus</th>
									<!--<th>Eliminar</th>
									<th>Actualizar</th>-->
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								foreach ($detalles_cola as $detalle) { ?>
									<tr id="<?php echo $detalle->producto_id; ?>">
										<td style='text-align: center'>
										<?php echo $i;?>
										</td>
										<td style='text-align: center' id="<?php echo $detalle->id; ?>">
										<?php echo $detalle->nombre; ?>
										</td>
										<td style='text-align: center' id="<?php echo $detalle->categoria_id; ?>">
										<?php foreach ($listar_categorias as $categoria) {
											if ($detalle->categoria_id == $categoria->id){
												echo $categoria->categoria."<br>";
											}
										}?>
										</td>
										<td style='text-align: center' id="price_<?php echo $detalle->id;?>_column">
										<?php echo $detalle->precio; ?>
										</td>
										<td style='text-align: center' id="price_<?php echo $detalle->id;?>_column_cantidad">
										<?php echo $detalle->cantidad; ?>
										</td>
										<td style='text-align: center'><?php echo $detalle->descripcion; ?></td>
										<td style='text-align: center'><?php echo $detalle->detalles; ?></td>
										<td style='text-align: center'><?php echo $detalle->referencia; ?></td>
										<td style='text-align: center'>
											<?php
											if($detalle->status == 1){
												echo "<span style='color:#1ab394'>Procesado</span>"; 
											}else if($detalle->status == 2){
												echo "<span style='color:#F7A54A'>Pendiente</span>";
											}else{
												echo "";
											}
                                            ?>
										</td>
										<!--<td style='text-align: center'><a  style="color: #1ab394" class='quitar' id="<?php echo $detalle->id; ?>"><i class='fa fa-trash fa-2x'></i></a></td>
										<td>
											<input type="checkbox" id="price_<?php echo $detalle->id;?>" class="check">
										</td>-->
									</tr>
								<?php $i++; }?>
							</tbody>
						</table>
                        
                    </div>
					
				</div>
				<!-- End ibox-content-->
				
			</div>
        </div>
    </div>
</div>
<script src="<?php echo assets_url(); ?>script/edit_cola.js"></script>
