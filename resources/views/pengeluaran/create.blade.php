@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Input Data Pengeluaran</div>


                <!-- form harus pake csrf -->
                <form action="{{route('pengeluaran.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- name isi sesuai nama di kolom di database -->
                    <div class="card-body">
                        <div class="form-group p-3">
                            <label>Pemohon</label>
                            <input type="text" name="pemohon" required class="form-control">
                        </div>
                        <div class="form-group p-3">
                            <label>Kebutuhan</label>
                            <input type="text" name="kebutuhan" required class="form-control">
                        </div>
                        <div class="form-group p-3">
                            <label>Tanggal Pengeluaran</label>
                            <input type="date" name="tanggal_pengeluaran" required class="form-control">
                        </div>
                        <div class="form-group p-3">
                            <label>Nominal (IDR)</label>
                            <input type="number" name="nominal" required class="form-control">
                        </div>
                        <div class="form-group p-3">
                            <label>Bukti Transfer</label>
                            <input type="file" name="bukti_transfer" required class="form-control">
                        </div>
                        <div class="form-group p-3">
                            <label>Keterangan</label>
                            <textarea name="keterangan" id="content" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Tambah Data</button>
                        <a href="{{route('pengeluaran.index')}}" class="btn btn-danger m-2">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
