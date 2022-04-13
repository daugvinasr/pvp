<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class disposals extends Model
{
    protected $table = 'disposals';
    public $timestamps = false;

    public function disposalsToCategories()
    {
        return $this->belongsTo(categories::class, 'fk_categoriesid', 'categories_id');
    }
}
