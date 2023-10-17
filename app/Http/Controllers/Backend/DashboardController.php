<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HomeModel;
use App\Models\AboutModel;
use App\Models\ExperienceModel;
use App\Models\Education;
use App\Models\PortfolioModel;
use App\Models\SkillModel;
use Str;

class DashboardController extends Controller
{
    public function dashboard(Request $request) 
    {
        $data['homeRecord'] = HomeModel::all();
        return view('backend.dashboard.list');
    }
    public function admin_home(Request $request) 
    {
        $data['homeRecord'] = HomeModel::all();
        return view('backend.home.list', $data);
    }
    public function admin_home_post(Request $request)
    {
        $homeModelCount = HomeModel::count();

        if ($homeModelCount === 0) {
            $insertRecord = new HomeModel;
        } else {
            if ($request->add_to_update == "Add") {
                $insertRecord = request()->validate([
                    'profile' => 'required'
                ]);
            } else {
                $insertRecord = HomeModel::find($request->id);
            }
        }
        
        

        
        $insertRecord->your_name = trim($request->your_name);
        $insertRecord->work_experience = trim($request->work_experience);
        $insertRecord->description = trim($request->description);

        if (!empty($request->file('profile'))) {

            if (!empty($insertRecord->profile) && file_exists('public/assets/imgs/'. $insertRecord->profile)) {
                unlink('public/assets/imgs/'. $insertRecord->profile);
            }

            $file       = $request->file('profile');
            $randomStr  = Str::random(30);
            $filename   = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('public/assets/imgs/', $filename);
            $insertRecord->profile = $filename;
        }
        $insertRecord->save();

        return redirect()->back()->with('success', "Home Page Successfully Save");
    }
    public function admin_about(Request $request) 
    {
        $data['aboutRecord'] = AboutModel::all();
        return view('backend.about.list', $data);
    }

    public function admin_about_post(Request $request) 
    {
        $aboutModelCount = AboutModel::count();

        if ($aboutModelCount === 0) {
            $insertRecord = new AboutModel;
        } else {
            if ($request->add_to_update == "Add") {
                $insertRecord = request()->validate([
                    'first-name' => 'required'
                ]);
            } else {
                $insertRecord = AboutModel::find($request->id);
            }
        }

        $insertRecord->first_name = trim($request->first_name);
        $insertRecord->last_name = trim($request->last_name);
        $insertRecord->date_of_birth = trim($request->date_of_birth);
        $insertRecord->gender = trim($request->gender);
        $insertRecord->nationality = trim($request->nationality);
        $insertRecord->address = trim($request->address);
        $insertRecord->phone = trim($request->phone);
        $insertRecord->email = trim($request->email);
        $insertRecord->languages = trim($request->languages);
        $insertRecord->save();

        return redirect()->back()->with('success', "About Page Successfully Save");
    }

    public function admin_education(Request $request) 
    {
        $data['educationRecord']= education::all();
        return view('backend.education.list',$data);
    }

    public function admin_education_post(Request $request)
    {
        if ($request->add_to_update == "Add") {
            $insertRecord = Education::create([
                'sekolah_dasar' => trim($request->sekolah_dasar),
                'periode_sd' => trim($request->periode_sd),
                'smp' => trim($request->smp),
                'periode_smp' => trim($request->periode_smp),
                'sma' => trim($request->sma),
                'periode_sma' => trim($request->periode_sma),
                'perguruan_tinggi' => trim($request->perguruan_tinggi),
                'periode_pt' => trim($request->periode_pt),
            ]);
        } else {
            $insertRecord = Education::find($request->id);
            
            if (!$insertRecord) {
                return redirect()->back()->with('error', 'Record not found.');
            }
        
            $insertRecord->sekolah_dasar = trim($request->sekolah_dasar);
            $insertRecord->periode_sd = trim($request->periode_sd);
            $insertRecord->smp = trim($request->smp);
            $insertRecord->periode_smp = trim($request->periode_smp);
            $insertRecord->sma = trim($request->sma);
            $insertRecord->periode_sma = trim($request->periode_sma);
            $insertRecord->perguruan_tinggi = trim($request->perguruan_tinggi);
            $insertRecord->periode_pt = trim($request->periode_pt);
        
            $insertRecord->save();
        }
        
        return redirect()->back()->with('success', 'Education Page Successfully Saved');
    }    
    public function admin_portfolio(Request $request) 
    {
        $data['portfolioRecord']= PortfolioModel::all();
        return view('backend.portfolio.list',$data);
    }
    public function admin_experience(Request $request) 
    {
        $data['experienceRecord']= ExperienceModel::all();
        return view('backend.experience.list',$data);
    }

    public function admin_skill(Request $request) 
    {
        $data['skillRecord'] = SkillModel::all();
        return view('backend.skill.list', $data);
    }

    public function admin_home_delete($id)
    {
        HomeModel::where('id', $id)->delete(); 
        return redirect()->to('admin/home')->with('success', 'Berhasil melakukan delete data'); 
    }


    public function admin_about_delete($id)
    {
        AboutModel::where('id', $id)->delete(); 
        return redirect()->to('admin/about')->with('success', 'Berhasil melakukan delete data'); 
    }

    public function admin_education_delete($id)
    {
        Education::where('id', $id)->delete(); 
        return redirect()->to('admin/education')->with('success', 'Berhasil melakukan delete data'); 
    }

    public function admin_experience_delete($id)
    {
        ExperienceModel::where('id', $id)->delete(); 
        return redirect()->to('admin/experience')->with('success', 'Berhasil melakukan delete data'); 
    }




    // public function admin_contact(Request $request) 
    // {
    //     return view('backend.contact.list');
    // }
}