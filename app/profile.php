<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['avatar','user_id','youtube','facebook','about'];
}
