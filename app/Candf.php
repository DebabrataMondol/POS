<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candf extends Model
{
    protected $table = 'candf';
    protected $guarded = ['id'];
    protected $primaryKey = 'candfid';
    public $timestamps = false;
}
