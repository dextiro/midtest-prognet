<!DOCTYPE html>  
 <html lang="en">  
 <head>  
 <meta charset="utf-8">  
 <meta http-equiv="X-UA-Compatible" content="IE=edge">  
 <meta name="viewport" content="width=device-width, initial-scale=1">  
 <title>Edit Mahasiswa</title>  
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">  
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">  
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">   
 <link rel="stylesheet" type="text/css" href="{{asset('css/style.css') }}">  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
 </head>  
 <body>  
  @include('sweetalert::alert')
   <div class="container" style="margin-top:50px;">  
     <div class="table-wrapper">  
       <div class="table-title">  
         <div class="row">  
           <div class="col-sm-6" >  
            <h2 >Form Edit<b>Mahasiswa </b></h2>  
           </div>  
         </div>  
       </div>  
      <form method="POST" action="{{ url('mahasiswa/edit/'.$mahasiswa->id) }}">    
        {{ csrf_field() }}  
           {{ method_field('PATCH') }}  
      <div class="modal-body">  
       <div class="form-group">  
        <label>Name</label>  
        <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $mahasiswa->nama) }}">  
       </div>  
       <div class="form-group">  
        <label>NIM</label>  
        <input type="number" class="form-control" name="nim" id="nim" value="{{ old('nim', $mahasiswa->nim) }}">  
       </div> 
       <div class="form-group">  
        <label>Email</label>  
        <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $mahasiswa->email) }}">  
       </div>    
       <div class="form-group">  
        <label>Alamat</label>  
        <input type="text" class="form-control" name="alamat" id="alamat" value="{{ old('alamat', $mahasiswa->alamat) }}">  
       </div>
       <div class="form-group">  
        <label>Nomor Telepon</label>  
        <input type="text" class="form-control" name="no_telepon" id="no_telepon" value="{{ old('no_telepon', $mahasiswa->no_telepon) }}">  
       </div>
       <label>Jurusan</label>
       <select class="form-control" id="jurusan_id" name="jurusan_id">
        @foreach ($jurusan as $item)
          <option value="{{ $item->id }}">{{$item->nama}}</option>
        @endforeach
      </select>
         
      </div>  
      <div class="modal-footer">
        <a href="{{  url('mahasiswa') }}" class="btn btn-default btn-sm">
          <i class="fa fa-undo"></i> BACK
        </a>
       <input type="submit" class="btn btn-info" value="SAVE">  
     </div>  
    </form>  
   </div>  
  </div>  