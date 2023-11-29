<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Tenan;
use App\Models\Kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotaController extends Controller
{
    public function tambahTransaksi(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'KodeNota' => 'required|string|max:255|unique:notas,KodeNota',
                'KodeTenan' => 'required|string|max:255|exists:tenans,KodeTenan',
                'KodeKasir' => 'required|string|max:255|exists:kasirs,KodeKasir',
                'TglNota' => 'required|date',
                'JamNota' => 'required|time',
                'JumlahBelanja' => 'required|numeric',
                'Diskon' => 'numeric',
                'Total' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return redirect()->route('nota.index')->withErrors($validator)->withInput();
            }

            // Simpan transaksi ke dalam tabel Nota
            $nota = Nota::create([
                'KodeNota' => $request->input('KodeNota'),
                'KodeTenan' => $request->input('KodeTenan'),
                'KodeKasir' => $request->input('KodeKasir'),
                'TglNota' => $request->input('TglNota'),
                'JamNota' => $request->input('JamNota'),
                'JumlahBelanja' => $request->input('JumlahBelanja'),
                'Diskon' => $request->input('Diskon', 0),
                'Total' => $request->input('Total'),
            ]);

            // Tambahkan logika lain sesuai kebutuhan, seperti menambahkan detail penjualan, mengurangi stok barang, dll.

            return redirect()->route('nota.index')->with('status', 'Transaksi berhasil ditambahkan.');
        }

        // Mengambil data tenan dan kasir untuk digunakan pada dropdown di form
        $tenans = Tenan::all();
        $kasirs = Kasir::all();

        return view('page.admin.nota.tambah_transaksi', compact('tenans', 'kasirs'));
    }
}
