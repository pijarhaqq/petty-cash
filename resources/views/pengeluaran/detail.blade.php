@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Detail Pengeluaran</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Pemohon</th>
                                <td>{{$data->pemohon}}</td>
                            </tr>
                            <tr>
                                <th>Kebutuhan</th>
                                <td>{{$data->kebutuhan}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Transaksi</th>
                                <td>{{$data->tanggal_pengeluaran}}</td>
                            </tr>
                            <tr>
                                <th>Nominal</th>
                                <td>Rp.{{$data->nominal}},-</td>
                            </tr>
                            <tr>
                                <th>Bukti Transaksi</th>
                                <td><img src="{{asset('storage/images/transfer/'.$data->bukti_transfer)}}" alt="bukti transfer" width="150px"></td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>{!! ($data->keterangan) !!}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{route('pengeluaran.edit', $data->id)}}" class="btn btn-warning m-2">Edit</a>
                    <form action="{{route('pengeluaran.destroy', $data->id)}}" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger m-2" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</button>
                    </form>
                    <a href="{{route('pengeluaran.index')}}" class="btn btn-info m-2">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
