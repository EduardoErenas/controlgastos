<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
    protected $table = 'gasto';
    public $primaryKey = 'ga_id';
}