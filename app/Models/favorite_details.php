<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorite_details extends Model
{
    protected $guarded = '';

    public function favorite()
    {
        # code...
        return $this->belongsTo(favorite::class);
    }
}
