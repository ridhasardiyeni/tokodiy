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
input[type=file] {
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
  textarea {
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
				<h2>Add Produk</h2>
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
	<form action="{{route('produk.store')}}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col-md-12">
				<strong>User</strong>
				<select type="text" class="w3-input w3-animate-input" class="form-control" name="id_user" style="width:80%" required>
						<option value="">-- Pilih User --</option>
						    @foreach($users as $data)
								<option value="{{$data->id_user}}">{{$data->name}}</option>
							@endforeach
						
					</select>
					<span class="help-block with-errors"></span>
			</div>
			<div class="col-md-12">
				<strong>Kategori</strong>
				<select type="text" class="w3-input w3-animate-input" class="form-control" name="id_kategori" style="width:80%" required>
						<option value="">-- Pilih Kategori --</option>
						    @foreach($kategoris as $data)
								<option value="{{$data->id_kategori}}">{{$data->nama_kategori}}</option>
							@endforeach
						
					</select>
					<span class="help-block with-errors"></span>
			</div>
			<div class="col-md-12">
				<strong>Nama Produk </strong>
				<input type="text" class="w3-input w3-animate-input" name="nama_produk" style="width:80%"placeholder="Nama Produk" rows ="5">
			</div>
			<div class="col-md-12">
				<strong>Merk Produk</strong>
				<input class="w3-input w3-animate-input" type="text" name="merk_produk"  style="width:80%" placeholder="Merk Produk">
			</div>
			<div class="col-md-12">
				<strong>Desc Produk</strong>
				<textarea class="w3-input w3-animate-input" type="text" name="desc_produk"  style="width:80%" placeholder="Desc Produk" rows="5"></textarea>
			</div>
			<div class="col-md-12">
				<strong>Harga Produk</strong>
				<input class="w3-input w3-animate-input" type="text" name="harga_produk"  style="width:80%" placeholder="Harga Produk">
			</div>
			<div class="col-md-12">
				<strong>Stok Produk</strong>
				<input class="w3-input w3-animate-input" type="text" name="stok_produk"  style="width:80%" placeholder="Stok Produk">
			</div>
			<div class="col-md-12">
				<strong>Kondisi Produk</strong>
				<select type="text" class="w3-input w3-animate-input" class="form-control" name="kondisi_produk" style="width:80%" required>
						<option value="">-- Pilih Kondisi --</option>
						<option value="0">Baru</option>
						<option value="1">Second</option>
					</select>
					<span class="help-block with-errors"></span>
			</div>
			<div class="col-md-12">
				<strong>File Produk</strong>
				<input class="w3-input w3-animate-input" type="file" name="file_produk"  style="width:80%">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
			</div>
			
			<div class="col-md-12">
				<strong>Unit</strong>
				<select type="text" class="w3-input w3-animate-input" class="form-control" name="id_unit" style="width:80%" required>
						<option value="">-- Pilih Unit--</option>
						    @foreach($units as $data)
								<option value="{{$data->id_unit}}">{{$data->nama_unit}}</option>
							@endforeach
						
					</select>
					<span class="help-block with-errors"></span>
			</div>
			
			<div class="col-md-12">
				<br>
			
				<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Save</button>
				<a href="{{route('produk.index')}}" class="btn btn-sm  btn-success"><i class="fa fa-arrow-left"></i> Back</a>
				
			</div>
		</div>
	</form>

</div>
@endsection