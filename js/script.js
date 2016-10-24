function HazQuery(){
	var evento = $( "#evento option:selected" ).text();

	if(evento === "Diámetro"){
		$('#diam').show();
		$('#bHolderDiam').show();
		$('#bHolderFecha').hide();
		$('#fecha').hide();
		$('#tabla').hide();
	}
	else if(evento === "Cantidad de Tubos"){
		$('#diam').hide();
		$('#bHolderDiam').hide();
		$('#bHolderFecha').hide();
		$('#fecha').hide();
		$('#tabla').show();
		getCantidad();
	}
	else if(evento === "Fecha"){
		$('#diam').hide();
		$('#bHolderDiam').hide();
		$('#bHolderFecha').show();
		$('#fecha').show();
		$('#tabla').hide();
	}
}

function getDiametro(){

	$.ajax({
		dataType: "json",
		url: "obtenDiametros.php",
		type: "GET",
		cache: false,
           	}
	)

	.done(function(json,b,c) {
		console.log("success");
		console.log(json);

		var bandera = 0;
		var $select = $('#diametro');
		$select.html('');

		var i = 0;
		var j = 0;

		while(json[i] != null){

		$select.append('<option>' + json[i] + '</option>')
		i++;

		}	
    })

	.error(function(a,b,c) {
		console.warn(a.responseText)
		}
	);

}

function BuscaDiametro(){
	$('#tabla').show();
	var diam = document.getElementById('diametro').value;
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

function getCantidad(){
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

function getFecha(){
	$.ajax({
		dataType: "json",
		url: "obtenFecha.php",
		type: "GET",
		cache: false,
           	}
	)

	.done(function(json,b,c) {
		console.log("success");
		console.log(json);

		var $select = $('#f1');
		var $select2 = $('#f2');

		$select.html('');
		$select2.html('');

		var i = 0;
		var j = 0;

		while(json[i] != null){

		$select.append('<option>' + json[i] + '</option>');
		$select2.append('<option>' + json[i] + '</option>');
		i++;

		}	
    })

	.error(function(a,b,c) {
		console.warn(a.responseText)
		}
	);	
}

function BuscaFecha(){
	$('#tabla').show();
	var f1 = document.getElementById('f1').value;
	var f2 = document.getElementById('f2').value;

	$.ajax({
	dataType: "json",
	url: "getFecha.php",
	data: {'f1': f1, 'f2': f2},
	type: "GET",
	cache: false,
 		}
	)

	.done(function(json,b,c) {
		console.log("success");
		console.log(json);

		var $select = $('#tabla');

		$cadena = '';
		$select.html('');

		var i = 0;

		$cadena += '<div class="container id="datos"><table style="width:95%"><tr bgcolor="#E6E6FA"><td>Diámetro</td><td>Cantidad</td><td>Fecha</td><td>Proceso</td></tr>';

		while(json[i] != null){
		$cadena += '<tr btcolor = "#F5F5FF"><td>' + json[i][1] + '</td><td>' + json[i][2] + '</td><td>' + json[i][0] + '</td><td>' + json[i][3] + "</td></tr>";
		i++;

		}	

		$cadena += '</table></div>';
		
		$select.append($cadena);
    })

	.error(function(a,b,c) {
		console.warn(a.responseText)
		}
	);	    	
}