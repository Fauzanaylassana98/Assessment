<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('barangs')->select('*');
            return Datatables::of($data)
                ->addColumn('options', function ($row) {
                    $editUrl = route('barang.ubah', ['idBarang' => $row->id]);
                    $deleteUrl = route('barang.hapus', $row->id);

                    return '
                            <a href="' . $editUrl . '" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <form action="' . $deleteUrl . '" method="POST" style="display:inline;">
                                ' . csrf_field() . '
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>';
                })
                ->rawColumns(['options'])
                ->make(true);
        }

        return view('page.admin.barang.index');
    }
    public function tambahBarang(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'KodeBarang' => 'required|string|max:255|unique:barangs,KodeBarang',
                'NamaBarang' => 'required|string|max:255',
                'Satuan' => 'required|string|max:18',
                'HargaSatuan' => 'required|numeric',
                'Stok' => 'required|integer',
            ]);

            $barang = Barang::create([
                'KodeBarang' => $request->KodeBarang,
                'NamaBarang' => $request->NamaBarang,
                'Satuan' => $request->Satuan,
                'HargaSatuan' => $request->HargaSatuan,
                'Stok' => $request->Stok,
            ]);

            return redirect()->route('barang.index')->with('status', 'Data barang berhasil ditambahkan');
        }

        return view('page.admin.barang.addBarang');
    }


    public function ubahBarang($idBarang, Request $request)
    {
        $barang = Barang::findOrFail($idBarang);

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'KodeBarang' => 'required|string|max:255|unique:barangs,KodeBarang,' . $idBarang,
                'NamaBarang' => 'required|string|max:255',
                'Satuan' => 'required|string|max:18',
                'HargaSatuan' => 'required|numeric',
                'Stok' => 'required|integer',
            ]);

            $barang->update($request->all());

            return redirect()->route('barang.index')->with('status', 'Data barang berhasil diubah');
        }

        return view('page.admin.barang.ubahBarang', ['barang' => $barang]);
    }

    public function hapusBarang($idBarang)
    {
        $barang = Barang::findOrFail($idBarang);
        $barang->delete();

        return response()->json([
            'msg' => 'Data barang yang dipilih telah dihapus'
        ]);
    }
}
