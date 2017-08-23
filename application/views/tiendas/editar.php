<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Tiendas</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Inicio</a>
            </li>
            
            <li>
                <a href="<?php echo base_url() ?>tiendas">Tiendas</a>
            </li>
           
            <li class="active">
                <strong>Editar Tienda</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Editar Tienda<small></small></h5>
				</div>
				<div class="ibox-content">
					<form id="form_tienda" method="post" accept-charset="utf-8" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label" >Rif *</label>
							<div class="col-sm-4">
								<input type="text" class="form-control"  maxlength="20" name="rif" id="rif" value="<?php echo $editar[0]->rif ?>">
							</div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label" >Nombre</label>
							<div class="col-sm-8">
								<input type="text" class="form-control"  name="name" maxlength="100" id="name" value="<?php echo $editar[0]->name ?>">
							</div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label" >Dirección</label>
							<div class="col-sm-8">
								<input type="text" class="form-control"  name="address" maxlength="250" id="address" value="<?php echo $editar[0]->address ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Teléfono</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" maxlength="20" name="phone" id="phone" value="<?php echo $editar[0]->phone ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Estatus</label>
							<div class="col-sm-6">
								<input type="checkbox" class="form-control" name="status" id="status" <?php if($editar[0]->status == 1){echo "checked='checked'";}?>>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-2">
								 <input class="form-control" type='hidden' id="id" name="id" value="<?php echo $id ?>"/>
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
        url = '<?php echo base_url() ?>tiendas/';
        window.location = url;
    });
	
	$("#costo_dolar,#costo_bolivar").numeric(); //Valida solo permite valores numéricos

    $("#edit").click(function (e) {

        e.preventDefault();  // Para evitar que se envíe por defecto
        
        var regex = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;

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

            //~ $.post('<?php echo base_url(); ?>CTiendas/update', $('#form_tienda').serialize(), function (response) {
				//~ if (response[0] == '1') {
                    //~ swal("Disculpe,", "este nombre se encuentra registrado");
                //~ }else{
					//~ swal({ 
						//~ title: "Actualizar",
						 //~ text: "Guardado con exito",
						  //~ type: "success" 
						//~ },
					//~ function(){
					  //~ window.location.href = '<?php echo base_url(); ?>productos';
					//~ });
				//~ }
            //~ });
            
            // Formateamos los precios para usar coma en vez de punto
            //~ $("#costo_dolar").val(String($("#costo_dolar").val()).replace('.',','));
            //~ $("#costo_bolivar").val(String($("#costo_bolivar").val()).replace('.',','));
            //~ 
            //~ alert($("#costo_dolar").val());
            //~ alert($("#costo_bolivar").val());
            
            var formData = new FormData(document.getElementById("form_tienda"));  // Forma de capturar todos los datos del formulario
			
			$.ajax({
				//~ method: "POST",
				type: "post",
				dataType: "html",
				url: '<?php echo base_url(); ?>CTiendas/update',
				data: formData,
				cache: false,
				contentType: false,
				processData: false
			})
			.done(function(data) {
				if(data.error){
					console.log(data.error);
				} else {
					if (data[0] == '1') {
						swal("Disculpe,", "esta tienda se encuentra registrada");
					}else{
						swal({ 
							title: "Registro",
							 text: "Actualizado con exito",
							  type: "success" 
							},
						function(){
						  window.location.href = '<?php echo base_url(); ?>tiendas';
						});
					}
				}				
			}).fail(function() {
				console.log("error ajax");
			});
        }
    });
});

</script>