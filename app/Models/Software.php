<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
class Software extends Model
{
    use HasFactory;
    use Loggable;
    protected $guarded  = [];


    public function scopeActive( $query)
    {
        return $query->where('active', 1);
    }
}

