<?php

namespace App\Http\Controllers;

use App\Models\PortfolioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;

        if (strlen($katakunci)) {
            $data = PortfolioModel::where('title', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = PortfolioModel::orderBy('id', 'asc')->paginate($jumlahbaris);
        }

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'image' => 'required|image',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $data = [
            'title' => trim($request->title),
        ];

        if (!empty($request->file('image'))) {
            $file = $request->file('image');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('public/portfolio/', $filename);
            $data['image'] = $filename;
        }

        PortfolioModel::create($data);

        return response()->json(['success' => 'Portfolio Page Successfully Save']);
    }

    public function show($id)
    {
        $data = PortfolioModel::where('id', $id)->first();
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'image' => 'sometimes|image',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $data = [
            'title' => trim($request->title),
        ];

        if (!empty($request->file('image'))) {
            $updateRecord = PortfolioModel::find($id);

            if (!empty($updateRecord)) {
                if (!empty($updateRecord->image) && file_exists('public/portfolio/' . $updateRecord->image)) {
                    unlink('public/portfolio/' . $updateRecord->image);
                }

                $file = $request->file('image');
                $randomStr = Str::random(30);
                $filename = $randomStr . '.' . $file->getClientOriginalExtension();
                $file->move('public/portfolio/', $filename);
                $data['image'] = $filename;
            } else {
                return response()->json(['error' => 'Record not found'], 404);
            }
        }

        PortfolioModel::where('id', $id)->update($data);

        return response()->json(['success' => 'Portfolio Page Successfully Update']);
    }

    public function destroy($id)
    {
        $portfolio = PortfolioModel::find($id);

        if (!empty($portfolio->image) && file_exists('public/portfolio/' . $portfolio->image)) {
            unlink('public/portfolio/' . $portfolio->image);
        }

        PortfolioModel::where('id', $id)->delete();

        return response()->json(['success' => 'Berhasil melakukan delete data']);
    }
}
