<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAgent extends Model
{
    use HasFactory;
    protected $table = 'shipping_agents';
    protected $fillable =[
        'name',
        'notes'
    ];
    
}
