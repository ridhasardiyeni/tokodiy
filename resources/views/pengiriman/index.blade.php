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
					<h3>List Data Penjualan</h3>
					
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
					<th width="350px">Kode Pembayaran</th>
					<th width="300px">Penjual</th>
					<th width="300px">Pembeli</th>
					<th width="300px">No Resi</th>
					<th width="300px">Status</th>
					<th width="180">Action</th>
				</tr>

				@foreach($pengirimans as $pengiriman)
					<tr>
						
						<td><b>{{++$i}}.</b></td>
						<td>{{$pengiriman->kode_pembayaran}}</td>
						<td>{{$pengiriman->penjual->name}}</td>
						<td>{{$pengiriman->pembeli->name}}</td>
						<td>{{$pengiriman->no_resi}}</td>
						<td>{{$pengiriman->is_status}}</td>
						
						<td>
							<form action="{{route('pengiriman.destroy', $pengiriman->id_pengiriman)}}" method="post"> 
								<a class="btn btn-sm btn-success" class="fas fa-edit" href="{{route('pengiriman.show', $pengiriman->id_pengiriman)}}"><i class="fa big-icon fas fa-eye"></i></a>
								
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-sm btn-danger"><i class="fa big-icon fas fa-trash"></i></button>
							</form>
						</td>
					</tr>
				@endforeach
			</table>


{!! $pengirimans->links() !!}
	</div>
@endsection