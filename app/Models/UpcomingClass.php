<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpcomingClass extends Model
{
    protected $fillable = ['name', 'date'];
}
