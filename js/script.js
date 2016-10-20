function HazQuery(){
	var evento = $( "#evento option:selected" ).text();

	if(evento === "Diámetro"){
		$('#diam').show();
		$('#bHolderDiam').show();
		$('#bHolderFecha').hide();
		$('#fecha').hide();
		$('#tabla').hide();
	}
	else if(evento === "Fecha"){
		$('#diam').hide();
		$('#bHolderDiam').hide();
		$('#bHolderFecha').show();
		$('#fecha').show();
		$('#tabla').hide();
	}
}

function BuscaDiametro(){
	$('#tabla').show();
	var diam = document.getElementById('diametroin').value;
	console.log(diam);

	$.ajax({
	dataType: "json",
	url: "getDiametro.php",
	data: {'diam': diam},
	type: "GET",
	cache: false,
	success: function(output_string){
			console.log(output_string);
 			$('#tabla').html(output_string);
 	    	}
 		}
	)
}

function BuscaFecha(){

}