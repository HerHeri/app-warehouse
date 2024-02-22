<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Listbarang;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BarangController extends Controller
{
    function index(Request $request){
        if($request->ajax()){
            $barang = Listbarang::get();
            return DataTables::of($barang)->toJson();
        }
    }
}
