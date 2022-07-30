<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicecategory extends Model
{
    use HasFactory;
	
    protected $table ='service_category';
    protected $fillable=['service_id','name','status'];

    public $timestamps=false;
}
