<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeModel;
use App\Models\AboutModel;
use App\Models\ExperienceModel;
use App\Models\Education;
use App\Models\SkillModel;
use App\Models\PortfolioModel;
use App\Models\GaleriModel;


class HomeController extends Controller
{
    public function index ()
    {
        $data['homeRecord'] = HomeModel::all(); 
        $data['aboutRecord'] = AboutModel::all();
        $data['portfolioRecord'] = PortfolioModel::get();
        $data['experienceRecord']= ExperienceModel::all();
        $data['skillRecord']= SkillModel::all();
        $data['educationRecord']= Education::all();
        $data['galeriRecord']= GaleriModel::all();

        return view('index', $data);
    }

    public function index2 ()
    {
        $data['homeRecord'] = HomeModel::all(); 
        $data['aboutRecord'] = AboutModel::all();
        $data['portfolioRecord'] = PortfolioModel::get();
        $data['experienceRecord']= ExperienceModel::all();
        $data['skillRecord']= SkillModel::all();
        $data['educationRecord']= Education::all();
        $data['galeriRecord']= GaleriModel::all();

        return view('index2', $data);
    }
    // public function about() 
    // {
    //     return view('about');
    // }
    public function components ()
    {
        return view('components');
    }
}
