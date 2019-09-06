<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempbercode extends Model
{
    protected $table = 'temp_barcode';
    protected $fillable = ['description','bercode','quantity','cost','sell_price'];
}
