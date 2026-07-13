<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalePageInquiry extends Model
{
    public $timestamps = false;

    protected $fillable = ['sale_page_id', 'name', 'phone', 'company', 'email', 'message'];

    protected $casts = ['created_at' => 'datetime'];

    public function salePage()
    {
        return $this->belongsTo(SalePage::class);
    }
}
