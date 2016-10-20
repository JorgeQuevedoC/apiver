function HazQuery(){
	var evento = $( "#evento option:selected" ).text();

	if(evento === "Diámetro"){
		$('#diam').show();
		$('#bHolderDiam').show();
	}
	else if(evento === "Fecha"){
		var string = "<h1> AhorljkadHola </h1>";
		$('#solicitud').html(string);
	}
}

function BuscaDiametro(){
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

function BuscaCantidad(){
	$.ajax({
	dataType: "json",
	url: "getCantidad.php",
	type: "GET",
	cache: false,
	success: function(output_string){
			console.log(output_string);
 			$('#tabla').html(output_string);
 	    	}
 		}
	)
}