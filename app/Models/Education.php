<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class education extends Model
{
    use HasFactory;
    protected $fillable = ['id','tingkat_pendidikan','jurusan','nama_instansi','tahun_masuk','tahun_lulus'];
    protected $table = 'education';
    public $timestamps = false;
  
}