<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    use HasFactory;
    protected $table='US_STATES';
    protected $fillable=['id','state_id','state_name'];

    public $timestamps = false;
}
