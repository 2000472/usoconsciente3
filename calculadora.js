function verificaAparelho(focus){
	$("#div_potencia").css("display", "none");
	$("#input_potencia").prop('required',false);
	var select_aparelho = $("#select_aparelho").val();
	if (select_aparelho=="Outro"){			
		$("#div_potencia").css("display", "block");
		$("#input_potencia").prop('required',true);
		if (focus) {
			var input_potencia = $("#input_potencia").val();
			if (input_potencia==""){
				$("#input_potencia").focus();
			}
		}			
	}
} // verificaAparelho

function verificaCalcularValor(focus){
	$("#div_valor").css("display", "none");
	$("#input_valor").prop('required',false);
	var select_calcularvalor = $("#select_calcularvalor").val();
	if (select_calcularvalor=="Sim"){			
		$("#div_valor").css("display", "block");
		$("#input_valor").prop('required',true);
		if (focus) {
			var input_valor = $("#input_valor").val();
			if (input_valor==""){
				$("#input_valor").focus();
			}
		}			
	}
} // verificaValor

$(document).ready(function(){

	verificaAparelho(false);
	verificaCalcularValor(false);

	jQuery("#select_aparelho").change(function () {
		verificaAparelho(true);
	});
	
	jQuery("#select_calcularvalor").change(function () {
		verificaCalcularValor(true);
	});

});