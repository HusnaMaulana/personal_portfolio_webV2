<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;

use App\Models\SkillModel;

class SkillController extends Controller
{
    public function skill_add(Request $request) 
    {
       return view('backend.skill.add');
    }

    public function skill_add_post(Request $request) 
    {
       //dd($request->all());
       $insertRecord = new SkillModel;

       $insertRecord->skill = trim($request->skill);
       $insertRecord->percentage = trim($request->percentage);
       
       
       $insertRecord->save();

    return redirect('admin/skill/')->with('success', "Skill Page Successfully Save");

    }
    public function admin_skill_edit($id, Request $request)
    {
        $data['skillRecord'] = SkillModel::find($id);
        return view('backend.skill.edit', $data);
    }
    

    public function admin_skill_edit_post($id, Request $request)
    {
        // dd($request->all());
        $updateRecord = SkillModel::find($id);

        $updateRecord->skill = trim($request->skill);
        $updateRecord->percentage = trim($request->percentage);

        $updateRecord->save();

        return redirect('admin/skill/')->with('success', "Skill Page Successfully Update");
 


    }

    public function admin_skill_delete($id)
    {
        SkillModel::where('id', $id)->delete(); 
        return redirect()->to('admin/skill')->with('success', 'Skill Berhasil melakukan delete data'); 
    }
}