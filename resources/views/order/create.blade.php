@extends('index')
@section('content')

<style> 
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;
}
<style> 
input[type=date] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;
}
select[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;
}

</style>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
				<h2>New Order</h2>
				<hr>
				<br>
		</div>
	</div>

	@if($errors->any())
		<div class="alert alert-danger">
			<strong>Whoops! </strong>  there where some problems with you input.<br>
			<ul>
				@foreach($errors as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form action="{{route('order.store')}}" method="post">
		@csrf
		<div class="row">
			<div class="col-md-12">
				<strong>Produk</strong>
				<select type="text" class="w3-input w3-animate-input" type="text" name="id_produk"  style="width:65%"  required>
					<option value="">-- Pilih Produk --</option>
						    @foreach($produks as $data)
								<option value="{{$data->id_produk}}">{{$data->nama_produk}}</option>
							@endforeach
					</select>
			</div>
			<div class="col-md-12">
				<strong> Supplier </strong>
				<select type="text" class="w3-input w3-animate-input" name="id_suplier" style="width:70%" required>
					<option value="">-- Pilih Supplier --</option>
						    @foreach($supliers as $data)
								<option value="{{$data->id_suplier}}">{{$data->nama_suplier}}</option>
							@endforeach
				</select>
			</div>
			<div class="col-md-12">
				<strong>Tanggal Order</strong>
				<input class="w3-input w3-animate-input" type="date" name="tgl_order"  style="width:75%" placeholder="Tanggal Order">
			</div>
			<div class="col-md-12">
				<strong>QTY</strong>
				<input class="w3-input w3-animate-input" type="text" name="qty"  style="width:80%" placeholder="QTY">
			</div>
			
			<div class="col-md-12">
				<br>
			
				<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Save</button>
				<a href="{{route('order.index')}}" class="btn btn-sm  btn-success"><i class="fa fa-arrow-left"></i> Back</a>
				
			</div>
		</div>
	</form>

</div>
@endsection