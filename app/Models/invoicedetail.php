<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class invoicedetail extends Model
{
    public function product()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
}
