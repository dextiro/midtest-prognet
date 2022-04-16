
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Data Mahasiswa dan Kelompok Studi</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css') }}">  

</head>
<body>
	@include('sweetalert::alert')
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Data Mahasiswa dan<b> Kelompok Studi</b></h2>
						<p></p>
						<input class="form-control" type="text" name="q" value="" placeholder="Cari disini.." />
					</div>
					
					<div class="col-sm-6">
						
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambah Data </span></a>
			
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>

					<tr>
						<th>#</th>
						<th>Nama Mahasiswa</th>
						<th>Kelompok Studi</th>
                        <th>Action</th>
    
					</tr>
				</thead>
				<?php $no = 1 ?>
				<tbody>
					@foreach($userdetails as $userdetail)
					<tr>		
						<td>{{ $no++ }}</td>
						<td>{{ $userdetail->id_mahasiswa}}</td>
                        <td>{{ $userdetail->id_kelompokstudi}}</td>

						<td class="text-center">
                            <a href="{{  url('userdetail/edit/'.$userdetail->id) }}" class="btn btn-sm" style="margin-bottom:5px;">
                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>
							<form action="{{ url('userdetail/destroy/'.$userdetail->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus Data?')">
							@method('delete')
							@csrf
							<button class="btn btn-sm">
								<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
							</button>
							</form>
						</td>
					</tr>
					@endforeach
									
				</tbody>
			</table>
				
		</div>
	</div>        
</div>


<!-- Tambah Pelajar -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{ url('/userdetail/create')}}">
				{{ csrf_field() }} 
				<div class="modal-header">						
					<h4 class="modal-title">Tambah Mahasiswa dan Kelompok Studi</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Nama Mahasiswa</label>
                    <select class="form-control" id="mahasiswa_id" name="mahasiswa_id">
                        @foreach ($mahasiswa as $item)
                          <option value="{{ $item->id }}">{{$item->nama}}</option>
                        @endforeach
                      </select>
					</div>
                    <div class="form-group">
						<label>Kelompok Studi</label>
                    <select class="form-control" id="kelompokstudi_id" name="kelompokstudi_id">
                        @foreach ($kelompokstudi as $item)
                          <option value="{{ $item->id }}">{{$item->nama}}</option>
                        @endforeach
                      </select>
					</div>

				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>


