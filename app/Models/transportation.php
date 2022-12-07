<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Containers;
use App\Models\Drivers;
class Transportation extends Model
{
    use HasFactory;
    protected $table = 'transportations';
    protected $fillable =[
        'container_id',
        'deiver_id',
        'container_out_date',
        'arrive_date',
        'leave_date',
        'container_arrive_date',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function container()
    {
        return $this->belongsTo(Containers::class,'container_id');
    }
    public function driver()
    {
        return $this->belongsTo(Drivers::class,'deiver_id');
    }
}
