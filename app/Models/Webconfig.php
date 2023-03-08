<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Komputer;
use App\Model\Service;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
class Webconfig extends Model
{
    use HasFactory;
    use Loggable;
    protected $guarded  = [];
    public $primarykey='id';
    protected $table = "webconfigs";
    public function Komputer()
    {
        return $this->hasOne(Crud::class);
    }
    public function Service()
    {
        return $this->hasOne(Service::class);
    }
    protected $fillable = [
        'name',
        'factory',
        'telp',
        'email',
        'address',
        'pic',
        'config',
        'default',
        'location',
        'flag',
        'log',
        'current_team_id',
        'active'

    ];
}
