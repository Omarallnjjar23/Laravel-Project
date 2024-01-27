<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function systems()
    {
        return $this->hasMany(System::class);
    }
}
