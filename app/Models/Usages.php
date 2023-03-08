<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
class Usages extends Model
{
    use HasFactory;
    use Loggable;
    protected $guarded  = [];
    protected $appends = ['total'];

    public function getTotal()
    {
        return $this->inbound + $this->outbound;
    }
}
