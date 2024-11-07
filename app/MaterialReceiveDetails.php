<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class MaterialReceiveDetails extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens;

    public $table = 'material_receive_details';

    protected $fillable = [
        'material_receive_id',
        'branch_id',
        'requisition_id',
        'ps_id',
        'job_id',
        'warehouse_id',
        'item_id',
        'group_id',
        'subgroup_id',
        'unit_id',
        'order_quantity',
        'receive_quantity',
        'sale_price',
        'total_price',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
    public function subgroup()
    {
        return $this->belongsTo(SubGroup::class, 'subgroup_id', 'id');
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
