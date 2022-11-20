$(document).ready(function(){

	var table = $(".zero-configuration").DataTable({
		"order": [[ 0, "asc" ]],
		"lengthChange": false,
		"pageLength": $('#select_registros').val(),
		"oLanguage": {
			"sLengthMenu": "Mostrar _MENU_ registros por página",
			"sZeroRecords": "Nenhum registro encontrado",
			"sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
			"sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
			"sInfoFiltered": "(filtrado de _MAX_ registros)",
			"sSearch": "Pesquisar: ",
			"sProcessing": "Processando ...",
			"oPaginate": {
				"sFirst": "<<",
				"sPrevious": "<",
				"sNext": ">",
				"sLast": ">>"
			}
		}
	})

	jQuery("#select_registros").change(function () {
		table.page.len($('#select_registros').val()).draw();
	});

	$('#input_busca').on( 'keyup', function () {
	    table.search( this.value ).draw();
	} );

	$('#input_busca').keypress(function(event){
	    var keycode = (event.keyCode ? event.keyCode : event.which);
	    if(keycode == '13'){
	 		event.preventDefault();
	    }
	});

});