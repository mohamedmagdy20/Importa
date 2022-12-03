<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPort extends Model
{
    use HasFactory;
    protected $table = 'custom_ports';
    protected $fillable =[
        'name_en',
        'name_ar',
        'notes'
    ];
}
