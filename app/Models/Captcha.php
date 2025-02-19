<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Captcha extends Model
{
    use HasFactory;

    protected $table = 'captcha';

    protected $fillable = ['code', 'image_path'];
}
