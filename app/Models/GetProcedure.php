<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetProcedure extends Model
{
    use HasFactory;
    protected $table ='get_custom_procedure';
    protected $fillable = [
        'custom_procedure_id',
        'shipment_agent_id',
        'arrive_date',
    ];
}
