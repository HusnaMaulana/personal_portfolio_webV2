<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;
use App\Models\PortfolioModel;
use App\Models\ExperienceModel;
use App\Models\HomeModel;
use App\Models\SkillModel;
use App\Models\Education;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class PdfController extends Controller
{
    public function index()
    {
        // Ambil data yang ingin Anda tampilkan dalam PDF
        $data = [
            'homeRecord' => HomeModel::all(),
            'aboutRecord' => AboutModel::all(),
            'experienceRecord' => ExperienceModel::all(),
            'educationRecord' => Education::all(),
            'portfolioRecord' => PortfolioModel::all(),
            'skillRecord' => SkillModel::all()
        ];
    
        // Convert view ke HTML
        $html = view('pdf', $data)->render();
    
        // Load HTML ke Dompdf
        $pdf = new dompdf();
        $pdf->loadHtml($html);
    
        // Set paper size
        $pdf->setPaper('A4', 'portrait');
    
        // Render PDF (first pass to get total pages)
        $pdf->render();
    
        // Stream atau unduh file PDF
        return $pdf->stream('document.pdf');
    }
}