<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'system_name',
        'owner_name',
        'start_date',
        'duration',
        'end_date',
        'status',
        'development_methodology',
        'system_platform',
        'deployment_type',
        'request_type',
        'approved',
        'leader_developer_id',
        'system_id',
        'owner_id',
    ];

    public function developers()
    {
        return $this->belongsToMany(Developer::class, 'developer_project');
    }

    public function leaderdeveloper()
    {
        return $this->belongsTo(Developer::class, 'leader_developer_id');
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }
}
