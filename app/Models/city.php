<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;
    protected $table='us_cities';
    protected $fillable=['state_id','city','county'];

    public $timestamps = false;
}
