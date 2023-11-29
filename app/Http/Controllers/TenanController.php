<?php

namespace App\Http\Controllers;

use App\Models\Tenan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class TenanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('tenans')->select('*');
            return Datatables::of($data)
                ->make(true);
        }

        return view('page.admin.tenan.index');
    }
}
