<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = ['response_date' => 'datetime'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function statuss()
    {
        return $this->belongsTo(Extra::class, 'status', 'id');
    }

    public function reference()
    {
        return $this->belongsTo(Extra::class, 'referred_by', 'id');
    }
}
