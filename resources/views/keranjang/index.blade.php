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
					<h3>List Data Keranjang</h3>
					<form action="keranjang-cari" method="get">
						<!-- <div class="col-md-6">
						<input type="text" name="cari"  value="{{ old('cari')}}" placeholder="Cari Keranjang">
						<input class="btn btn-sm btn-success" type="submit" value="Cari">
						</div> -->
					</form>
					<hr>
					<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
				</div>
				<!-- <div classs="col-md-2">
					<a class="btn btn-sm btn-primary" href="{{route('order.create')}}"><i class="fa big-icon fa fa-plus-square"></i> Tambah Data</a>

				</div> -->
			</div>
			@if($message= Session::get('success'))
				<div class="alert alert-success">
					<p>{{$message}}</p>
				</div>
			@endif

			<table class="w3-table-all w3-card-4">
				<tr class="w3-grey">
					<th width="50px"><b>No.</b></th>
					<th width="300px">Pembeli</th>
					<th width="300px">Penjual</th>
					<th width="300px">Produk</th>
					<th width="300px">File Produk</th>
					<th width="300px">Harga Beli</th>
					<th width="300px">Jumlah Beli</th>
					<th width="300px">Total Harga</th>
					<th width="300px">Status</th>
					<th width="180">Action</th>
				</tr>

				@foreach($keranjangs as $keranjang)
					<tr>
						
						<td><b>{{++$i}}.</b></td>
						<td>{{$keranjang->user->name}}</td>
						<td>{{$keranjang->penjual->name}}</td>
						<td>{{$keranjang->produk->nama_produk}}</td>
						<td><img width="150px" height="100px" src="{{asset('img_produk/'.$keranjang->produk->file_produk.'')}}"></td>
						<td>Rp {{number_format($keranjang->harga_beli,0,".",".")}}</td>
						<td>{{$keranjang->jlh_beli}}</td>
						<td>Rp {{number_format($keranjang->total_harga,0,".",".")}}</td>
						<td>{{$keranjang->is_status}}</td>
						
						<td>
							<form action="{{route('keranjang.destroy', $keranjang->id_keranjang)}}" method="post"> 
								<a class="btn btn-sm btn-success" class="fas fa-edit" href="{{route('keranjang.show', $keranjang->id_keranjang)}}"><i class="fa big-icon fas fa-eye"></i></a>
								<!-- <a class="btn btn-sm btn-warning" href="{{route('keranjang.edit', $keranjang->id_keranjang)}}"><i class="fa big-icon fas fa-edit"></i></a> -->
 
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-sm btn-danger"><i class="fa big-icon fas fa-trash"></i></button>
							</form>
						</td>
					</tr>
				@endforeach
			</table>


{!! $keranjangs->links() !!}
	</div>
@endsection