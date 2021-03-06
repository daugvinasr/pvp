<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class repairmans extends Model
{
    protected $table = 'repairmans';
    public $timestamps = false;

    public function repairmansToCategories()
    {
        return $this->hasMany(repairmans_categories::class, 'fk_repairmansid', 'repairmans_id');
    }
}
