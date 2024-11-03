@extends('master')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Absensi</h1>
				<p>Absensi Karyawan</p>
			</div>
		</div>
		@if (session('success'))
			<div class="alert alert-success" id="success-alert">
				{{ session('success') }}
			</div>
		@endif
		@if (session('error'))
			<div class="alert alert-error">
				{{ session('error') }}
			</div>
		@endif
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="d-flex justify-content-between">
							<div>
								<h4 class="card-title">List Karyawn</h4>
							</div>
							<div>
								<a href="" class="btn btn-outline-primary btn-icon-text">
									<i class="fa fa-plus-square btn-icon-prepend"></i> Tambah Karyawan</a>
							</div>
						</div>
						<table id="example" class="display" style="width:100%">
							<thead>
								<tr>
									<th>Status</th>
									<th>Nama</th>
									<th>Status Kerja</th>
									<th>NIK</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script>
		new DataTable('#example');
	</script>
	<script>
		setTimeout(function() {
			let successAlert = document.getElementById('success-alert');
			let fadeEffect = setInterval(function() {
				if (!successAlert.style.opacity) {
					successAlert.style.opacity = 1;
				}
				if (successAlert.style.opacity > 0) {
					successAlert.style.opacity -= 0.1;
				} else {
					clearInterval(fadeEffect);
					successAlert.style.display = 'none';
				}
			}, 50);
		}, 4000);
	</script>
@endsection
