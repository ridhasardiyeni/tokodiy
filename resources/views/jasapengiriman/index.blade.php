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
					<h3>List Data Jasa Pengiriman</h3>
					<form action="jasapengiriman-cari" method="get">
						<div class="col-md-6">
						<input type="text" name="cari" placeholder="Cari Jasa" value="{{ old('cari')}}">
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
					<a class="btn btn-sm btn-primary" href="{{route('jasapengiriman.create')}}"><i class="fa big-icon fa fa-plus-square"></i> Tambah Data</a>

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
					<th width="300px">Jenis Jasa</th>
					<th width="300px">Harga Jasa</th>
					<th width="180">Action</th>
				</tr>

				@foreach($jasapengirimans as $jasapengiriman)
					<tr>
						<td><b>{{++$i}}.</b></td>
						<td>{{$jasapengiriman->jenis_jasa}}</td>
						<td>Rp {{number_format($jasapengiriman->harga_jasa,0,".",".")}}</td>
						<td>
							<form action="{{route('jasapengiriman.destroy', $jasapengiriman->id_jasapengiriman)}}" method="post"> 
								<a class="btn btn-sm btn-success" class="fas fa-edit" href="{{route('jasapengiriman.show', $jasapengiriman->id_jasapengiriman)}}"><i class="fa big-icon fas fa-eye"></i></a>
								<a class="btn btn-sm btn-warning" href="{{route('jasapengiriman.edit', $jasapengiriman->id_jasapengiriman)}}"><i class="fa big-icon fas fa-edit"></i></a>
 
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-sm btn-danger"><i class="fa big-icon fas fa-trash"></i></button>
							</form>
						</td>
					</tr>
				@endforeach
			</table>


{!! $jasapengirimans->links() !!}
	</div>
@endsection