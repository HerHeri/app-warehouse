<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Listbarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class BarangController extends Controller
{
    function index(Request $request){
        if($request->ajax()){
            $barang = Listbarang::get();
            return DataTables::of($barang)->toJson();
        }
    }

    function credit($id){
        try {
            $barang = Listbarang::firstWhere('id', $id);
            return response()->json([
                'status' => true,
                'data' => $barang
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    function store(Request $request){
        try {
            if($request->idbarang){
                $user = Listbarang::where('id', $request->idbarang)->first();
            }else{
                $user = new Listbarang();
            }
            $user->nama_barang = $request->namabarang;
            $user->kode_barang = $request->kodebarang;
            $user->harga = $request->hargabarang;
            $user->status = $request->statusbarang;
            $user->stock = $request->stockbarang;
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil disimpan'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal dihapus'
            ]);
        }
    }

    function delete($id){
        try {
            $barang = Listbarang::where('id', $id)->delete();
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal dihapus'
            ]);
        }
    }
}
