<?php

namespace App\Http\Controllers\api;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Register;
use App\Models\Password_reset;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon; 
use App\Mail\SendMailToUser;
use App\Mail\ForgotPasswordMail;
use Laravel\Sanctum\HasApiTokens ;

class UserRegisterController extends Controller
{

    public function register(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'email'=>'unique:register',
            'password' => 'required|min:6',

            'name'=>'required',
            'phone'=>'required',

        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(),400);
        }
        else
        {
            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;
            $password = $request-> password;
            $otp = $this->requestOtp($request);

            if($otp)
            {
                $user =register::create([
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'password'=>$password,
                    'otp'=>$otp
                ]);

                return response()->json([
                    'message' => 'Success',
                    'user' => $user
                ], 201);
            }
            else
            {
                
                return response()->json(
                [
                'message' => 'Invalid ',
                ], 401);
            }
       
        }
    }

    public function requestOtp(Request $request)
    {

        $otp = rand(1000,9999);
        Log::info("otp = ".$otp);
       $user = register::where('email','=',$request->email)->get();
       $count = $user->count();
       if($count == 0)
       {
            if($otp)
            {
                $details = [
                    'subject' => 'Testing Application OTP',
                    'body' => 'Your OTP is : '. $otp
                ];
                    Mail::to($request->email)->send(new SendMailToUser($details));
                    return $otp;
            }
            else
            {
                return response()->json([
                'message' => 'Invalid OTP',
                ], 401);
            }
        }
       else 
       {
            return response()->json([
            'message' => 'Email Already Registered',
            ], 401);
       }
    
    }
    public function verifyOtp(Request $request)
    {
        $email = $request->email;
        $otp = $request->otp;
        $user  = register::where([['email','=',$email],['otp','=',$otp]])->first();
    
        if($user)
        {
            register::where('email','=',$email)->update(['otp' => null]);
            return response()->json([
            'message' => 'User successfully registered',
            ], 201);
        }
        else
        {
            register::where('email','=',$email)->delete();
            return response()->json([
            'error' => 'Unauthorized'], 401);
        }
    }

    public function LoginUser(Request $request)
    {
        $email = $request->email;
        $chkpassword = $request->password;
    //    $password = Hash::check('plain-text', $chkpassword);

        $userlogin  = register::where([['email','=',$email],['password','=',$chkpassword]])->first();
        if($userlogin)
        {
            // return redirect('/');
            return $token = $userlogin->createToken('travel_fox')->plainTextToken;
            return response()->json([
                'message' => $userlogin,
                'token'=>$token
                ], 201);

                
        }
        else
        {
            return response()->json([
            'error' => 'Something wrong with your credentials'], 401);
        }
    }



    public function resendOtp(Request $request)
    {

        $otp = rand(1000,9999);
        Log::info("otp = ".$otp);
        $user = register::where('email','=',$request->email)->update(['otp' => $otp]);
        
        if($user)
        {
            $details = [
                'subject' => 'Testing Application OTP',
                'body' => 'Your OTP is : '. $otp
            ];

            Mail::to($request->email)->send(new SendMailToUser($details));
            return response()->json([
            'otp' => $otp,
            'message' => 'Success',
            ], 201);
        }
        else
        {
           return response()->json([
            'message' => 'Invalid',
          ], 401);
        }
    }

    public function ForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:register',
        ]);

        $token = Str::random(64);

        DB::table('password_reset')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);

          Mail::send('email.ForgotEmailTemp', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

          return response()->json([
            'message' => 'link sent to email',
        ], 200);
    }

        public function showResetPasswordForm($token) 
        { 
            return view('resetform', ['token' => $token]);
        }

    public function ResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:register',
            'password' => 'required|string|min:6|',
            ]);
  
        $updatePassword = DB::table('password_reset')
            ->where([
            'email' => $request->email, 
            'token' => $request->token
            ])
            ->first();
  
        if(!$updatePassword)
        {
            return response()->json([
                'error' => 'Unauthorized,Token inavlid'], 401);
        }
        else
        {
          $user = register::where('email', $request->email)
            ->update(['password' =>$request->password]);
 
                      
            return response()->json([
            'message' => 'Password Reset successfull',
            'data'=>$user
            ], 200);
            
            DB::table('password_reset')->where(['email'=> $request->email])->delete();
        }
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
        'message' => 'Successfully logged out'
        ]);
    }
}
