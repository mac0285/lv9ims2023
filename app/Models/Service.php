<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use App\Model\Komputer;

class Service extends Model
{
    use HasFactory;
    use Loggable;
    protected $guarded  = [];
    public $primarykey='id';
    protected $table = "services";
    public function Komputer()
    {
        return $this->hasOne(Crud::class);
    }
    protected $fillable = [
    'ServiceHwid',
    'ip_comp',
    'hostname_comp',
    'sku_supplies',
    'hw_type',
    'diagnose',
    'photo',
    'file_name',
    'barcode_supplies',
    'qty',
    'remark',
    'dept_comp',
    'month_date',
    'branch_code',
    'deleted_at',
    'current_team_id',
    'active'
    ];

}
