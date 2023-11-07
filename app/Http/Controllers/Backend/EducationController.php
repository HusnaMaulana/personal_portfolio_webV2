<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;

use App\Models\education;

class EducationController extends Controller
{
    public function education_add(Request $request) 
    {
       return view('backend.education.add');
    }

    public function education_add_post(Request $request) 
    {
        // $request->validate([
        //     'tingkat_pendidikan' => 'required|regex:/^[A-Za-z]+$/',
        //     'nama_instansi' => 'required|regex:/^[A-Za-z0-9]+$/',
        //     'tahun_masuk' => 'required|regex:/^[0-9]+$/',
        //     'tahun_lulus' => 'required|regex:/^[0-9]+$/'

        // ]);

       //dd($request->all());
       $insertRecord = new education;

       $insertRecord->tingkat_pendidikan = trim($request->tingkat_pendidikan);
       $insertRecord->nama_instansi = trim($request->nama_instansi);
       $insertRecord->jurusan = trim($request->jurusan);
       $insertRecord->tahun_masuk = trim($request->tahun_masuk);
       $insertRecord->tahun_lulus = trim($request->tahun_lulus);

       $insertRecord->save();

    return redirect('admin/education/')->with('success', "Education Page Successfully Save");

    }
    public function admin_education_edit($id, Request $request)
    {
        $data['educationRecord'] = education::find($id);
        return view('backend.education.edit', $data);
    }
    

    public function admin_education_edit_post($id, Request $request)
    {
        // dd($request->all());
        $updateRecord = education::find($id);

        $updateRecord->tingkat_pendidikan = trim($request->tingkat_pendidikan);
        $updateRecord->nama_instansi = trim($request->nama_instansi);
        $updateRecord->jurusan = trim($request->jurusan);
        $updateRecord->tahun_masuk = trim($request->tahun_masuk);
        $updateRecord->tahun_lulus = trim($request->tahun_lulus);


        $updateRecord->save();

        return redirect('admin/education/')->with('success', "Education Page Successfully Update");
 


    }

    public function admin_education_delete($id)
    {
        education::where('id', $id)->delete(); 
        return redirect()->to('admin/education')->with('success', 'Education Berhasil melakukan delete data'); 
    }
}