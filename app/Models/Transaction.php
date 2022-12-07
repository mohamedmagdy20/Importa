<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomPort;
use App\Models\Importer;
use App\Models\CustomProcedures;
class Transaction extends Model
{
    use HasFactory;

    protected $table ='transactions';
    protected $fillable = [
        'release_number',
        'custom_port_id',
        'importer_id',
        'received_date',
        'user_id'
    ];

    public function custom_port()
    {        
        return $this->belongsTo(CustomPort::class,'custom_port_id');
    }

    public function importer()
    {
        return $this->belongsTo(Importer::class, 'importer_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function custom_procedures()
    {
        return $this->hasMany(CustomProcedures::class,'transaction_id');
    }
}
