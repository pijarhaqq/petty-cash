@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Data</div>


                <!-- form harus pake csrf -->
                <form action="{{route('pengeluaran.update', $data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}

                    <!-- name isi sesuai nama di kolom di database -->
                    <div class="card-body">
                        <div class="form-group p-3">
                            <label>Pemohon</label>
                            <input type="text" name="pemohon" value="{{$data->pemohon}}" required class="form-control">
                        </div>
                        <div class="form-group p-3">
                            <label>Kebutuhan</label>
                            <input type="text" name="kebutuhan" value="{{$data->kebutuhan}}" required class="form-control">
                        </div>
                        <div class="form-group p-3">
                            <label>Tanggal Pengeluaran</label>
                            <input type="date" name="tanggal_pengeluaran" value="{{$data->tanggal_pengeluaran}}" required class="form-control">
                        </div>
                        <div class="form-group p-3">
                            <label>Nominal (IDR)</label>
                            <input type="number" name="nominal" value="{{$data->nominal}}" required class="form-control">
                        </div>
                        <div class="form-group p-3">
                            <label>Bukti Transfer</label>
                            <input type="file" name="bukti_transfer" value="{{$data->bukti_transfer}}" class="form-control">
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
                        <a href="{{route('pengeluaran.index')}}" class="btn btn-danger m-2">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
