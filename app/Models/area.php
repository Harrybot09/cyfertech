<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    use HasFactory;
    protected $table='area';
    protected $fillable=['name','city_id','status'];

    public $timestamps =false;
}
