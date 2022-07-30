<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=['cat_id', 'subcat_id', 'service_id', 'product', 'description', 'image', 'short_desc'];

    public $timestamps =false;
}
