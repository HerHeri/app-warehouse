<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    function index(Request $request){
        if($request->ajax()){
            $user = User::with('role')->get();
            return DataTables::of($user)->toJson();
        }
    }

    function credit($id){
        try {
            $user = User::firstWhere('id', $id);
            return response()->json([
                'status' => true,
                'data' => $user
            ]);
        } catch (\Throwable $th) {
            return [
                'status' => false,
                'message' => $th->getMessage()
            ];
        }
    }

    function store(Request $request){
        try {
            if($request->iduser){
                $user = User::firstWhere('id', $request->iduser);
            }else{
                $user = new User();
                $user->password = Hash::make('12345678');
                $user->email = $request->emailuser;
            }
            $user->status = $request->statususer;
            $user->role_id = $request->roleuser;
            $user->name = $request->nameuser;
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil disimpan'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
}
