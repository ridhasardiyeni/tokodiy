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
</style>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h3>Update Media</h3>
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
	<form action="{{route('media.update',$media->id_media)}}" method="post" enctype="multipart/form-data">
		@csrf
        @method('PUT')
		<div class="row">
			<div class="col-md-12">
				<strong>Nama Produk</strong>
				<select type="text" class="w3-input w3-animate-input" class="form-control" name="id_produk" style="width:70%"">
							
							    @foreach($produks as $produk)
									<option 
									value="{{$produk->id_produk}}"
										@if ($produk->id_produk === $media->id_produk)
											selected
										@endif
									>{{$produk->nama_produk}}
								   </option>
								@endforeach
							
						</select>
						<span class="help-block with-errors"></span>
			</div>
			
			<div class="col-md-12">
				<strong>File Media</strong>
				<br><img width="150px" height="100px" src="{{asset('img_media/'.$media->file_media.'')}}">
				<input class="w3-input w3-animate-input" type="file" name="file_media" style="width:70%"  value="{{$media->file_media}}">
			</div>
		
			
			<div class="col-md-12">
                <br>
                 <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Save </button>
				<a href="{{route('media.index')}}" class="btn btn-sm  btn-success"><i class="fa fa-arrow-left"> Back </i></a>
				
			</div>
		</div>
	</form>

</div>
@endsection