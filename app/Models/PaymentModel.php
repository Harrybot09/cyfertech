<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    use HasFactory;
    protected $table="payment";

   protected $fillable=['hotel_id','adventure_id','hotelbookingid','adventurebookingid','user_id','email','contact','payment_id','total_amount','payment_status','status'];

    public $timestamps=false;
}
