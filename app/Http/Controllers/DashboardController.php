<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeModel;
use Illuminate\Support\Facades\Validator;
use Str;

class DashboardController extends Controller
{
    public function index(Request $request) 
    {
        $data = HomeModel::all();
        return response()->json(['homeRecord' => $data]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'your_name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'work_experience' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'description' => 'required|string|max:255',
            'profile' => 'required|image' 
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $data = [
            'your_name' => trim($request->your_name),
            'work_experience' => trim($request->work_experience),
            'description' => trim($request->description),
        ];

        $homeModelCount = HomeModel::count();
        $insertRecord = ($homeModelCount === 0) ? new HomeModel : HomeModel::find($request->id);

        if (!empty($request->file('profile'))) {
            $file = $request->file('profile');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('public/assets/imgs/', $filename);

            if (!empty($insertRecord->profile) && file_exists('public/assets/imgs/'. $insertRecord->profile)) {
                unlink('public/assets/imgs/'. $insertRecord->profile);
            }

            $data['profile'] = $filename;
        }

        HomeModel::updateOrCreate([], $data);

        return response()->json(['success' => 'Home Page Successfully Save']);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'your_name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'work_experience' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'description' => 'required|string|max:255',
            'profile' => 'nullable|image' 
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $data = [
            'your_name' => $request->your_name,
            'work_experience' => $request->work_experience,
            'description' => $request->description,
        ];

        if (!empty($request->file('profile'))) {
            $file = $request->file('profile');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('public/assets/imgs/', $filename);

            $data['profile'] = $filename;
        }

        HomeModel::where('id', $id)->update($data);

        return response()->json(['success' => 'Home Page Successfully Update']);
    }

    public function destroy($id)
    {
        HomeModel::where('id', $id)->delete(); 
        return response()->json(['success' => 'Berhasil melakukan delete data']); 
    }
}
