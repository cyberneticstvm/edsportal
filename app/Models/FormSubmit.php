<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormSubmit extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function typee()
    {
        return $this->belongsTo(Extra::class, 'submit_type', 'id');
    }
}
