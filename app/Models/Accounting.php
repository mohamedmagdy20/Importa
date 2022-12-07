<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounting extends Model
{
    use HasFactory;
    protected $table ='accountings';

    protected $fillable = [
        'invoice_number',
        'custom_procedure_id',
        'release_date',
        'user_id'
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function customProcedure()
    {
        return $this->belongsTo(CustomProcedures::class,'custom_procedure_id');
    }
    

}
