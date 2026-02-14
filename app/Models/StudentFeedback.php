<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentFeedback extends Model
{
    use SoftDeletes;

    protected $casts = ["feedback_date" => "datetime"];

    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function statuss()
    {
        return $this->belongsTo(Extra::class, 'status', 'id');
    }
}
