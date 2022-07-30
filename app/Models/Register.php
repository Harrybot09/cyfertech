<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
class Register extends Model
{
    use HasApiTokens , HasFactory;
    protected $table='register';
    protected $fillable=['name','email','phone','otp','password','fullname','dob','address','profile_img','status'];
    public $timestamps=false;
	
	public function generateToken(){
		
		$this->api_token = Str::random(60);
		$this->save();
		
		return $this->api_token;
		
	}
}
