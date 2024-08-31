<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
