<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Course;
use App\Models\Checkinout;

class Student extends Model
{
    protected $fillable = [
        'course_id', 
        'fname',
        'mname',
        'lname',
        'suffix',
        'gender'
        
    ];
    
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function getFullname()
    {
        $middleInitial = !empty($this->mname) ? substr($this->mname, 0, 1) . '.' : '';
        return $this->lname . ',' . $this->fname . ',' . $middleInitial . ',' . $this->suffix;
    }

    public function checkinout(): HasMany
    {
        return $this->hasMany(Checkinout::class);
    }

}
