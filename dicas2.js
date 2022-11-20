$(document).ready(function(){

	var table = $(".zero-configuration").DataTable({
		"order": [[ 0, "asc" ]],
		"lengthChange": false,
		"pageLength": $('#select_registros').val(),
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": "dicas2_dados.php",
			"type": "POST",
			"data": function (d) {
				return $.extend({}, d, {
					"busca": $('#input_busca').val()
				});
			}
		},
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
		},
		/*
		"aoColumnDefs": [{ 
			"bSortable": false, 
			"aTargets": [ 1 ]
		}],
		*/			

	})

	jQuery("#select_registros").change(function () {
		table.page.len($('#select_registros').val()).draw();
	});

	$('#input_busca').on( 'keyup', function () {
		table.draw();
	});

	$('#input_busca').keypress(function(event){
	    var keycode = (event.keyCode ? event.keyCode : event.which);
	    if(keycode == '13'){
	 		event.preventDefault();
	    }
	});

});