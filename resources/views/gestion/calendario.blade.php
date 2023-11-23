@extends('inicio.index')
@section('contenido')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<div id="app">
		<div class="block-header">
			<div class="row">
				<div class="col-lg-5 col-md-8 col-sm-12" style="padding-left: 50px;">
					<h2>
						<li class=" fa fa-calendar"></li>&nbsp;Agenda
					</h2>
				</div>
				<div class="col-lg-7 col-md-4 col-sm-12 text-right">
					<ul class="breadcrumb justify-content-end">
						<li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
						<li class="breadcrumb-item active">Gestion</li>
						<li class="breadcrumb-item">Agenda</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-12">
			<div class="card">
				<div class="body">
					<div id='calendar'></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', async function() {
		const response = await fetch("/getagenda", {
			method: "GET",
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
				"Content-Type": "application/json",
			},
		});
		const data = await response.json();
		var calendarEl = document.getElementById('calendar');
		var calendar = new FullCalendar.Calendar(calendarEl, {
			initialView: 'dayGridMonth',
			events: data,
			eventClick: function(event, jsEvent, view) {
				let idproceso = event.event._def.extendedProps.idproceso;
				let identificacion = event.event._def.extendedProps.identificacion;
				window.location.href = "/verProceso?id="+idproceso+"&identificacion="+identificacion;
			},
		});
		calendar.render();

	});
</script>
@endsection