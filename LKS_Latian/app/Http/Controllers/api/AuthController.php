<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Society;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    
    public function register(Request $request)
    {
            $dataSociety = new Society();
            $rules = [
                'name' => 'required',
                'password' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Proses Validasi gagal',
                    'data' => $validator->errors()
                ],401);
            }

            $dataSociety->name = $request->name;
            $dataSociety->password = Hash::make($request->password);
            $dataSociety->save();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil menambah user baru'
            ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        return response()->json([
            'message'=>'berhasil'
        ]);
        $rules = [
            'name' => 'required',
            'password' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Proses login gagal',
                'data' => $validator->errors()
            ],401);
        }

        $society = Society::where('name', $request->name)->first();
        $society = Society::where('password', $request->password)->first();
    
        if(!$society) {
            return response()->json([
                'status' => false,
                'message' => 'Nama dan Password salah'
            ],401);
        }

        $token = $society->createToken('society-token');

        return response()->json([
            'status' => true,
            'message' => 'berhasil login',
            'token' => $token->plainTextToken,
        ]);
    }

    
}
