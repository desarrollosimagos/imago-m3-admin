$(document).ready(function(){
	// Ruta base del proyecto
	base_url = $("#base_url").val();
	
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
        "oLanguage": {"sUrl": base_url+"assets/js/es.txt"},
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
