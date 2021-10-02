<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offer extends Model
{
    use HasFactory;

    protected $fillable = ['name_ar', 'name_en', 'price', 'photo'];
    protected $hidden = ['created_at', 'updated_at'];

}
