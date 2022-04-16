
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Data Jurusan</title>
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
						<h2>Data <b>Jurusan</b></h2>
						<p></p>
						<input class="form-control" type="text" name="q" value="" placeholder="Cari disini.." />
					</div>
					
					<div class="col-sm-6">
						
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambah Jurusan</span></a>
			
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>

					<tr>
						<th>#</th>
						<th>Nama Jurusan</th>
						<th>Email</th>
						<th>Alamat</th>
						<th>Actions</th>
					</tr>
				</thead>
				<?php $no = 1 ?>
				<tbody>
					@foreach($jurusans as $jurusan)
					<tr>		
						<td>{{ $no++ }}</td>
						<td>{{ $jurusan->nama}}</td>
						<td>{{ $jurusan->email }}</td>
						<td>{{ $jurusan->alamat }}</td>
						<td class="text-center">
                            <a href="{{  url('jurusan/edit/'.$jurusan->id) }}" style="margin-bottom:5px;" class="btn btn-sm">
                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>
							<form action="{{ url('jurusan/destroy/'.$jurusan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus Data?')">
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
			<form method="POST" action="{{ url('/jurusan/create')}}">
				{{ csrf_field() }} 
				<div class="modal-header">						
					<h4 class="modal-title">Tambah Jurusan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Nama Jurusan</label>
						<input type="text" class="form-control" name="nama" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" name="email" required>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="tex" class="form-control" name="alamat" required>
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


<!-- Edit Data Pelajar -->
@foreach($jurusans as $jurusan)
<div id="editEmployeeModal" href="{{route('jurusan.edit',$jurusan->id)}}" class="modal fade">
	
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{ route('jurusan.update',$jurusan->id)}}" method="POST">
			@csrf
            @method('patch')

				<div class="modal-header">						
					<h4 class="modal-title">Edit Data Jurusan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				
				<div class="modal-body">	
				<div class="form-group">
					<input type="text" class="form-control" name="id" value="{{$jurusan->id}}" required>
				</div>
				
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" name="nama" value="{{$jurusan->nama}}" required>
					</div>
					<div class="form-group">
						<label>Asal</label>
						<input type="text" class="form-control" name="email" value="{{$jurusan->email}}" required>
					</div>
					<div class="form-group">
						<label>Nomor Telepon</label>
						<input type="text" class="form-control" name="alamat" value="{{$jurusan->alamat}}" required>
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">

				</div>
			</form>

			@endforeach
		</div>
	</div>
</div>

<!-- Hapus Data PelajarL -->

</body>
</html>