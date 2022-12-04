<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [ 'schedule_id', 'emp_id', 'checkin_at', 'checkout_at', 'worked_hours' ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }
}
