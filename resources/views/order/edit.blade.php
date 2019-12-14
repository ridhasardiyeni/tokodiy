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
				<h3>Update Order</h3>
				<hr>
				<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
	<form action="{{route('order.update',$order->id_order)}}" method="post">
		@csrf
        @method('PUT')
		<div class="row">
			<div class="col-md-12">
				<strong>Produk</strong>
				<select class="w3-input w3-animate-input" type="text" name="id_produk" style="width:50%">
				 	 @foreach($produks as $produk)
									<option 
									value="{{$produk->id_produk}}"
										@if ($produk->id_produk === $order->id_produk)
											selected
										@endif
									>{{$produk->nama_produk}}
								   </option>
								@endforeach
				</select>
				<span class="help-block with-errors"></span>
			</div>
			
			<div class="col-md-12">
				<strong>Supplier </strong>
				<select class="w3-input w3-animate-input" type="text" name="id_suplier" style="width:60%">
				 	 @foreach($supliers as $suplier)
									<option 
									value="{{$suplier->id_suplier}}"
										@if ($suplier->id_suplier=== $order->id_suplier)
											selected
										@endif
									>{{$suplier->nama_suplier}}
								   </option>
								@endforeach
				</select>
				<span class="help-block with-errors"></span>
			</div>
			<div class="col-md-12">
				<strong>Tanggal Order</strong>
				<input class="w3-input w3-animate-input" type="date" name="tgl_order" style="width:70%"  value="{{$order->tgl_order}}">
			</div>
			<div class="col-md-12">
				<strong>QTY</strong>
				<input class="w3-input w3-animate-input" type="text" name="qty" style="width:80%"  value="{{$order->qty}}">
			</div>
			
			<div class="col-md-12">
                <br>
                 <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Save </button>
				<a href="{{route('order.index')}}" class="btn btn-sm  btn-success"><i class="fa fa-arrow-left"> Back </i></a>
				
			</div>
		</div>
	</form>

</div>
@endsection