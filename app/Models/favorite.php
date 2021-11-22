<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    protected $guarded = '';

    public function profile()
    {
        # code...
        return $this->belongsTo(ProfileModel::class);
    }
    public function favorite_details()
    {
        return $this->hasMany(favorite_details::class)->orderBy('updated_at', 'desc');
    }
}
