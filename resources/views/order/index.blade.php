@extends('index')
@section('content')
<style> 
input[type=date] {
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
					<h3>List Data Order</h3>
					<form action="order-cari" method="get">
						<div class="col-md-6">
						<input type="date" name="cari"  value="{{ old('cari')}}">
						<input class="btn btn-sm btn-success" type="submit" value="Cari">
						</div>
					</form>
					<hr>
					<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
				</div>
				<div classs="col-md-2">
					<a class="btn btn-sm btn-primary" href="{{route('order.create')}}"><i class="fa big-icon fa fa-plus-square"></i> Tambah Data</a>

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
					<th width="300px">Produk</th>
					<th width="300px">Supplier</th>
					<th width="300px">Tanggal Order</th>
					<th width="300px">QTY</th>
					<th width="180">Action</th>
				</tr>

				@foreach($orders as $order)
					<tr>
						<td><b>{{++$i}}.</b></td>
						<td>{{$order->produk->nama_produk}}</td>
						<td>{{$order->suplier->nama_suplier}}</td>
						<td>{{$order->tgl_order}}</td>
						<td>{{$order->qty}}</td>
						
						<td>
							<form action="{{route('order.destroy', $order->id_order)}}" method="post"> 
								<a class="btn btn-sm btn-success" class="fas fa-edit" href="{{route('order.show', $order->id_order)}}"><i class="fa big-icon fas fa-eye"></i></a>
								<a class="btn btn-sm btn-warning" href="{{route('order.edit', $order->id_order)}}"><i class="fa big-icon fas fa-edit"></i></a>
 
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-sm btn-danger"><i class="fa big-icon fas fa-trash"></i></button>
							</form>
						</td>
					</tr>
				@endforeach
			</table>


{!! $orders->links() !!}
	</div>
@endsection