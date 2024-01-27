<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class system extends Model
{
    use HasFactory;
    protected $fillable = [
        'system_name',
        'version',
        'development_methodology',
        'system_platform',
        'deployment_type',
        'owner_id',
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

}
