<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Straum extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Add other fillable fields as needed
        'user_id', // Assuming 'user_id' is the foreign key column
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
