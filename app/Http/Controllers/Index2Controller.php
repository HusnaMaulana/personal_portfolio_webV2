<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Backend\GaleriController;
use App\Models\GaleriModel;
use Illuminate\Http\Request;
use App\Models\HomeModel;
use App\Models\AboutModel;
use App\Models\ExperienceModel;
use App\Models\Education;
use App\Models\SkillModel;
use App\Models\PortfolioModel;

class Index2Controller extends Controller
{
    public function index2()
    {
        $data['homeRecord'] = HomeModel::all(); 
        $data['aboutRecord'] = AboutModel::all();
        $data['portfolioRecord'] = PortfolioModel::get();
        $data['experienceRecord']= ExperienceModel::all();
        $data['skillRecord']= SkillModel::all();
        $data['educationRecord']= Education::all();
        $data['galeriRecord']= GaleriModel::all();

        return view('index2', $data); // Contoh: Mengembalikan tampilan (view) "index2.blade.php"
    }
}
