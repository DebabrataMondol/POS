<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesMan extends Model
{
    protected $primaryKey = 'salesMan_id';
    protected $table = 'sales_men';
    protected $fillable = ['salesMan_name',
        'salesMan_mobile',
        'salesMan_address',
        'salesMan_status'];
}
