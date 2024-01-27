<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'developer_project');
    }

    public function leadingProjects()
    {
        return $this->hasMany(Project::class, 'leader_developer_id');
    }

    public function progress()
    {
        return $this->hasMany(Progress::class, 'leader_developer_id');
    }   
}
