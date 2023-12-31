<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

    protected $table = 'schedules';
    protected $fillable = [
        'time_in',
        'time_out'
    ];

    use HasFactory;


    
    public function Employees()
    {
        return $this->hasMany(Employee::class, 'position_id', 'id');
    }
}
