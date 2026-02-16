<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EdsReferral extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = ["registration_date" => "datetime"];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
