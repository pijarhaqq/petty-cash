<?php

namespace App\Http\Controllers;

// jangan lupa masukin models nya
use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // menampilkan data
        $data = Pemasukan::all();
        return view('pemasukan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemasukan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if($request->hasFile('bukti_transaksi'))
        {
            $path_simpan='public/images/transfer';
            $gambar = $request->file('bukti_transaksi');
            $nama = $gambar->getClientOriginalName();
            $path = $request->file('bukti_transaksi')->storeAs($path_simpan, $nama);
            $input['bukti_transaksi'] = $nama;
        }

        // masukkan dari model
        Pemasukan::create($input);
        return redirect()->route('pemasukan.index');

        // ini namanya pardam, buat ngecek udah sesuai apa belum sama inputannya
        // dd($input);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Pemasukan::find($id);
        return view('pemasukan.detail', compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Pemasukan::find($id);
        return view('pemasukan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $data = Pemasukan::find($id);
        if($request->hasFile('bukti_transaksi'))
        {
            $path_simpan='public/images/transfer';
            $gambar = $request->file('bukti_transaksi');
            $nama = $gambar->getClientOriginalName();
            $path = $request->file('bukti_transaksi')->storeAs($path_simpan, $nama);
            $input['bukti_transaksi'] = $nama;
        }
        $data->update($input);
        return redirect()->route('pemasukan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Pemasukan::find($id);
        $data->delete();
        return redirect()->route('pemasukan.index');
    }
}
