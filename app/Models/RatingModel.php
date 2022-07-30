<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingModel extends Model
{
    use HasFactory;

    protected $table="rating";
    
    protected $fillable=['user_id','hotel_id','adventure_sport_id','ratings','status'];

    public $timestamps=false;
}
