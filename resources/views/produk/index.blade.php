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
					<h3>List Data Produk</h3>
					<form action="produk-cari" method="get">
						<div class="col-md-6">
						<input type="text" name="cari" placeholder="Cari Produk" value="{{ old('cari')}}">
						<input class="btn btn-sm btn-success" type="submit" value="Cari">
						</div>
					</form>
					<hr>
					<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
				</div>
				<div classs="col-md-2">
					<a class="btn btn-sm btn-primary" href="{{route('produk.create')}}"><i class="fa big-icon fa fa-plus-square"></i> Tambah Data</a>

				</div>
			</div>
			@if($message= Session::get('success'))
				<div class="alert alert-success">
					<p>{{$message}}</p>
				</div>
			@endif

			<table class="w3-table-all w3-card-4">
				<tr class="w3-grey">	
					<th width="50px"><b>No.</b></th>
					<th width="300px">Penjual</th>
					<th width="300px">Kategori</th>
					<th width="300px">Produk</th>
					<th width="300px">Merek</th>
					<th width="300px">Deskripsi</th>
					<th width="300px">Harga</th>
					<th width="300px">Stok</th>
					<th width="300px">Kondisi</th>
					<th width="300px">Gambar</th>
					<th width="300px">Unit</th>
					<th width="1500px">Action</th>
				</tr>

				@foreach($produks as $produk)
					<tr>
						<td><b>{{++$i}}.</b></td>
						<td>{{$produk->user->name}}</td>
						<td>{{$produk->kategori->nama_kategori}}</td>
						<td>{{$produk->nama_produk}}</td>
						<td>{{$produk->merk_produk}}</td>
						<td>{{$produk->desc_produk}}</td>
						<td>Rp.{{number_format($produk->harga_produk,0,".",".")}}</td>
						<td>{{$produk->stok_produk}}</td>
						<td>{{$produk->kondisi_produk}}</td>
						<td><img width="150px" height="100px" src="{{asset('img_produk/'.$produk->file_produk.'')}}"></td>
						
						<td>{{$produk->unit->nama_unit}}</td>
						

						
						<td>
							<form action="{{route('produk.destroy', $produk->id_produk)}}" method="post"> 
								<a class="btn btn-sm btn-success" class="fas fa-edit" href="{{route('produk.show', $produk->id_produk)}}"><i class="fa big-icon fas fa-eye"></i></a>
								<a class="btn btn-sm btn-warning" href="{{route('produk.edit', $produk->id_produk)}}"><i class="fa big-icon fas fa-edit"></i></a>
 
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-sm btn-danger"><i class="fa big-icon fas fa-trash"></i></button>
							</form>
						</td>
					</tr>
				@endforeach
			</table>


{!! $produks->links() !!}
	</div>
@endsection