<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Formbarang;
use App\Models\Listbarang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class FormbarangController extends Controller
{
    function formMasuk(Request $request){
        if($request->ajax()){
            $formbarang = Formbarang::with('barang')->where('type', 'in')->get();
            return DataTables::of($formbarang)->toJson();
        }
    }

    function formKeluar(Request $request){
        if($request->ajax()){
            $formbarang = Formbarang::with('barang')->where('type', 'out')->get();
            return DataTables::of($formbarang)->toJson();
        }
    }

    function credit($id){
        try {
            $formbarang = Formbarang::with('barang')->firstWhere('id', $id);
            return response()->json([
                'status' => true,
                'data' => $formbarang,
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
            $barang = Formbarang::orderBy('id', 'DESC')->first()->id ?? 1;
            if($request->type == 'in'){
                $kodeform = 'WHIN-'.Carbon::now()->format('d').'/'.Carbon::now()->format('m').'/'.Carbon::now()->format('Y').'/00'.$barang;
            }else{
                $kodeform = 'WHOUT-'.Carbon::now()->format('d').'/'.Carbon::now()->format('m').'/'.Carbon::now()->format('Y').'/00'.$barang;
            }
            if($request->idform){
                $formbarang = Formbarang::where('id', $request->idform)->first();
            }else{
                $formbarang = new Formbarang();
                $formbarang->status = 1;
                $formbarang->kode_form = $kodeform;
            }
            $formbarang->barang_id = $request->listbarang;
            $formbarang->jumlah = $request->jumlahbarang;
            $formbarang->type = $request->type;
            $formbarang->save();

            $barang = Listbarang::where('id', $request->listbarang)->first();
            $barang->stock = $barang->stock - $request->jumlahbarang;
            $barang->save();

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil disimpan'
            ]);
        } catch (\Throwable $th) {
            Log::info($th->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Data gagal disimpan'
            ]);
        }
    }

    function delete($id){
        try {
            $formbarang = Formbarang::where('id', $id)->first();
            if($formbarang->status == 1){
                $barang = Listbarang::where('id', $formbarang->barang_id)->first();
                $barang->stock = $barang->stock + $formbarang->jumlah;
                $barang->save();
                $formbarang->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil dihapus'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal dihapus'
            ]);
        }
    }
}
