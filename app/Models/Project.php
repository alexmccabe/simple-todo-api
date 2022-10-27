<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends BaseModel
{
    use HasFactory;

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
