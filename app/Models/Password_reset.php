<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Password_reset extends Model
{
    use HasApiTokens,HasFactory;
    protected $table='password_reset';
    protected $fillable=['email','token','passotp','status'];
}
