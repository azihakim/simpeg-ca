@extends('master')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Pengajuan Resign Karyawan</h1>
				{{-- <p>Daftar Karyawan</p> --}}
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
								<h4 class="card-title">Data Resign</h4>
							</div>
							@if (Auth::user()->jabatan == 'Admin' || Auth::user()->jabatan == 'Karyawan')
								<div>
									<a href="{{ route('resign.create') }}" class="btn btn-outline-primary btn-icon-text">
										<i class="fa fa-plus-square btn-icon-prepend"></i> Tambah Pengajuan Resign</a>
								</div>
							@endif
						</div>
						<table id="example" class="display" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama Karyawan</th>
									<th>Status</th>
									<th>Tanggal Pengajuan</th>
									@if (Auth::user()->jabatan == 'Admin' || Auth::user()->jabatan == 'Direktur')
										<th>Aksi</th>
									@endif
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $item)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $item->user->nama }}</td>
										<td>
											@if ($item->status == 'Menunggu')
												<span class="badge badge-warning">{{ $item->status }}</span>
											@elseif($item->status == 'Diterima')
												<span class="badge badge-success">{{ $item->status }}</span>
											@else
												<span class="badge badge-danger">{{ $item->status }}</span>
											@endif
										</td>
										<td>{{ $item->created_at->format('d F Y') }}</td>
										@if (Auth::user()->jabatan == 'Admin' || Auth::user()->jabatan == 'Direktur')
											<td>
												<div class="dropdown">
													<button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuOutlineButton1"
														data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
													<div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1" style="">
														<div class="dropdown-divider"></div>

														@if (Auth()->user()->jabatan == 'Admin' || Auth::user()->jabatan == 'Direktur')
															<h6 class="dropdown-header">Ubah Status</h6>
															<form action="{{ route('resign.status', $item->id) }}" method="POST" style="display:inline;">
																@csrf
																@method('PUT')
																<input type="hidden" name="status" value="Ditolak">
																<button class="dropdown-item" type="submit">Tolak</button>
															</form>
															<form action="{{ route('resign.status', $item->id) }}" method="POST" style="display:inline;">
																@csrf
																@method('PUT')
																<input type="hidden" name="status" value="Diterima">
																<button class="dropdown-item" type="submit">Terima</button>
															</form>
														@endif
													</div>
												</div>
												@if (Auth::user()->jabatan == 'Admin')
													<a href="{{ route('resign.edit', $item->id) }}" class="btn btn-outline-warning">Edit</a>
													<form action="{{ route('resign.destroy', $item->id) }}" method="POST" class="d-inline">
														@csrf
														@method('delete')
														<button class="btn btn-outline-danger"
															onclick="return confirm('Yakin Ingin Menghapus Data Ini?')">Hapus</button>
													</form>
												@endif
											</td>
										@endif
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
@endsection
