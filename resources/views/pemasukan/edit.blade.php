@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Data</div>


                <!-- form harus pake csrf -->
                <form action="{{route('pemasukan.update', $data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}

                    <!-- name isi sesuai nama di kolom di database -->
                    <div class="card-body">
                        <div class="form-group p-3">
                            <label>Sumber Dana / Pemasukan</label>
                            <input type="text" name="sumber_pemasukan" value="{{$data->sumber_pemasukan}}" required class="form-control">
                        </div>
                        <div class="form-group p-3">
                            <label>Tanggal Masuk</label>
                            <input type="date" name="tgl_masuk" value="{{$data->tgl_masuk}}" required class="form-control">
                        </div>
                        <div class="form-group p-3">
                            <label>Nominal (IDR)</label>
                            <input type="number" name="nominal" value="{{$data->nominal}}" required class="form-control">
                        </div>
                        <div class="form-group p-3">
                            {{-- ga muncul karena harus update jquery --}}
                            <label>Bukti Transaksi</label>
                            <input type="file" name="bukti_transaksi" value="{{$data->bukti_transaksi}}" class="form-control">
                        </div>
                        <div class="form-group p-3">
                            <label>Keterangan</label>
                            <textarea name="keterangan" id="content" class="form-control">
                                {!! ($data->keterangan) !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        <a href="{{route('pemasukan.index')}}" class="btn btn-danger m-2">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
