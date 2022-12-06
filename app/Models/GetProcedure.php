<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomProcedures;
use App\Models\ShippingAgent;
use App\Models\User;

class GetProcedure extends Model
{
    use HasFactory;
    protected $table ='get_custom_procedure';
    protected $fillable = [
        'custom_procedure_id',
        'shipment_agent_id',
        'arrive_date',
        'user_id'
    ];

    public function customProcedure()
    {
        return $this->belongsTo(CustomProcedures::class,'custom_procedure_id');
    }

    public function shipingAgent()
    {
        return $this->belongsTo(ShippingAgent::class,'shipment_agent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);

    }

}
