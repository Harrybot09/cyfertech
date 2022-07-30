<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services_subcategory extends Model
{
    use HasFactory;
	
    protected $table ='services_subcategory';
    protected $fillable=['service_id','sub_service_id','name','status'];

    public $timestamps=false;
}
