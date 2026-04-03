<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    public function designTypes()
    {
        return $this->belongsToMany(DesignType::class, 'product_design_type', 'product_id', 'design_type_id');
    }

    public function designMaterials()
    {
        return $this->belongsToMany(DesignMaterial::class, 'product_design_material', 'product_id', 'design_material_id');
    }

    public function designSizes()
    {
        return $this->belongsToMany(DesignSize::class, 'product_design_size', 'product_id', 'design_size_id');
    }
}
