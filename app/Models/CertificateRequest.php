<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificateRequest extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function statuss()
    {
        return $this->belongsTo(Extra::class, 'status', 'id');
    }

    public function countryy()
    {
        return $this->belongsTo(Country::class, 'country', 'id');
    }
}
