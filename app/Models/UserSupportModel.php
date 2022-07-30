<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSupportModel extends Model
{
    use HasFactory;

    protected $table="usersupport";

    protected $fillable=['user_id','name','email','phone','message','status'];

    public $timestamps=false;
}
