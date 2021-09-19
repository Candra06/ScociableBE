<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Atlantis Lite - Bootstrap 4 Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('assets/img/icon.ico')}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
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

	<script>


		// success artikel
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

		
			

		@if (route('artikel'))
			
		$('#add-row').DataTable({
			"pageLength": 5,
			"lengthMenu": [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],
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
                                                <form action="/artikel/${row.id}" method="post">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger hapus" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>`;
					} 
				},
			]
		});

		@endif
	</script>
</body>
</html>