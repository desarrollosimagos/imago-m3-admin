<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Aplicaciones </h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            
            <li>
                <a href="<?php echo base_url() ?>aplicaciones">Aplicaciones</a>
            </li>
           
            <li class="active">
                <strong>Editar Aplicación</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Editar Aplicación <small></small></h5>
				</div>
				<div class="ibox-content">
					<form id="form_aplicaciones" method="post" accept-charset="utf-8" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label" >Nombre *</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nombre" id="nombre" maxlength="150" value="<?php echo $editar[0]->nombre ?>">
							</div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label" >Ruta *</label>
							<div class="col-sm-10">
								<input type="text" class="form-control"  name="ruta" maxlength="200" id="ruta" value="<?php echo $editar[0]->ruta ?>">
							</div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label" >Estatus *</label>
							<div class="col-sm-1">
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
        url = '<?php echo base_url() ?>aplicaciones/';
        window.location = url;
    });
	
	$("#costo_dolar,#costo_bolivar").numeric(); //Valida solo permite valores numéricos

    $("#edit").click(function (e) {

        e.preventDefault();  // Para evitar que se envíe por defecto
        
        var regex = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;

        if ($('#nombre').val().trim() === "") {
			swal("Disculpe,", "para continuar debe ingresar nombre");
			$('#nombre').parent('div').addClass('has-error');
			
        } else if ($('#ruta').val().trim() === "") {
			swal("Disculpe,", "para continuar debe ingresar la ruta");
			$('#ruta').parent('div').addClass('has-error');
			
        } else {

            //~ $.post('<?php echo base_url(); ?>CAplicaciones/update', $('#form_aplicaciones').serialize(), function (response) {
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
            
            var formData = new FormData(document.getElementById("form_aplicaciones"));  // Forma de capturar todos los datos del formulario
			
			$.ajax({
				//~ method: "POST",
				type: "post",
				dataType: "html",
				url: '<?php echo base_url(); ?>CAplicaciones/update',
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
						swal("Disculpe,", "esta aplicación se encuentra registrada");
					}else{
						swal({ 
							title: "Registro",
							 text: "Actualizado con exito",
							  type: "success" 
							},
						function(){
						  window.location.href = '<?php echo base_url(); ?>aplicaciones';
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
