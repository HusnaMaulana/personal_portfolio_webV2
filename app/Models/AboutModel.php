<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutModel extends Model
{
    use HasFactory;
    protected $fillable = ['id','first_name','last_name','date_of_birth','nationality','address','phone','email','languages','gender'];

    protected $table = 'about';

    public $timestamps=false;
}