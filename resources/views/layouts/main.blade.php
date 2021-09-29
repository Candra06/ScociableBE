<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Atlantis Lite - Bootstrap 4 Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('assets/img/icon.ico')}}" type="image/x-icon"/>

	<!-- Fonts and icons -->

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script src="{{asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: [ "{{ asset('assets/css/fonts.min.css') }}" ]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>




	<!-- summer note 4 -->
	<link href="{{ asset('assets/summernote/summernote-bs4.css')}}" rel="stylesheet">


	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/atlantis.min.css') }}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
</head>
<body>
	<div class="swal-alert @if (session()->has('success')) ready @endif"></div>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">

				<a href="index.html" class="logo">
					<img src="{{asset('assets/image/sociable-admin-white.png')}}" width="120px" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			@include('partials.navbar')
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
        @include('partials.sidebar')

		<!-- End Sidebar -->

		<div class="main-panel">
			@yield('container')
		</div>

	</div>

	@include('partials.script')

	{{-- <script>
		Circles.create({
			id:'circles-1',
			radius:45,
			value:60,
			maxValue:100,
			width:7,
			text: 5,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:70,
			maxValue:100,
			width:7,
			text: 36,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: 12,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script> --}}


	<script src="{{ asset('assets/js/script.js') }}"></script>



    <script src="{{url('/')}}/assets/js/plugin/datatables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>


	<script>
		var check = $('.swal-alert').is('.ready');
		if(check){
			swal("{{ session('success') }}", {
				buttons: {
					confirm: {
						className : 'btn btn-success'
					}
				},
			});
		}

		@if(Route::is('artikel'))



			function readArtikel(){
				$('#add-row').DataTable({

					"pageLength": 10,
					"bLengthChange": true,
					"bFilter": true,
					"bInfo": true,
					"processing":true,
					"bServerSide": true,
					"order": [[ 1, "asc" ]],
					'ajax' : {
						url: "{{ url('artikel/fetch') }}",
						type: "POST",
						data: function(d) {
							d._token = "{{ csrf_token() }}"
						}
					},
					columns:[
						{ data: 'title', name: 'title' },
						{ data: 'user.username', name: 'publisher' },
						{ data: 'status', name: 'status' },
						{
							"class" : "text-center text-nowrap",
							"render": function(data, type, row, meta){
								return `<div class="form-button-action">
														<a href="/artikel/show/${row.id}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-success btn-lg" data-original-title="Show Artikel">
															<i class="fas fa-eye"></i>
														</a>
														<a href="/artikel/edit/${row.id}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Artikel">
															<i class="fa fa-edit"></i>
														</a>
														<form action="" method="post">

															<input type="hidden" name="id" value="${row.id}">
															<a href="artikel/${row.id}" data-toggle="tooltip" title="" id="hapus" class="btn btn-link btn-danger" data-id="${row.id}"  data-original-title="Remove">
																<i class="fa fa-times"></i>
															</a>
															</form>
															</div>`;
							}
						},
					]
				});
			}

			$(document).ready(function(){
				readArtikel();
			});

			$("body").on("click","#hapus",function(e){
				e.preventDefault();
				var id = $(this).data('id');
				swal({
					title: `Are you sure you want to delete this record?`,
					text: "If you delete this, it will be gone forever.",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						console.log($(this).data('id'))

						$.ajax({
							url: "{{ url('/artikel/') }}/"+id,
							method: "DELETE",
							data: {
								_token : "{{ csrf_token() }}",
								id
							},
							success: function(result){
								if(result.message){
									var oTable = $('#add-row').dataTable();
									oTable.fnDraw(false);
								}
							}
						})
					}
				});
			});
		@endif

		@if (Route::is('dashboard'))
			$('#add-row').DataTable({
				"pageLength": 10,
				"bLengthChange": true,
				"bFilter": true,
				"bInfo": true,
				"processing":true,
				"bServerSide": true,
				"order": [[ 1, "asc" ]],
				"ajax" : {
				url: "{{ url('/user/fetch') }}",
				method: "POST",
				data: function(d){
					d._token = "{{ csrf_token() }}"
				}
			},
			columns:[
				{ data: 'username', name: 'username' },
				{ data: 'email', name: 'email' },
				{ data: 'role', name: 'role' },
				{
					"searchable" : false,
					"orderable" : false,
					"class" : "text-center text-nowrap",
					"render": function(data, type, row, meta){
						return `<div class="form-button-action">

								<button class="btn btn-link btn-success" data-id="${row.id}" data-type="Confirm" id="confirm"><i class="fa fa-eye"></i></button>
								<button class="btn btn-link btn-primary" data-id="${row.id}" data-type="Confirm" id="confirm"><i class="fa fa-edit"></i></button>
								<button class="btn btn-link btn-danger ml-2" data-id="${row.id}" data-type="Decline" id="decline"><i class="fa fa-times"></i></button>

									</div>`;
								}
							},
						]

			});
		@endif

		@if (Route::is('membership'))
		$('#add-row').DataTable({
			"pageLength": 10,
			"bLengthChange": true,
			"bFilter": true,
			"bInfo": true,
			"processing":true,
			"bServerSide": true,
			"order": [[ 1, "asc" ]],
			"ajax" : {
				url: "{{ url('/membership/fetch') }}",
				method: "POST",
				data: function(d){
					d._token = "{{ csrf_token() }}"
				}
			},
			columns:[
				{ data: 'user.username', name: 'username' },
				{ data: 'amount', name: 'amount' },
				{
					class: "text-center text-nowrap",
					render: function(data, tyoe, row, meta){
							return `
							<a href="{{ url('/') }}/bukti/${row.proof_payment}" target="_blank" class="btn btn-round btn-success btn-sm">
                                    <i class="fas fa-eye my-auto"></i>
							</a>
							`;
						}
				},
				// { data: 'payment_status', name: 'payment status' },
				{
					render: function(data, type, row, meta){
						var kelas = '';
						if(row.payment_status == 'Pending'){
							kelas = 'badge rounded-pill bg-warning text-white';
						}else if(row.payment_status == 'Confirm'){
							kelas = 'badge rounded-pill bg-success text-white';

						}else{
							kelas = 'badge rounded-pill bg-danger text-white';

						}
						return `<span class="${kelas}">${row.payment_status}</span>`;
					}
				},
				{
					"class" : "text-center text-nowrap",
					"render": function(data, type, row, meta){
						return `<div class="form-button-action">

								<button class="btn btn-icon btn-round btn-success" data-id="${row.id}" data-type="Confirm" id="confirm"><i class="fa fa-check"></i></button>
								<button class="btn btn-icon btn-round btn-danger ml-2" data-id="${row.id}" data-type="Decline" id="decline"><i class="fa fa-times"></i></button>

									</div>`;
								}
							},
						]
					});
					// <form action="/artikel/${row.id}" method="post">
					// 	@csrf

					// 	<button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger hapus" data-original-title="Remove">
					// 		<i class="fa fa-times"></i>
					// 	</button>
					// </form>

			$('body').on('click', '#decline', function(){
				console.log($(this).attr('data-id'));
				console.log($(this).attr('data-type'));
				const url = "{{ url('/membership/update') }}";
				const id = $(this).attr('data-id');
				const type = $(this).attr('data-type');
				$.ajax({
					url,
					method: "POST",
					data: {
						_token : "{{ csrf_token() }}",
						id,
						type
					},
					success: function(result){
						var oTable = $('#add-row').dataTable();
						oTable.fnDraw(false);
					}
				})
			});
			$('body').on('click', '#confirm', function(){
				console.log($(this).attr('data-id'));
				console.log($(this).attr('data-type'));
				const url = "{{ url('/membership/update') }}";
				const id = $(this).attr('data-id');
				const type = $(this).attr('data-type');
				$.ajax({
					url,
					method: "POST",
					data: {
						_token : "{{ csrf_token() }}",
						id,
						type
					},
					success: function(result){
						var oTable = $('#add-row').dataTable();
						oTable.fnDraw(false);
					}
				})
			});
		@endif


		@if(Route::is('challenge'))
			$('#add-row').DataTable({
				"pageLength": 10,
				"bLengthChange": true,
				"bFilter": true,
				"bInfo": true,
				"processing":true,
				"bServerSide": true,
				"order": [[ 1, "asc" ]],
				"ajax" : {
					url: "{{ url('/challenge/fetch') }}",
					method: "POST",
					data: function(d){
						d._token = "{{ csrf_token() }}"
					}
				},
				columns:[
					{ data: 'day', name: 'Day' },
					{ data: 'level_diagnosa', name: 'level diagnosa' },
					{ data: 'content', name: 'content' },
					{ data: 'description', name: 'description' },
					{
						"class" : "text-center text-nowrap",
						"render": function(data, type, row, meta){
							return `<div class="form-button-action">
													<a href="/challenge/show/${row.id}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-success btn-lg" data-original-title="Show challenge">
														<i class="fas fa-eye"></i>
													</a>
													<a href="/challenge/edit/${row.id}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit challenge">
														<i class="fa fa-edit"></i>
													</a>
													<form action="" method="post">

														<input type="hidden" name="id" value="${row.id}">
														<a href="challenge/${row.id}" data-toggle="tooltip" title="" id="hapus" class="btn btn-link btn-danger" data-id="${row.id}"  data-original-title="Remove">
															<i class="fa fa-times"></i>
														</a>
														</form>
														</div>`;
						}
					}
				]
			});
			$("body").on("click","#hapus",function(e){
				e.preventDefault();
				var id = $(this).data('id');
				swal({
					title: `Are you sure you want to delete this record?`,
					text: "If you delete this, it will be gone forever.",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						console.log($(this).data('id'))
						$.ajax({
							url: "{{ url('/challenge/') }}/"+id,
							method: "DELETE",
							data: {
								_token : "{{ csrf_token() }}",
								id
							},
							success: function(result){
								if(result.message){
									var oTable = $('#add-row').dataTable();
									oTable.fnDraw(false);
								}
							}
						})
					}
				});
			});
		@endif
	</script>
     <script >
        $(document).ready(function() {
            $('#basic-datatables').DataTable({
            });

        });
    </script>
</body>
</html>
