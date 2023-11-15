<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Education;

class EducationController extends Controller
{
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;

        if (strlen($katakunci)) {
            $data = Education::where('tingkat_pendidikan', 'like', "%$katakunci%")
                ->orWhere('nama_instansi', 'like', "%$katakunci%")
                ->orWhere('jurusan', 'like', "%$katakunci%")
                ->orWhere('tahun_masuk', 'like', "%$katakunci%")
                ->orWhere('tahun_lulus', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = Education::orderBy('id', 'asc')->paginate($jumlahbaris);
        }

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tingkat_pendidikan' => 'required',
            'nama_instansi' => 'required',
            'jurusan' => 'required',
            'tahun_masuk' => 'required',
            'tahun_lulus' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $data = [
            'tingkat_pendidikan' => $request->tingkat_pendidikan,
            'nama_instansi' => $request->nama_instansi,
            'jurusan' => $request->jurusan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_lulus' => $request->tahun_lulus,
        ];

        Education::create($data);

        return response()->json(['success' => 'Education Page Successfully Save']);
    }

    public function show($id)
    {
        $data = Education::where('id', $id)->first();
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'tingkat_pendidikan' => $request->tingkat_pendidikan,
            'nama_instansi' => $request->nama_instansi,
            'jurusan' => $request->jurusan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_lulus' => $request->tahun_lulus,
        ];

        Education::where('id', $id)->update($data);

        return response()->json(['success' => 'Education Page Successfully Update']);
    }

    public function destroy($id)
    {
        Education::where('id', $id)->delete();
        return response()->json(['success' => 'Education Berhasil melakukan delete data']);
    }
}
