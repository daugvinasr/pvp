<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class repairmans_categories extends Model
{
    protected $table = 'repairmans_categories';
    public $timestamps = false;

    public function repairmancategoriesToCategories()
    {
        return $this->belongsTo(categories::class, 'fk_categoriesid', 'categories_id');
    }
}
