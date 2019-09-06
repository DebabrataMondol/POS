<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesReturn extends Model
{
    protected $table = 'sales_returns';
    protected $fillable =
        [
            'saleInvoice_no',
            'salesReturn_description',
            'salesReturn_quantity',
            'salesReturn_price'
        ];
}
