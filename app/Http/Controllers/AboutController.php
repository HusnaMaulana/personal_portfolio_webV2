<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\AboutModel;

class AboutController extends Controller
{

    public function index(Request $request)
    {
        $data = AboutModel::all();
        return response()->json(['aboutRecord' => $data]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'last_name'  => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'date_of_birth' => 'required|date|after_or_equal:1960-01-01', 
            'gender' => 'required|in:Pria,Laki-Laki,Wanita,Perempuan,Boy,Girl,Woman,Men', 
            'nationality' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:13|regex:/^[0-9\s]+$/',
            'email' => 'required|email|max:255', 
            'languages' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/', 
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $data = [
            'first_name' => trim($request->first_name),
            'last_name' => trim($request->last_name),
            'date_of_birth' => trim($request->date_of_birth),
            'gender' => trim($request->gender),
            'nationality' => trim($request->nationality),
            'address' => trim($request->address),
            'phone' => trim($request->phone),
            'email' => trim($request->email),
            'languages' => trim($request->language),
        ];

        AboutModel::updateOrCreate([], $data);

        return response()->json(['success' => 'About Page Successfully Save']);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'last_name'  => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'date_of_birth' => 'required|date|after_or_equal:1960-01-01', 
            'gender' => 'required|in:Pria,Laki-Laki,Wanita,Perempuan,Boy,Girl,Woman,Men', 
            'nationality' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:13|regex:/^[0-9\s]+$/',
            'email' => 'required|email|max:255', 
            'languages' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/', 
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'languages' => $request->languages,
        ];

        AboutModel::where('id', $id)->update($data);
        return response()->json(['success' => 'About Page Successfully Update']);
    }

    public function destroy($id)
    {
        AboutModel::where('id', $id)->delete();
        return response()->json(['success' => 'Berhasil melakukan delete data']);
    }
}
