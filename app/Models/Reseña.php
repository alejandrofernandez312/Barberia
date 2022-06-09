<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reseña extends Model
{
    //
    protected $table = "reseña_barberia";
    protected $primaryKey = "reseña_id";
    public $timestamps = false;
}
