<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class education extends Model
{
    use HasFactory;
    protected $fillable = [
        'sekolah_dasar',
        'periode_sd',
        'smp',
        'periode_smp',
        'sma',
        'periode_sma',
        'perguruan_tinggi',
        'periode_pt'
    ];
    protected $table = 'education';
    public $timestamps = false;
}