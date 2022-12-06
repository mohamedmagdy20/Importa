<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Transaction;
class CustomProcedures extends Model
{
    use HasFactory;
    protected $table ='custom_procedures';
    protected $fillable = [
        'procedure_num',
        'transaction_id',
        'user_id',
        'updated_at',
        'date',
        'notes'
    ];

    /**
     * Get the user that owns the CustomProcedures
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
