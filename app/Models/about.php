<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class about extends Model
{
    protected $guarded = '';

    public function profile()
    {
        # code...
        return $this->belongsTo(ProfileModel::class);
    }
}
