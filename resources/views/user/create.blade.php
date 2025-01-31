@extends('master')
@section('content')
	<div class="container">
		@if (session('success'))
			<div class="alert alert-success" id="success-alert">
				{{ session('success') }}
			</div>
			<script>
				setTimeout(function() {
					document.getElementById('success-alert').style.display = 'none';
				}, 3000);
			</script>
		@endif
		@if (session('error'))
			<div class="alert alert-danger" id="error-alert">
				{{ session('error') }}
			</div>
			<script>
				setTimeout(function() {
					document.getElementById('error-alert').style.display = 'none';
				}, 3000);
			</script>
		@endif
		<div class="row justify-content-center">
			<div class="col-md-6 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Form Tambah Pengguna</h4>
						<p class="card-description"> Masukkan Data Dengan Benar </p>
						<form action="{{ route('user.store') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="form-group col-md-12">
									<label>Nama</label>
									<input type="text" name="nama" class="form-control" placeholder="Nama">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-12">
									<label>Username</label>
									<input type="text" name="username" class="form-control" placeholder="Username">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-12">
									<label>Password</label>
									<input type="password" name="password" class="form-control" placeholder="Password">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-12">
									<label>Role</label>
									<select required name="jabatan" class="form-control">
										<option disabled selected>Pilih Role</option>
										<option value="Direktur">Direktur</option>
										<option value="Pengadaan">Pengadaan</option>
										<option value="Man Keuangan">Man Keuangan</option>
										<option value="Karyawan">Karyawan</option>
									</select>
								</div>
							</div>
							<div class="row" id="divisiFormGroup" style="display: none;">
								<div class="form-group col-md-12">
									<label>Divisi</label>
									<select required name="divisi_id" class="form-control">
										<option disabled selected>Pilih Divisi</option>
										@foreach ($divisi as $item)
											<option value="{{ $item->id }}">{{ $item->nama_jabatan }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="d-flex justify-content-end">
								<button type="submit" class="btn btn-outline-primary">Simpan</button>
							</div>
						</form>


					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const roleSelect = document.querySelector('select[name="jabatan"]');
			const divisiFormGroup = document.getElementById('divisiFormGroup');
			const divisiSelect = divisiFormGroup.querySelector('select');

			roleSelect.addEventListener('change', function() {
				if (this.value === 'Karyawan') {
					divisiFormGroup.style.display = 'block';
					divisiSelect.setAttribute('required', 'required');
				} else {
					divisiFormGroup.style.display = 'none';
					divisiSelect.removeAttribute('required');
				}
			});

			// Trigger change event on page load to set initial state
			roleSelect.dispatchEvent(new Event('change'));
		});
	</script>
@endsection
