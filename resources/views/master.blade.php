<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>SIMPEG</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
	<!-- endinject -->
	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('assets/vendors/jquery-bar-rating/css-stars.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<!-- endinject -->
	<!-- Layout styles -->
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<!-- End layout styles -->
	<link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">

	{{-- datatable --}}
	<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">


	@yield('css')
</head>

<body>
	<div class="container-scroller">
		<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar sidebar-offcanvas" id="sidebar">
			<ul class="nav">
				<li class="nav-item nav-profile border-bottom">
					<a href="#" class="nav-link flex-column">
						<div class="nav-profile-image">
							<img src="assets/images/faces/face1.jpg" alt="profile">
							<!--change to offline or busy as needed-->
						</div>
						<div class="nav-profile-text d-flex ms-0 mb-3 flex-column">
							<span class="fw-semibold mb-1 mt-2 text-center">Antonio Olson</span>
							<span class="text-secondary icon-sm text-center">$3499.00</span>
						</div>
					</a>
				</li>
				<li class="pt-2 pb-1">
					<span class="nav-item-head">Dashboard</span>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('dashboard') }}">
						<i class="mdi mdi-compass-outline menu-icon"></i>
						<span class="menu-title">Dashboard</span>
					</a>
				</li>

				<li class="pt-2 pb-1">
					<span class="nav-item-head">Rekrutmen</span>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-bs-toggle="collapse" href="#rekrutmen" aria-expanded="false" aria-controls="rekrutmen">
						<i class="fa fa-address-book-o menu-icon"></i>
						<span class="menu-title">Rekrutmen</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse" id="rekrutmen">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"> <a class="nav-link" href="{{ route('lowongan.index') }}">Lowongan</a></li>
							<li class="nav-item"> <a class="nav-link" href="{{ route('lamaran.index') }}">Lamaran</a></li>
						</ul>
					</div>
				</li>

				<li class="pt-2 pb-1">
					<span class="nav-item-head">Karyawan</span>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-bs-toggle="collapse" href="#karyawan" aria-expanded="false" aria-controls="karyawan">
						<i class="fa fa-users menu-icon"></i>
						<span class="menu-title">Karyawan</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse" id="karyawan">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"> <a class="nav-link" href="{{ route('karyawan.index') }}">Karyawan</a></li>
							<li class="nav-item"> <a class="nav-link" href="{{ route('absensi.index') }}">Absensi</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</nav>
		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<!-- partial:partials/_navbar.html -->
			<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
				<div class="navbar-menu-wrapper d-flex align-items-stretch">
					<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
						<span class="mdi mdi-chevron-double-left"></span>
					</button>
					<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
						<a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../../assets/images/logo-mini.svg"
								alt="logo" /></a>
					</div>
					<ul class="navbar-nav navbar-nav-right">
						<li class="nav-item nav-profile dropdown d-none d-md-block">
							<a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
								aria-expanded="false">
								<div class="nav-profile-text">@auth
										{{ Auth::user()->nama }} - {{ Auth::user()->jabatan }}
									@endauth &nbsp;</div>
								<i class="fa fa-user-circle-o"></i>
							</a>
							<div class="dropdown-menu center navbar-dropdown" aria-labelledby="profileDropdown">
								{{-- <a class="dropdown-item" href="#">
									<i class="flag-icon flag-icon-bl me-3"></i>Log Out </a> --}}
								<a class="dropdown-item" href="{{ route('logout') }}"
									onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									{{ __('Log Out') }}
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>
						</li>
					</ul>
					<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
						data-toggle="offcanvas">
						<span class="mdi mdi-menu"></span>
					</button>
				</div>
			</nav>
			<!-- partial -->
			<div class="main-panel">
				<div class="content-wrapper">
					<!-- CONTENT HERE -->
					@yield('content')
				</div>
				<!-- content-wrapper ends -->
				<!-- partial:partials/_footer.html -->
				<footer class="footer">
					<div class="d-sm-flex justify-content-center justify-content-sm-between">
						<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">SIMPEG © 2024</span>
					</div>
				</footer>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

	@yield('js')
	<!-- plugins:js -->
	<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
	<script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
	<script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
	<!-- endinject -->
	<!-- Plugin js for this page -->
	<script src="{{ asset('assets/vendors/jquery-bar-rating/jquery.barrating.min.js') }}"></script>
	<script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>
	<script src="{{ asset('assets/vendors/flot/jquery.flot.js') }}"></script>
	<script src="{{ asset('assets/vendors/flot/jquery.flot.resize.js') }}"></script>
	<script src="{{ asset('assets/vendors/flot/jquery.flot.categories.js') }}"></script>
	<script src="{{ asset('assets/vendors/flot/jquery.flot.fillbetween.js') }}"></script>
	<script src="{{ asset('assets/vendors/flot/jquery.flot.stack.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
	<!-- End plugin js for this page -->
	<!-- inject:js -->
	<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
	<script src="{{ asset('assets/js/misc.js') }}"></script>
	<script src="{{ asset('assets/js/settings.js') }}"></script>
	<script src="{{ asset('assets/js/todolist.js') }}"></script>
	<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
	<!-- endinject -->
	<!-- Custom js for this page -->
	<script src="{{ asset('assets/js/proBanner.js') }}"></script>
	<script src="{{ asset('assets/js/dashboard.js') }}"></script>
	<script src="{{ asset('assets/js/file-upload.js') }}"></script>
	<script src="{{ asset('assets/js/typeahead.js') }}"></script>
	<script src="{{ asset('assets/js/select2.js') }}"></script>
	<!-- End custom js for this page -->


</body>

</html>
