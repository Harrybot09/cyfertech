<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorModel extends Model
{
    use HasFactory;
    protected $table='vendors';
    protected $fillable=['image','first_name','last_name','hotel_name','hotel_url','phone','telephone','email','password','building_number','street','city','zip_code','country','state','status'];
}
