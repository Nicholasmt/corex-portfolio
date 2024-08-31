<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
