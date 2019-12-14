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
                    <h3>List Data Pembelian</h3>
                    
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
                    <th width="300px">Pembeli</th>
                    <th width="300px">Penjual</th>
                    <th width="300px">Produk</th>
                    <th width="300px">Gambar Produk</th>
                    <th width="300px">Harga Beli</th>
                    <th width="300px">Jumlah Beli</th>
                    <th width="300px">Total Harga</th>
                    <th width="300px">Status</th>
                </tr>
                <?php
                $code = request()->kode_pembayaran;
                $datas = \App\History::where('kode_pembayaran',$code)->get();
                $i = 0;
                ?>
                @foreach($datas as $history)
                    <tr>
                        
                        <td><b>{{++$i}}.</b></td>
                        <td>{{$history->kode_pembayaran}}</td>
                        <td>{{$history->user->name}}</td>
                        <td>{{$history->penjual->name}}</td>
                        <td>{{$history->produk->nama_produk}}</td>
                        <td><img width="150px" height="100px" src="{{asset('img_produk/'.$history->produk->file_produk.'')}}"></td>
                        <td>Rp {{number_format($history->harga_beli,0,".",".")}}</td>
                        <td>{{$history->jlh_beli}}</td>
                        <td>Rp {{number_format($history->total_harga,0,".",".")}}</td>
                        <td>{{$history->is_status}}</td>
                    </tr>
                @endforeach
            </table>

    </div>
@endsection