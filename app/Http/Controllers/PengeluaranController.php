<?php

namespace App\Http\Controllers;

// jangan lupa masukin models nya
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
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
        $data = Pengeluaran::all();
        return view('pengeluaran.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if($request->hasFile('bukti_transfer'))
        {
            $path_simpan='public/images/keluar';
            $gambar = $request->file('bukti_transfer');
            $nama = $gambar->getClientOriginalName();
            $path = $request->file('bukti_transfer')->storeAs($path_simpan, $nama);
            $input['bukti_transfer'] = $nama;
        }

        // masukkan dari model
        Pengeluaran::create($input);
        return redirect()->route('pengeluaran.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Pengeluaran::find($id);
        return view('pengeluaran.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Pengeluaran::find($id);
        return view('pengeluaran.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $data = Pengeluaran::find($id);
        if($request->hasFile('bukti_transfer'))
        {
            $path_simpan='public/images/keluar';
            $gambar = $request->file('bukti_transfer');
            $nama = $gambar->getClientOriginalName();
            $path = $request->file('bukti_transfer')->storeAs($path_simpan, $nama);
            $input['bukti_transfer'] = $nama;
        }
        $data->update($input);
        return redirect()->route('pengeluaran.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Pengeluaran::find($id);
        $data->delete();
        return redirect()->route('pengeluaran.index');//
    }
}
