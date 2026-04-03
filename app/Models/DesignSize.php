<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignSize extends Model
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
        return $this->belongsToMany(product::class, 'product_design_size', 'design_size_id', 'product_id');
    }
}
