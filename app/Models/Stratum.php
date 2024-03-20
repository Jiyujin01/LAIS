<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\User;
use App\Models\Student;


class Stratum extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Add other fillable fields as needed
        'user_id', // Assuming 'user_id' is the foreign key column
        'level',
        'School_year'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
    }

    public function getClassname()
    {
        return $this->name;
    }
}
