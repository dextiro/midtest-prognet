
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Data Kelompok Studi</title>
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
						<h2>Data <b>Kelompok Studi</b></h2>
						<p></p>
						<input class="form-control" type="text" name="q" value="" placeholder="Cari disini.." />
					</div>
					
					<div class="col-sm-6">
						
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambah Kelompok Studi </span></a>
			
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>

					<tr>
						<th>#</th>
						<th>Nama Kelompok Studi</th>
						<th>Email</th>
						<th>Actions</th>
					</tr>
				</thead>
				<?php $no = 1 ?>
				<tbody>
					@foreach($kelompokstudis as $kelompokStudi)
					<tr>		
						<td>{{ $no++ }}</td>
						<td>{{ $kelompokStudi->nama}}</td>
						<td>{{ $kelompokStudi->email }}</td>
						<td class="text-center">
                            <a href="{{  url('kelompokstudi/edit/'.$kelompokStudi->id) }}" class="btn btn-sm" style="margin-bottom:5px;">
                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>
							<form action="{{ url('kelompokstudi/destroy/'.$kelompokStudi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus Data?')">
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
			<form method="POST" action="{{ url('/kelompokstudi/create')}}">
				{{ csrf_field() }} 
				<div class="modal-header">						
					<h4 class="modal-title">Tambah Kelompok Studi</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Nama Kelompok Studi</label>
						<input type="text" class="form-control" name="nama" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" name="email" required>
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


