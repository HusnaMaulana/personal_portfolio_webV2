<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;

use App\Models\ExperienceModel;

class ExperienceController extends Controller
{
    public function experience_add(Request $request) 
    {
       return view('backend.experience.add');
    }

    public function experience_add_post(Request $request) 
    {
       //dd($request->all());
       $insertRecord = new ExperienceModel;

       $insertRecord->organisasi = trim($request->organisasi);
       $insertRecord->periode = trim($request->periode);
       $insertRecord->bidang = trim($request->bidang);
       $insertRecord->jabatan = trim($request->jabatan);
       $insertRecord->keterangan = trim($request->keterangan);
       
       
       $insertRecord->save();

    return redirect('admin/experience/')->with('success', "Experience Page Successfully Save");

    }
    public function admin_experience_edit($id, Request $request)
    {
        $data['experienceRecord'] = ExperienceModel::find($id);
        return view('backend.experience.edit', $data);
    }
    

    public function admin_experience_edit_post($id, Request $request)
    {
        // dd($request->all());
        $updateRecord = ExperienceModel::find($id);

        $updateRecord->organisasi = trim($request->organisasi);
        $updateRecord->periode = trim($request->periode);
        $updateRecord->bidang = trim($request->bidang);
        $updateRecord->jabatan = trim($request->jabatan);
        $updateRecord->keterangan = trim($request->keterangan);
        $updateRecord->save();

        return redirect('admin/experience/')->with('success', "Experience Page Successfully Update");
 

    }

    public function admin_experience_delete($id)
    {
        ExperienceModel::where('id', $id)->delete(); 
        return redirect()->to('admin/experience')->with('success', 'Berhasil melakukan delete data'); 
    }
}