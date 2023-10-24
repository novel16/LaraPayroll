<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';

    protected $fillable = [
        'description',
        'rate'
    ];

    use HasFactory;


    public function Employees()
    {
        return $this->hasMany(Employee::class, 'position_id', 'id');
    }
}
