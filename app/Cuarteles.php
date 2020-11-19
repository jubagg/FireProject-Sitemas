<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuarteles extends Model
{
    protected $table = 'sgbcuarteles';
    protected $primaryKey = 'cuarid';
    public $timestamps = false;
}
