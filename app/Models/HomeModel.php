<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeModel extends Model
{
    use HasFactory;
    protected $fillable = ['id','profile','your_name','work_experience','description'];

    protected $table = 'home';

    public $timestamps = false;
}