@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <p class="h4">Rekap Data Pengeluaran</p>
                    <a href="{{route('pengeluaran.create')}}" class="btn btn-primary">Tambah Data</a>

                </div>

                <div class="card-body">
                   <div class="table-responsivee">
                    <table class="table table-hover" id="data-table">
                        <thead>
                            <th>Pemohon</th>
                            <th>Kebutuhan</th>
                            <th>Tanggal Transaksi</th>
                            <th>Nominal</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$item->pemohon}}</td>
                                <td>{{$item->kebutuhan}}</td>
                                <td>{{$item->tanggal_pengeluaran}}</td>
                                <td>{{$item->nominal}}</td>
                                <td>
                                    <a href="{{route('pengeluaran.show',$item->id)}}" class="btn btn-warning">Detail</a>
                                </td>
                            </tr>                                
                            @endforeach
                        </tbody>
                    </table>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection