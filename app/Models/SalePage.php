<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalePage extends Model
{
    protected $fillable = [
        'title', 'slug', 'body',
        'phone', 'phone_label', 'line_url', 'inquiry_url', 'inquiry_label',
        'head_scripts', 'body_scripts', 'status',
    ];

    public function views()
    {
        return $this->hasMany(SalePageView::class);
    }

    public function todayViews()
    {
        return $this->hasMany(SalePageView::class)->whereDate('viewed_at', today());
    }
}
