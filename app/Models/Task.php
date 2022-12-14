<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends BaseModel
{
    use HasFactory;

    protected $fillable = ['description', 'title'];

    public function project()
    {
        return $this->hasOne(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
