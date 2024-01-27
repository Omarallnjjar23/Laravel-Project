<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'status',
        'type',
        'system_name',
        'development_methodology',
        'system_platform',
        'deployment_type',
        'system_id',
        'owner_id',
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
