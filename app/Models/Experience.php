<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function category()
    {
      return $this->belongsTo('App\Models\Service','service_id');
    }
}
