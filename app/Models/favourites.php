<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favourites extends Model
{
    use HasFactory;

    protected $table='favourites';
    protected $fillable=['id','user_id','cat_id','hotel_id','status'];

    public $timestamps=false;

}
