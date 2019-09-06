<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $guarded = ['id'];
    protected $primaryKey = 'customer_id';
    public $timestamps = false;
}
