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
</style>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h3>Update Produk</h3>
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
	<form action="{{route('produk.update',$produk->id_produk)}}" method="post" enctype="multipart/form-data">
		@csrf
        @method('PUT')
		<div class="row">
			<div class="col-md-12">
				<strong>User</strong>
				<select type="text" class="w3-input w3-animate-input" class="form-control" name="id_user" style="width:80%"">
							
							    @foreach($users as $user)
									<option 
									value="{{$user->id_user}}"
										@if ($user->id_user === $produk->id_user)
											selected
										@endif
									>{{$user->name}}
								   </option>
								@endforeach
							
						</select>
						<span class="help-block with-errors"></span>
			</div>
			<div class="col-md-12">
				<strong>Kategori</strong>
				<select type="text" class="w3-input w3-animate-input" class="form-control" name="id_kategori" style="width:80%"">
							
							    @foreach($kategoris as $kategori)
									<option 
									value="{{$kategori->id_kategori}}"
										@if ($kategori->id_kategori === $produk->id_kategori)
											selected
										@endif
									>{{$kategori->nama_kategori}}
								   </option>
								@endforeach
							
						</select>
						<span class="help-block with-errors"></span>
			</div>
			
			<div class="col-md-12">
				<strong>Produk</strong>
				<input class="w3-input w3-animate-input" type="text" name="nama_produk" style="width:80%"  value="{{$produk->nama_produk}}">
			</div>
			<div class="col-md-12">
				<strong>Merek</strong>
				<input class="w3-input w3-animate-input" type="text" name="merk_produk" style="width:80%"  value="{{$produk->merk_produk}}">
			</div>
			<div class="col-md-12">
				<strong>Deskripsi</strong>
				<textarea class="w3-input w3-animate-input" name="desc_produk" rows="5" style="width:80%">{{$produk->desc_produk}}</textarea>
			</div>
			<div class="col-md-12">
				<strong>Harga</strong>
				<input class="w3-input w3-animate-input" type="text" name="harga_produk" style="width:80%"  value="{{$produk->harga_produk}}">
			</div>
			<div class="col-md-12">
				<strong>Stok</strong>
				<input class="w3-input w3-animate-input" type="text" name="stok_produk" style="width:80%"  value="{{$produk->stok_produk}}">
			</div>
			<div class="col-md-12">
				<strong>Kondisi</strong>
				<select type="text" class="w3-input w3-animate-input" class="form-control" name="kondisi_produk" style="width:80%" required>
						
						<option value="Baru">Baru</option>
						<option value="Second">Second</option>
						
					</select>
					<span class="help-block with-errors"></span>
			</div>
			<div class="col-md-12">
				<strong>File Produk</strong>
				<br><img width="150px" height="100px" src="{{asset('img_produk/'.$produk->file_produk.'')}}">
				<input class="w3-input w3-animate-input" type="file" name="file_produk" style="width:80%"  value="{{$produk->file_produk}}">

			</div>
			<div class="col-md-12">
				<strong>Unit</strong>
				<select type="text" class="w3-input w3-animate-input" class="form-control" name="id_unit" style="width:80%"">
							
							    @foreach($units as $unit)
									<option 
									value="{{$unit->id_unit}}"
										@if ($unit->id_unit === $produk->id_unit)
											selected
										@endif
									>{{$unit->nama_unit}}
								   </option>
								@endforeach
							
						</select>
						<span class="help-block with-errors"></span>
			</div>
			
			<div class="col-md-12">
                <br>
                 <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Save </button>
				<a href="{{route('produk.index')}}" class="btn btn-sm  btn-success"><i class="fa fa-arrow-left"> Back </i></a>
				
			</div>
		</div>
	</form>

</div>
@endsection