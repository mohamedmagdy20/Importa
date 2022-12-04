<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;
class Containers extends Model
{
    use HasFactory;
    protected $table = 'containers';
    protected $fillable = [
        'container_num',
        'transaction_id',
        'received_date'
    ];


    /**
     * Get the user that owns the Containers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
