<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratesperuserd extends Model
{
    use HasFactory;

    protected $table="ratesperuserd";
    
    protected $fillable=['product_id','sku_code','name','price','no_of_users','status'];

    public $timestamps=false;
}
