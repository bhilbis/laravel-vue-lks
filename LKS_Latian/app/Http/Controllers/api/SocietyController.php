<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddSocietyRequest;
use App\Http\Requests\EditSocietyRequest;
use App\Http\Resources\SocietyResource;
use App\Models\Society;
use Illuminate\Http\Request;

class SocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $query = Society::get();
        $query = Society::with('regional')->get();

        return response()->json([
            'message' => 'Data berhasil di temukan',
            // 'data' => $query,
            'data' => SocietyResource::collection($query),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddSocietyRequest $request)
    {
        // $society = new Society();
        // $society->id_card_number = $request->id_card_number;
        // $society->password = $request->password;
        // $society->name = $request->name;
        // $society->born_date = $request->born_date;
        // $society->gender = $request->gender;
        // $society->address = $request->address;
        // $society->regional_id = $request->regional_id;
        // $society->save();

        $society = Society::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil di buat',
            'data' => new SocietyResource($society)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Society $society)
    {
        // $query = Society::find($id);

        return response()->json([
            'message' => 'Data berhasil di temukan',
            'data' => new SocietyResource($society),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditSocietyRequest $request, Society $society)
    {
        //
        // $society = Society::find($id);
        $society->id_card_number = $request->id_card_number;
        $society->password = $request->password;
        $society->name = $request->name;
        $society->born_date = $request->born_date;
        $society->gender = $request->gender;
        $society->address = $request->address;
        $society->regional_id = $request->regional_id;
        $society->save();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil di simpan'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Society::destroy($id);

        return response()->json(
            [
                'success' => true,
                'message' => 'Data berhasil di hapus',
            ],
            200
        );
    }
}
