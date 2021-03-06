<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class repair_orders extends Model
{
    protected $table = 'repair_orders';
    public $timestamps = false;

    public function repairOrdersToUser()
    {
        return $this->belongsTo(users::class, 'fk_usersid', 'users_id');
    }

    public function repairOrdersToDevice()
    {
        return $this->belongsTo(devices::class, 'fk_devicesid', 'devices_id');
    }

}
