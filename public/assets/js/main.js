
$(document).ready(function () {

	$("#citar").on('click', function (e) {
		e.preventDefault();
		citar();
	});

	$("#nuevaCita").on('click', function (e) {
		$('#citasList').removeClass('show');
	});

	$("#citas").on('click', function (e) {
		$('#citarContent').removeClass('show');
		cargarCitas();
	});

	$( "#fecha" ).datepicker({
		
		weekStart: 0 
	 });
	 

});

/**
 * Cargar citas desde el server
 */
function cargarCitas() {
	$.ajax({
		type: "GET",
		dataType: 'application/json',
		url: "/api/citas",
		complete: function(data) {
			var body = JSON.parse(data.responseText);
			var tbody = $('#listadoCitas tbody');
			$('#listadoCitas tbody tr').remove();
			var tr = null;
			var tdFecha = null;
			var tdCliente = null;

			$.each(body, function(k, v) {
				$.each(v, function(j, i) {
					tr = document.createElement('tr');
					tdFecha = document.createElement('td');
					tdCliente = document.createElement('td');
					tdFecha.append(i.fecha)
					tdCliente.append(i.cliente)
					tr.append(tdFecha);
					tr.append(tdCliente);
					tbody.append(tr)
				});
			});
			
		}
	});
}

/**
 * Enviar peticion para registrar cita
 */
function citar() {
	$.ajax({
		type: "POST",
		dataType: 'application/json',
		url: "/api/citar",
		data: getData(),
		complete: function () {
			$('#successCitar').addClass('show');
			setTimeout(function() {
				$('#successCitar').removeClass('show');
			}, 1200);
		}
	});
}

/**
 * serialize() no chuta
 * 
 * @returns array
 */
function getData() {
	return {
		'nombre': $('#nombre').val(),
		'apellido': $('#apellido').val(),
		'pais': $('#pais').val(),
		'fecha': $('#fecha').val(),
	};
}