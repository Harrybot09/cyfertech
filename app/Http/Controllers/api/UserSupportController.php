<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserSupportModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserSupportMail;


class UserSupportController extends Controller
{
    function UserSupport(Request $request)
    {

        $request->validate([
            'user_id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'message'=>'required'
        ]);

        $submit=UserSupportModel::create($request->all());

        
        $mailtoadmin=env('MAIL_USERNAME');

        if ($submit !='') 
        {
        $details = 
                [
                    
                    'name' => $submit->name,
                    'email' => $submit->email,
                    'phone' => $submit->phone,
                    'message' => $submit->message
                ];
            Mail::to($mailtoadmin)->send(new UserSupportMail($details));

            return response()->json([
                "message"=>"Query has been sent ",
                "data"=>$submit
            ],200);
        }
        else
        {
            return response()->json([
                "message"=>"Bad request"
            ],400);
        }
    }
}
