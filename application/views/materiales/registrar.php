<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Materiales </h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            
            <li>
                <a href="<?php echo base_url() ?>materiales">Materiales</a>
            </li>
            
            <li class="active">
                <strong>Registrar Material</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Registrar Material <small></small></h5>
					
				</div>
				<div class="ibox-content">
					<form id="form_materiales" method="post" accept-charset="utf-8" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label" >Nombre *</label>
							<div class="col-sm-10">
								<input type="text" class="form-control"  maxlength="100" name="nombre" id="nombre">
							</div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label" >Referencia *</label>
							<div class="col-sm-10">
								<input type="text" class="form-control"  name="referencia" maxlength="150" id="referencia">
							</div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label" >Precio en Dólares *</label>
							<div class="col-sm-6">
								<input type="text" class="form-control"  name="costo_dolar" maxlength="11" id="costo_dolar">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Precio en Bolívares *</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" maxlength="11" name="costo_bolivar" id="costo_bolivar" readonly="true">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-2">
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
        url = '<?php echo base_url() ?>materiales/';
        window.location = url;
    });
    
    $("#costo_dolar,#costo_bolivar").numeric(); //Valida solo permite valores numéricos

	// Convertimos el valor en dólares a bolívares
	$("#costo_dolar").change(function (e) {
		e.preventDefault();  // Para evitar que se envíe por defecto
		
		$.get('https://s3.amazonaws.com/dolartoday/data.json', function (response) {  // Se produce un error si usamos $.post en vez de $.get
			//~ alert(response['USD']['transferencia']);
			var dolar_bolivar = parseFloat($("#costo_dolar").val()) * response['USD']['transferencia'];
			$("#costo_bolivar").val(dolar_bolivar);
		}, 'json');
	});

    $("#registrar").click(function (e) {

        e.preventDefault();  // Para evitar que se envíe por defecto

        if ($('#nombre').val().trim() === "") {
			swal("Disculpe,", "para continuar debe ingresar nombre");
			$('#nombre').parent('div').addClass('has-error');
			
        } else if ($('#referencia').val().trim() === "") {
			swal("Disculpe,", "para continuar debe ingresar la referencia");
			$('#referencia').parent('div').addClass('has-error');
			
        } else if ($('#costo_dolar').val().trim() === "") {
			swal("Disculpe,", "para continuar debe ingresar el costo en dólares");
			$('#costo_dolar').parent('div').addClass('has-error');
			
        } else if ($('#costo_bolivar').val().trim() === "") {
			swal("Disculpe,", "para continuar debe ingresar el costo en bolívares");
			$('#costo_bolivar').parent('div').addClass('has-error');
			
        }  else {

            //~ $.post('<?php echo base_url(); ?>CMateriales/add', $('#form_materiales').serialize(), function (response) {
				//~ if (response[0] == '1') {
                    //~ swal("Disculpe,", "este nombre se encuentra registrado");
                //~ }else{
					//~ swal({ 
						//~ title: "Registro",
						 //~ text: "Guardado con exito",
						  //~ type: "success" 
						//~ },
					//~ function(){
					  //~ window.location.href = '<?php echo base_url(); ?>materiales';
					//~ });
				//~ }
            //~ });
            
            // Formateamos los precios para usar coma en vez de punto
            //~ $("#costo_dolar").val(String($("#costo_dolar").val()).replace('.',','));
            //~ $("#costo_bolivar").val(String($("#costo_bolivar").val()).replace('.',','));
            //~ 
            //~ alert($("#costo_dolar").val());
            //~ alert($("#costo_bolivar").val());
            
            var formData = new FormData(document.getElementById("form_materiales"));  // Forma de capturar todos los datos del formulario
			
			$.ajax({
				//~ method: "POST",
				type: "post",
				dataType: "html",
				url: '<?php echo base_url(); ?>CMateriales/add',
				data: formData,
				cache: false,
				contentType: false,
				processData: false
			})
			.done(function(data) {
				if(data.error){
					console.log(data.error);
				} else {
					if (data == 'existe') {
						swal("Disculpe,", "este material se encuentra registrado");
					}else{
						swal({ 
							title: "Registro",
							 text: "Guardado con exito",
							  type: "success" 
							},
						function(){
						  window.location.href = '<?php echo base_url(); ?>materiales';
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
