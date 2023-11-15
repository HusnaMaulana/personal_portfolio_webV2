<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;

use App\Models\GaleriModel;

class GaleriController extends Controller
{

    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;

        if (strlen($katakunci)) {
            $data['galeriRecord'] = GaleriModel::where('deskripsi', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data['galeriRecord'] = GaleriModel::orderBy('id', 'asc')->paginate($jumlahbaris);
        }

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'deskripsi' => 'required|string|max:255',
            'image' => 'required|image',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $insertRecord = new GaleriModel;
        $insertRecord->deskripsi = trim($request->deskripsi);

        if (!empty($request->file('image'))) {
            $file       = $request->file('image');
            $randomStr  = Str::random(30);
            $filename   = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('public/galeri/', $filename);
            $insertRecord->image = $filename;
        }

        $insertRecord->save();

        return response()->json(['success' => 'Galeri Page Successfully Save']);
    }

    public function show($id)
    {
        $data['galeriRecord'] = GaleriModel::find($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $updateRecord = GaleriModel::find($id);

        $validator = Validator::make($request->all(), [
            'deskripsi' => 'required|string|max:255',
            'image' => 'image',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $updateRecord->deskripsi = trim($request->deskripsi);

        if (!empty($request->file('image'))) {
            if (!empty($updateRecord->image) && file_exists('public/galeri/' . $updateRecord->image)) {
                unlink('public/galeri/' . $updateRecord->image);
            }
            $file = $request->file('image');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('public/galeri/', $filename);
            $updateRecord->image = $filename;
        }

        $updateRecord->save();

        return response()->json(['success' => 'Galeri Page Successfully Update']);
    }

    public function destroy($id)
    {
        GaleriModel::where('id', $id)->delete();
        return response()->json(['success' => 'Galeri Berhasil melakukan delete data']);
    }
}
