<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignType extends Model
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
        return $this->belongsToMany(product::class, 'product_design_type', 'design_type_id', 'product_id');
    }
}
