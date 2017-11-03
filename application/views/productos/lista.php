<style>
.select2-container {
	z-index: 99999;
}
</style>
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
						
						<!--Filtros extra-->
						<div class="ibox-title">
							<input type="checkbox" id="sin_imagenes"> <span style="font-weight:bold;">Productos sin imágenes</span>
						</div>
						<div class="ibox-title">
							<input type="checkbox" id="sin_tiendasv"> <span style="font-weight:bold;">Productos sin tiendas virtuales</span>
						</div>
						<!--Cierre filtros extra-->
						
						<br>
						
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
                                    <th>Tiendas Virtuales</th>
                                    <th>Fotos</th>
                                    <th>Se compra</th>
                                    <th>Se vende</th>
                                    <th>Se fabrica</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                    <th>Actualizar</th>
                                </tr>
                            </thead>
							
                        </table>
                        
                        <!-- Campo oculto de base_url -->
                        <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>"/>
                        
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
							<div class="col-md-6" style="display:block;">
								<button class="btn btn-outline btn-primary dim" id="actualizar_montos" type="button"><i class="fa fa-floppy-o"></i> Actualizar</button>
							</div>
							<div class="col-md-4" style="display:block;">
								<button class="btn btn-outline btn-primary dim" id="actualizar_montos_general" type="button"><i class="fa fa-refresh"></i> | <i class="fa fa-floppy-o"></i> Referenciar y Actualizar</button>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para selección de tienda virtual -->
<div class="modal fade" id="modal_tiendav">
   <div class="modal-dialog">
	  <div class="modal-content">
		 <div class="modal-header" style="background-color:#1ab394">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" style="color:#ffffff">
			   <center>
				<span class="glyphicon glyphicon-search"></span>
				&nbsp;Seleccione la tienda virtual con la cual sincronizar 
			   </center>
			</h4>
		 </div>
		 <div class="modal-body">
			<form id="f_tiendav" name="f_tiendav" action="" method="post">
			   <div class="form-group">
					<div class="col-sm-12">
						<div class="form-group">
							<label style="font-weight:bold;">Tiendas Virtuales</label>
							<select class="form-control" id="tiendav_id"  name="tiendav_id" >
								<option value="0">Seleccione</option>
								<?php foreach ($listar_tiendas_fil as $tiendav) { ?>
									<option value="<?php echo $tiendav->id ?>"><?php echo $tiendav->nombre; ?></option>
								<?php } ?>
							</select>
							<input type="hidden" id="producto_id">
						</div>
					</div>
					</br></br>
					<div class="col-sm-12" align="right">
						<span class="input-btn">
							<button class="btn btn-primary" type="button" id="sincronizar">
								Sincronizar&nbsp;<span class="glyphicon glyphicon-share-alt"></span>
							</button>
						</span>
					</div>
					</br></br>
			   </div>
			</form>
		 </div>
		 
	  </div>
   </div>
</div>
<!-- Cierre Modal para selección de tienda virtual -->


 <!-- Page-Level Scripts -->
<script src="<?php echo assets_url(); ?>script/products.js"></script>
