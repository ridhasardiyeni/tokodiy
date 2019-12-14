@extends('index')
@section('content')

	<div class="container">
			<div class="row">
				<div class="col-md-10">
					<h3>List Data Media</h3>
					<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
					<hr>
				</div>
				<div classs="col-md-2">
					<a class="btn btn-sm btn-primary" href="{{route('media.create')}}"><i class="fa big-icon fa fa-plus-square"></i> Tambah Data</a>

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
					<th width="300px">Produk</th>
					<th width="300px">File Media</th>
					<th width="180">Action</th>
				</tr>

				@foreach($medias as $media)
					<tr>
						<td><b>{{++$i}}.</b></td>
						<td>{{$media->produk->nama_produk}}</td>
						<td><img width="150px" height="100px" src="{{asset('img_media/'.$media->file_media.'')}}"></td>
						
						<td>
							<form action="{{route('media.destroy', $media->id_media)}}" method="post"> 
								<a class="btn btn-sm btn-success" class="fas fa-edit" href="{{route('media.show', $media->id_media)}}"><i class="fa big-icon fas fa-eye"></i></a>
								<a class="btn btn-sm btn-warning" href="{{route('media.edit', $media->id_media)}}"><i class="fa big-icon fas fa-edit"></i></a>
 
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-sm btn-danger"><i class="fa big-icon fas fa-trash"></i></button>
							</form>
						</td>
					</tr>
				@endforeach
			</table>


{!! $medias->links() !!}
	</div>
@endsection