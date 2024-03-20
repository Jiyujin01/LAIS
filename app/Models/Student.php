<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Stratum;
use App\Models\Checkinout;

class Student extends Model
{
    protected $fillable = [
        'stratum_id', 
        'fname',
        'mname',
        'lname',
        'suffix',
        'gender'
        
    ];
    
    public function stratum()
    {
        return $this->belongsTo(Stratum::class);
    }     

    public function getFullname()
    {
        return $this->fname . ' ' . $this->lname;
    }

    public function checkinout(): HasOne
    {
        return $this->hasOne(Checkinout::class);
    }

}
