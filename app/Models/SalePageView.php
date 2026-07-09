<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalePageView extends Model
{
    public $timestamps = false;

    protected $fillable = ['sale_page_id', 'ip', 'viewed_at'];

    public function salePage()
    {
        return $this->belongsTo(SalePage::class);
    }
}
