<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceModel extends Model
{
    use HasFactory;
    protected $fillable = ['id','organisasi','periode','bidang','jabatan','keterangan'];

    protected $table = 'experience';

    public $timestamps = false;
}