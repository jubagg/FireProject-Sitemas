<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grados extends Model
{
    protected $table = 'sgbgrados';
    protected $primarykey = 'graid';
    public $timestamps = false;
}
