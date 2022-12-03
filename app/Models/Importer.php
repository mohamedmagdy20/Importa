<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Importer extends Model
{
    use HasFactory;

    protected $table = 'importers';
    protected $fillable =[
        'name_ar',
        'name_en',
        'co_num',
        'tax_num',
        'phone_num1',
        'phone_num2',
        'email',
        'user_id'
    ];


    /**
     * Get the user that owns the Importer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
