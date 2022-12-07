<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;
    protected $table = 'histories';
    protected $fillable = [
        'importer_name',
        'driver_name',
        'procedure_num',
        'relase_num',
        'year',
        'container_num',
        'shipment_agent',
        'custom_port',
    ];
}
