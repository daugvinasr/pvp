<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class repair_guides_parts extends Model
{
    protected $table = 'repair_guides_parts';
    public $timestamps = false;

    public function repairGuidesPartsToPart()
    {
        return $this->belongsTo(parts::class, 'fk_partsid', 'parts_id');
    }
}
