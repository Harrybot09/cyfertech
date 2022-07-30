<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratesperuser extends Model
{
    use HasFactory;

    protected $table="ratesperuser";
    
    protected $fillable=['category_id','sku_code','name','price','image','no_of_users','description','status'];

    public $timestamps=false;
}
