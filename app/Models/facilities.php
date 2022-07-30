<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facilities extends Model
{
    use HasFactory;

    protected $table='facilities';
    protected $fillable=['fac_name','icon','status'];

    public $timestamps=false;
}
