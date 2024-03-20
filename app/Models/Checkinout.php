<?php

namespace App\Models;
use App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkinout extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 
        'state'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function Getstate()
    {
        return $this->state;
    }
}
