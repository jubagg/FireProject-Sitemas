<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Federaciones extends Model
{
    protected $table = 'sgfederacion';
    protected $primarykey = 'fedcod';
    public $timestamps = false;
}
