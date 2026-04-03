<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_th',
        'name_en',
        'slug',
        'sort',
        'status',
    ];

    public function products()
    {
        return $this->belongsToMany(product::class, 'product_design_material', 'design_material_id', 'product_id');
    }
}
