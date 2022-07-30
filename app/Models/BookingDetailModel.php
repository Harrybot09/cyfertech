<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetailModel extends Model
{
    use HasFactory;

    protected $table="bookingdetail";

    protected $fillable=['booking_id','roomtype_id','roomtype','roomcount','totaldays','status'];

    public $timestamps=false;
}
