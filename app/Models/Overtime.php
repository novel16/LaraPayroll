<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{

    protected $table = 'overtime';

    protected $fillable = [
        'employee_id',
        'hours',
        'rate',
        'date_of_overtime'
    ];

    use HasFactory;

    public function overtimeEmployee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
