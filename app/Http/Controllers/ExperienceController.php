<?php

namespace App\Http\Controllers;

use App\Models\ExperienceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExperienceController extends Controller
{
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;

        if (strlen($katakunci)) {
            $data = ExperienceModel::where('organisasi', 'like', "%$katakunci%")
                ->orWhere('periode', 'like', "%$katakunci%")
                ->orWhere('bidang', 'like', "%$katakunci%")
                ->orWhere('jabatan', 'like', "%$katakunci%")
                ->orWhere('keterangan', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = ExperienceModel::orderBy('id', 'asc')->paginate($jumlahbaris);
        }

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'organisasi' => 'required',
            'periode' => 'required',
            'bidang' => 'required',
            'jabatan' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $data = [
            'organisasi' => $request->organisasi,
            'periode' => $request->periode,
            'bidang' => $request->bidang,
            'jabatan' => $request->jabatan,
            'keterangan' => $request->keterangan,
        ];

        ExperienceModel::create($data);

        return response()->json(['success' => 'Berhasil menambahkan data']);
    }

    public function show($id)
    {
        $data = ExperienceModel::where('id', $id)->first();
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'organisasi' => 'required',
            'periode' => 'required',
            'bidang' => 'required',
            'jabatan' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $data = [
            'organisasi' => $request->organisasi,
            'periode' => $request->periode,
            'bidang' => $request->bidang,
            'jabatan' => $request->jabatan,
            'keterangan' => $request->keterangan,
        ];

        ExperienceModel::where('id', $id)->update($data);
        return response()->json(['success' => 'Berhasil melakukan update data']);
    }

    public function destroy($id)
    {
        ExperienceModel::where('id', $id)->delete();
        return response()->json(['success' => 'Berhasil melakukan delete data']);
    }
}
