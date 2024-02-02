<?php

namespace App\Http\Controllers\api;

use App\Models\Regional;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RegionalResource;

class RegionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $query = Regional::get();

        return response()->json([
            'message' => 'Data regional ditemukan',
            'data' => RegionalResource::collection($query)
        ],200);
    }

}
