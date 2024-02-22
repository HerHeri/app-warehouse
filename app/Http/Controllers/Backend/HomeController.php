<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Listbarang;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        try {
            $admin = User::where('role_id', 1)->get();
            $keeper = User::where('role_id', 2)->get();
            $staff = User::where('role_id', 3)->get();
            $barang = Listbarang::where('stock', '!=', 0)->get();
            return response()->json([
                'status' => true,
                'admin' => [
                    'count' => $admin->count(),
                    'admin' => $admin
                ],
                'keeper' => [
                    'count' => $keeper->count(),
                    'keeper' => $keeper
                ],
                'staff' => [
                    'count' => $staff->count(),
                    'staff' => $staff
                ],
                'barang' => [
                    'count' => $barang->count(),
                    'barang' => $barang
                ],
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
}
