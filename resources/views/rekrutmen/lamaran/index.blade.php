@extends('master')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>LAMARAN</h1>
				<p>Daftar Lamaran</p>
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
								<h4 class="card-title">List Lamaran</h4>
							</div>
						</div>
						<table id="example" class="display" style="width:100%">
							<thead>
								<tr>
									<th>Pelamar</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($lamaran as $item)
									<tr>
										<td>{{ $item->user->nama }}</td>
										<td>
											@if ($item->status == 'Diajukan')
												<label class="badge badge-warning">{{ $item->status }}</label>
											@elseif ($item->status == 'Ditolak')
												<label class="badge badge-danger">{{ $item->status }}</label>
											@endif
										</td>
										<td></td>
									</tr>
								@endforeach
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
