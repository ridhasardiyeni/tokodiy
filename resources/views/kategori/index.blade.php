@extends('index')
@section('content')
<style> 
input[type=text] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid red;
  border-radius: 4px;
}

</style>
	<div class="container">
			<div class="row">
				<div class="col-md-10">
					<h3>List Data Kategori</h3>
					<form action="kategori-cari" method="get">
						<div class="col-md-6">
						<input type="text" name="cari" placeholder="Cari Kategori" value="{{ old('cari')}}">
						<input class="btn btn-sm btn-success" type="submit" value="Cari">
						</div>
					</form>
					<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
					<hr>
				</div>
				<!-- <div class="col-md-4">
					<form action="kategori/search" method="get">
						<div class="form-group">
							<input type="search" class="form-control" name="search">
							<span class="form-group-btn">
								<button type="submit" class="btn btn-primary">Search</button>
							</span>
						</div>
					</form>
				</div> -->
				<br>
				<div classs="col-md-2 text-right">
					<a class="btn btn-sm btn-primary" href="{{route('kategori.create')}}"><i class="fa big-icon fa fa-plus-square"></i> Tambah Data</a>

				</div>
			</div>
			
			@if($message= Session::get('success'))
				<div class="alert alert-success">
					<p>{{$message}}</p>
				</div>
			@endif

			<table class="w3-table-all w3-card-4">
				<tr  class="w3-grey">
					<th width="50px"><b>No.</b></th>
					<th width="300px">Kategori</th>
					<th width="300px">Gambar Kategori</th>
					<th width="180">Action</th>
				</tr>

				@foreach($kategoris as $kategori)
					<tr>
						<td><b>{{++$i}}.</b></td>
						<td>{{$kategori->nama_kategori}}</td>
						<td><img width="150px" height="100px" src="{{asset('img_kategori/'.$kategori->gbr_kategori.'')}}"></td>
						
						<td>
							<form action="{{route('kategori.destroy', $kategori->id_kategori)}}" method="post"> 
								<a class="btn btn-sm btn-success" class="fas fa-edit" href="{{route('kategori.show', $kategori->id_kategori)}}"><i class="fa big-icon fas fa-eye"></i></a>
								<a class="btn btn-sm btn-warning" href="{{route('kategori.edit', $kategori->id_kategori)}}"><i class="fa big-icon fas fa-edit"></i></a>
 
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-sm btn-danger"><i class="fa big-icon fas fa-trash"></i></button>
							</form>
						</td>
					</tr>
				@endforeach
			</table>


{!! $kategoris->links() !!}
	</div>
@endsection