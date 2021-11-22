<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    // protected $fillable = [
    //     'name',
    //     'address',
    //     'email',
    //     'phone',
    //     'image',
    // ];
    protected $guarded = '';
    public function home()
    {
        # code...
        return $this->hasOne(home::class);
    }
    public function about()
    {
        # code...
        return $this->hasOne(about::class);
    }
    public function skills()
    {
        # code...
        return $this->hasMany(skill::class)->orderBy('updated_at', 'desc');
    }
    public function favorites()
    {
        # code...
        return $this->hasMany(favorite::class)->orderBy('updated_at', 'desc');
    }
}
