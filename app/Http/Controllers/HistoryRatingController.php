<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penulis;
use App\Models\Penerbit;
use App\Models\User;
use App\Models\Genre;
use App\Models\History_Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\DB;
use DataTables;

class HistoryRatingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('history_ratings')->select('*');
            return Datatables::of($data)
                ->addColumn('options', function ($row) {
                    // $detailUrl = route('history_rating.detail', $row->id);
                    $editUrl = route('history_rating.ubah', ['id' => $row->id]);
                    $deleteUrl = route('history_rating.delete', $row->id);
                    
                    // <a href="' . $detailUrl . '" class="btn btn-warning"><i class="fas fa-info-circle"></i></a>

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

        return view('page.user.history_rating.index');
    }

    public function tambahRating(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'ulasan' => 'required',
                'nilai_rating' => 'required|numeric',
                'idUser' => 'required|exists:users,id',
                'idBuku' => 'required|exists:bukus,id',
            ]);

            $historyRating = History_Rating::create([
                'ulasan' => $request->ulasan,
                'nilai_rating' => $request->nilai_rating,
                'idUser' => $request->idUser,
                'idBuku' => $request->idBuku,
            ]);

            return redirect()->route('history_rating.index')->with('status', 'Rating berhasil ditambahkan');
        }

        return view('page.user.history_rating.addRating');
    }

    // Tambahkan fungsi edit, update, dan destroy sesuai kebutuhan Anda
}
