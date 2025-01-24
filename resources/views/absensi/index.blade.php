@extends('master')
@section('css')
	{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
@endsection
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
			<div class="alert danger">
				{{ session('error') }}
			</div>
		@endif
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="d-flex justify-content-between">
							<div>
								<h4 class="card-title">List Absensi</h4>
							</div>
							{{-- <div>
								<a href="" class="btn btn-outline-primary btn-icon-text">
									<i class="fa fa-plus-square btn-icon-prepend"></i> Tambah Karyawan</a>
							</div> --}}
							<div>
								@if (Auth::user()->jabatan == 'Karyawan' || Auth::user()->jabatan == 'Admin')
									<button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
										Absen
									</button>
								@endif
								@if (Auth::user()->jabatan == 'Man Keuangan' || Auth::user()->jabatan == 'Admin' || Auth::user()->jabatan == 'Direktur')
									<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#rekapAbsensi">
										Rekap Absen
									</button>
								@endif
							</div>
						</div>
						<table id="example" class="display" style="width:100%">
							<thead>
								<tr>
									<th style="width: 5px; text-align:center">#</th>
									<th>Nama</th>
									<th>Tanggal</th>
									<th>Foto Masuk</th>
									<th>Jam Masuk</th>
									<th>Foto Pulang</th>
									<th>Jam Pulang</th>
									<th>Durasi Kerja</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>
								@php
									// Mengelompokkan data berdasarkan karyawan dan tanggal
									$groupedData = $dataAbsen->groupBy(function ($item) {
									    return $item->id_karyawan . '_' . \Carbon\Carbon::parse($item->created_at)->format('Y-m-d');
									});
								@endphp

								@foreach ($groupedData as $key => $group)
									@php
										// Data Masuk
										$masuk = $group->firstWhere('keterangan', 'masuk');

										// Data Pulang
										$pulang = $group->firstWhere('keterangan', 'pulang');

										// Data Cuti
										$cuti = $group->firstWhere('keterangan', 'Cuti');

										// Data Izin
										$izin = $group->firstWhere('keterangan', 'Izin');

										// Perhitungan Durasi Kerja (hanya berlaku jika ada data masuk dan pulang)
										$durasiKerja = null;
										if ($masuk && $pulang && $masuk->created_at && $pulang->created_at) {
										    $masukTime = \Carbon\Carbon::parse($masuk->created_at);
										    $pulangTime = \Carbon\Carbon::parse($pulang->created_at);
										    $durasiKerja = $masukTime->diff($pulangTime); // Menghitung selisih waktu
										}
									@endphp
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>
											{{-- Menampilkan nama karyawan yang ada --}}
											{{ $masuk->user->nama ?? ($pulang->user->nama ?? ($cuti->user->nama ?? ($izin->user->nama ?? '-'))) }}
										</td>
										<td>
											{{-- Menampilkan tanggal --}}
											{{ \Carbon\Carbon::parse($masuk->created_at ?? ($pulang->created_at ?? ($cuti->created_at ?? ($izin->created_at ?? now()))))->format('d F Y') }}
										</td>
										<td>
											{{-- Foto Masuk --}}
											@if ($masuk && $masuk->foto)
												<img src="{{ asset('storage/absensi/' . $masuk->foto) }}" alt="Foto Masuk"
													style="width: 100px; height: auto;">
											@else
												-
											@endif
										</td>
										<td>
											{{-- Jam Masuk --}}
											@if ($masuk && $masuk->created_at)
												{{ \Carbon\Carbon::parse($masuk->created_at)->format('H:i:s') }}
											@else
												-
											@endif
										</td>
										<td>
											{{-- Foto Pulang --}}
											@if ($pulang && $pulang->foto)
												<img src="{{ asset('storage/absensi/' . $pulang->foto) }}" alt="Foto Pulang"
													style="width: 100px; height: auto;">
											@else
												-
											@endif
										</td>
										<td>
											{{-- Jam Pulang --}}
											@if ($pulang && $pulang->created_at)
												{{ \Carbon\Carbon::parse($pulang->created_at)->format('H:i:s') }}
											@else
												-
											@endif
										</td>
										<td>
											{{-- Durasi Kerja --}}
											@if ($durasiKerja)
												{{ $durasiKerja->format('%h jam %i menit') }}
											@else
												-
											@endif
										</td>
										<td>
											{{-- Keterangan (Cuti, Izin, Kehadiran Lengkap) --}}
											@if ($cuti)
												Cuti
											@elseif ($izin)
												Izin
											@elseif ($masuk && $pulang)
												Kehadiran Lengkap
											@else
												-
											@endif
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('absensi.modalAbsen')
	@include('absensi.modalRekap')
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
