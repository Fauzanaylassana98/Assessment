<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class KasirController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('kasirs')->select('*');
            return Datatables::of($data)
                ->make(true);
        }

        return view('page.admin.kasir.index');
    }
}
