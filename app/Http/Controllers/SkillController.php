<?php

namespace App\Http\Controllers;

use App\Models\SkillModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = SkillModel::where('id', 'like', "%$katakunci%")
                ->orWhere('skill', 'like', "%$katakunci%")
                ->orWhere('percentage', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = SkillModel::orderBy('id', 'asc')->paginate($jumlahbaris);
        }
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'skill' => 'required',
            'percentage' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $data = [
            'skill' => $request->skill,
            'percentage' => $request->percentage,
        ];

        SkillModel::create($data);

        return response()->json(['success' => 'Berhasil menambahkan data']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $data = SkillModel::where('id', $id)->first();
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $data = [
            'skill' => $request->skill,
            'percentage' => $request->percentage,
        ];

        SkillModel::where('id', $id)->update($data);
        return response()->json(['success' => 'Berhasil melakukan update data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        SkillModel::where('id', $id)->delete();
        return response()->json(['success' => 'Berhasil melakukan delete data']);
    }
}
